<?php

namespace Models\Input;


class RightsBindingModel
{
    private $username;
    private $rightName;

    function __construct(array $params)
    {
        $this->setUsername($params['username']);
        $this->setRightName($params['rightName']);
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getRightName()
    {
        return $this->rightName;
    }

    /**
     * @param mixed $rightName
     */
    public function setRightName($rightName)
    {
        $this->rightName = $rightName;
    }

}