<?php

namespace Models\Input;


use GF\Normalizer;

class PromotionBindingModel {
    private $name;
    private $product;
    private $percentage;
    private $date;

    public function __construct(array $params){
        $this->setName($params['name']);
        $this->setProduct($params['product']);
        $this->setPercentage($params['percentage']);
        $this->setDate($params['date']);
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
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param mixed $product
     */
    public function setProduct($product)
    {
        $this->product = $product;
    }

    /**
     * @return mixed
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * @param mixed $percentage
     */
    public function setPercentage($percentage)
    {
        $this->percentage = Normalizer::normalize($percentage, 'noescape|double');
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = date("Y-m-d", strtotime($date));
    }
}