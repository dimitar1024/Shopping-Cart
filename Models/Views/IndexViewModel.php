<?php

namespace Models\Views;


class IndexViewModel
{
    private $products;
    private $totalSum;
    private $money;

    public function __construct(array $products, $totalSum, $money)
    {
        $this->products = $products;
        $this->totalSum = $totalSum;
        $this->money = $money;
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function getTotalSum()
    {
        return $this->totalSum;
    }

    public function getMoney()
    {
        return $this->money;
    }
}