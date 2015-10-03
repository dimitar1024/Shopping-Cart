<?php

namespace Controllers;


use GF\BaseController;
use GF\Normalizer;
use Models\Views\CartProductViewModel;
use Models\Views\CheckoutViewModel;
use Models\Views\IndexViewModel;
use Models\Views\Product;

class CartController extends BaseController
{
    /**
     * @Authorize
     */
    public function index()
    {
        $cart = $this->session->cart;
        $products = array();
        $totalPrice = 0;
        $money = 0;
        if ($cart) {
            foreach ($cart as $itemId) {
				// 
                $this->db->prepare("SELECT products.id, products.name, products.price
									FROM products
									JOIN products_categories pc ON products.id = pc.productId
									JOIN categories ON pc.categoryId = categories.id
									WHERE products.id = ?",
                    array($itemId));
                $response = $this->db->execute()->fetchRowAssoc();
                $price = Normalizer::normalize($response['price'], 'noescape|double');
				//Rerutn acrual promotions 
                $this->db->prepare("SELECT
                            percentage
                            FROM promotions
                            WHERE productId = ? AND NOW() < endDate",  
                    array($itemId));
                $promotions = $this->db->execute()->fetchAllAssoc();
                $bestPromo = 0;
                foreach ($promotions as $promotion) {
                    $currentPromo = Normalizer::normalize($promotion['percentage'], 'noescape|double');
                    if ($currentPromo > $bestPromo) {
                        $bestPromo = $currentPromo;
                    };
                }
				// Calculate price after promotions
                $price = $price * (1 - $bestPromo / 100);
                $product = new CartProductViewModel(
                    Normalizer::normalize($response['id'], 'noescape|int'),
                    $response['name'],
                    $price);
                $products[] = $product;
                $totalPrice += $price;
            }

            $this->db->prepare("SELECT Cash
                            FROM users
                            WHERE id = ? AND username = ?",
                array($this->session->_login, $this->session->_username));
            $response = $this->db->execute()->fetchRowAssoc();
            $money = Normalizer::normalize($response['Cash'], 'noescape|double');
        }

    }

    /**
     * @Authorize
     * @Get
     * @Route("cart/add/{id:int}")
     */
    public function add()
    {
        if (!$this->session->cart) {
            $this->session->cart = array();
        }

        $cart = $this->session->cart;
        $cart[] = $this->input->get(2);
        $this->session->cart = $cart;

        $this->redirect('/');
    }

    /**
     * @Authorize
     * @Delete
     * @Route("cart/remove/{id:int}")
     */
    public function remove()
    {
        if (!$this->session->cart) {
            throw new \Exception("Cart is empty!", 500);
        }

        $id = $this->input->get(2);
        $cart = $this->session->cart;
        foreach ($cart as $k => $itemId) {
            if ($itemId == $id) {
                unset($cart[$k]);
                break;
            }
        }

        $this->session->cart = $cart;

        $this->redirect('/cart');
    }

    /**
     * @Authorize
     * @Post
     * @Route("cart/checkout")
     */
    public function checkout()
    {
        $cart = $this->session->cart;

        if (!$cart) {
            throw new \Exception('Cart is empty!', 400);
        }

        $totalPrice = 0;
        $products = array();
        foreach ($cart as $itemId) {
            $this->db->prepare("SELECT roducts.price, products.name, products.id
								FROM products
								JOIN products_categories pc ON p.id = pc.productId
								JOIN categories ON pc.categoryId = categories.id
								WHERE p.id = ?",
                array($itemId));
            $response = $this->db->execute()->fetchRowAssoc();
            $price = Normalizer::normalize($response['price'], 'noescape|double');

            $this->db->prepare("SELECT percentage
								FROM promotions
								WHERE productId = ? AND NOW() < endDate",
                array($itemId));
            $promos = $this->db->execute()->fetchAllAssoc();
            $bestPromo = 0;
            foreach ($promos as $promo) {
                $currentPromo = Normalizer::normalize($promo['percentage'], 'noescape|double');
                if ($currentPromo > $bestPromo) {
                    $bestPromo = $currentPromo;
                };
            }

            $price = $price * (1 - $bestPromo / 100);
            $products[] = new Product(Normalizer::normalize($response['id'], 'noescape|int'), $response['name'] , $price);
            $totalPrice += $price;
        }

        $this->db->prepare("SELECT Cash
                            FROM users
                            WHERE id = ? AND username = ?",
            array($this->session->_login, $this->session->_username));
        $response = $this->db->execute()->fetchRowAssoc();
        $money = Normalizer::normalize($response['Cash'], 'noescape|double');

        if ($money - $totalPrice < 0) {
            $diff = $totalPrice - $money;
            throw new \Exception("You don't have enough money for this purchase! ", 400);
        }

        $boughtProducts = array();
        $productsNotBought = array();
        foreach ($products as $p => $product) {
            $this->db->prepare("UPDATE products
                                SET quantity = quantity - 1
                                WHERE id = ? AND quantity > 0",
                array($product->getId()));
            $response = $this->db->execute()->affectedRows();
            if ($response) {
                $this->db->prepare("UPDATE users
                                    SET Cash = Cash - ?
                                    WHERE id = ? AND username = ?",
                    array($product->getPrice(), $this->session->_login, $this->session->_username));
                $this->db->execute();
                $boughtProducts[] = $product;
            } else {
                $productsNotBought[] = $product;
            }
        }

        if (count($productsNotBought) !== 0) {
            $viewModel = new CheckoutViewModel('Not all items bought!', $productsNotBought);
        } else {
            $viewModel = new CheckoutViewModel('All items bought!', array());
        }

        $this->session->cart = array();

    }
}