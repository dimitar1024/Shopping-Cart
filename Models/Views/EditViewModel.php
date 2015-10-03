<?php

namespace Models\Views;


class EditViewModel
{
    private $id;
    private $name;
    private $description;
    private $price;
    private $quantity;
    private $category;

    public function __construct($id, $name, $description, $price, $quantity, $category)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->category = $category;
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
}