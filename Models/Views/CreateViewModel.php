<?php

namespace Models\Views;


class CreateViewModel
{
    private $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getSomeShit()
    {
        return $this->message;
    }
}