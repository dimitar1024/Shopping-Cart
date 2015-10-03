<?php

namespace Models\Views;


class ProductIndexViewModel
{

    private $products;
    private $start;
    private $end;

    public function __construct($products, $start, $end)
    {
        $this->products = $products;
        $this->start = $start;
        $this->end = $end;
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
}