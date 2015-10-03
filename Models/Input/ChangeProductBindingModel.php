<?php

namespace Models\Input;


use GF\Normalizer;

class ChangeProductBindingModel {

    private $name;
    private $description;
    private $price;
    private $quantity;
    private $category;

    function __construct(array $params)
    {
        $this->setName($params['name']);
        $this->setDescription($params['description']);
        $this->setPrice($params['price']);
        $this->setQuantity($params['quantity']);
        $this->setCategory($params['category']);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = Normalizer::normalize($price, 'noescape|double');
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = Normalizer::normalize($quantity, 'noescape|int');
    }
}