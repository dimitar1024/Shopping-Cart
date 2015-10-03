<?php

namespace Models\Views;


class IndexViewModel
{

    private $categories;

    public function __construct(array $categories)
    {
        $this->categories = $categories;
    }

    public function getCategories()
    {
        return $this->categories;
    }
}