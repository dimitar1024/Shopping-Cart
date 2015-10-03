<?php

namespace Models\Views;


class User
{
    private $username;
    private $isAdmin;
    private $isEditor;
    private $isModerator;

    function __construct($username, $isAdmin, $isEditor, $isModerator)
    {
        $this->username = $username;
        $this->isAdmin = $isAdmin;
        $this->isEditor = $isEditor;
        $this->isModerator = $isModerator;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return mixed
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * @return mixed
     */
    public function getIsEditor()
    {
        return $this->isEditor;
    }

    /**
     * @return mixed
     */
    public function getIsModerator()
    {
        return $this->isModerator;
    }
}