<?php


namespace Models\Views;


class ShowViewModel {

    private $products;
    private $start;
    private $end;
    private $category;

    public function __construct($products, $start, $end, $category)
    {
        $this->products = $products;
        $this->start = $start;
        $this->end = $end;
        $this->category = $category;
    }

    public function getProducts()
    {
        return $this->products;
    }


    public function getStart()
    {
        return $this->start;
    }

    public function getEnd()
    {
        return $this->end;
    }

    public function getCategory()
    {
        return $this->category;
    }
}