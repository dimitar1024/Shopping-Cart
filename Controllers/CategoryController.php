<?php

namespace Controllers;


use GF\BaseController;
use GF\Normalizer;

class CategoryController extends BaseController
{

    /**
     * @Get
     * @Route("Categories/{category:string}/{start:int}/{end:int}")
     */
    public function show()
    {
        $category = $this->input->getForDb(1);
        $skip = $this->input->get(2);
        $take = $this->input->get(3) - $skip;
		// Pagination products by caregories
        $this->db->prepare("SELECT products.id, products.name, products.description, products.price, products.quantity, categories.name as category
                            FROM products
                            JOIN products_categories pc ON products.id = pc.productId
                            JOIN categories ON pc.categoryId = categories.id
                            WHERE quantity > 0 AND c.name LIKE ?
                            ORDER BY products.id
                            LIMIT {$take}
                            OFFSET {$skip}", array($category));
        $response = $this->db->execute()->fetchAllAssoc();
        $products = array();
        foreach ($response as $productResponse) {
            $productId = Normalizer::normalize($productResponse['id'], 'noescape|int');
            $this->db->prepare("SELECT percentage
								FROM promotions
								WHERE productId = ? AND NOW() < endDate",
                array($productId));
            $promotions = $this->db->execute()->fetchAllAssoc();
            $bestPromotiontion = 0;
            foreach ($promotions as $promotion) {
                $currentPromotion = Normalizer::normalize($promotion['percentage'], 'noescape|double');
                if ($currentPromotiontion > $bestPromotion) {
                    $bestPromotion = $currentPromotion;
                };
            }

            $product = new ProductViewModel(
                Normalizer::normalize($productResponse['id'], 'noescape|int'), 
				$productResponse['name'], 
				$productResponse['description'],
                Normalizer::normalize($productResponse['price'], 'noescape|double'),
                Normalizer::normalize($productResponse['quantity'], 'noescape|int'),
                $productResponse['category'],
                $bestPromotion);
            $products[] = $product;
        }

        $category = $this->input->get(1);
    }

    public function index()
    {
        $this->db->prepare("SELECT name
                            FROM categories
                            ORDER BY name");
        $response = $this->db->execute()->fetchAllAssoc();
        $categories = array();
        foreach ($response as $c) {
            $category = new CategoryViewModel($c['name']);
            $categories[] = $category;
        }
    }

}