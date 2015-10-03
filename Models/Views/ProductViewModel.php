<?php

namespace Models\Views;


class ProductViewModel
{
    private $id;
    private $name;
    private $description;
    private $price;
    private $quantity;
    private $category;
    private $givenReviews;
    private $promotion;

    public function __construct($id, $name, $description, $price, $quantity, $category,$promotion = null, $givenReviews = array())
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->category = $category;
        $this->promotion = $promotion;
        $this->givenReviews = $givenReviews;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    function getDescription()
    {
        return $this->description;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }


    public function getCategory()
    {
        return $this->category;
    }

    public function getGivenReviews()
    {
        return $this->givenReviews;
    }

    /**
     * @return mixed
     */
    public function getPromotion()
    {
        return $this->promotion;
    }
}