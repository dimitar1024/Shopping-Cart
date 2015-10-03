<?php

namespace Models\Views;


class ProductMessage {
    private $id;
    private $username;
    private $message;
    private $isAdmin;
    private $isEditor;
    private $isModerator;

    function __construct($id, $username, $message, $isAdmin, $isEditor, $isModerator)
    {
        $this->id = $id;
        $this->username = $username;
        $this->message = $message;
        $this->isAdmin = $isAdmin;
        $this->isEditor = $isEditor;
        $this->isModerator = $isModerator;
    }

    public function getId(){
        return $this->id;
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
    public function getMessage()
    {
        return $this->message;
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