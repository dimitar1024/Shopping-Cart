<?php

namespace Models\Input;


class ReviewBindingModel
{
    private $message;

    function __construct(array $params)
    {
        $this->message = $params['message'];
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
}