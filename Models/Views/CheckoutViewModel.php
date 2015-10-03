<?php

namespace Models\Views;


class CheckoutViewModel {
    private $message;
    private $outOfStock;

    function __construct($message, $outOfStock)
    {
        $this->message = $message;
        $this->outOfStock = $outOfStock;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return mixed
     */
    public function getOutOfStock()
    {
        return $this->outOfStock;
    }

}