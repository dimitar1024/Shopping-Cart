<?php

namespace Routers;

use GF\Routers\IRouter;

include '../../PHP-GF-Framework-MVC/Routers/IRouter.php';

class Router implements IRouter{

    public function getURI()
    {
        return 'index/new';
    }

    public function getPost()
    {
        return array('Router' => 'Router');
    }

    public function getRequestMethod()
    {
        return 'get';
    }
}