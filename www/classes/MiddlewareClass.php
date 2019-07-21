<?php

namespace Classes;
require_once __DIR__ . '/../boot/load.php';

class MiddlewareClass
{
    public function auth()
    {
        $permission = $_SESSION['Auth']['position'] === 1 || $_SESSION['Auth']['position'] === 2;
        if (isset($_SESSION['Auth']) && $permission) {
            return header('Location: http://'.$_SERVER["HTTP_HOST"].'/backoffice/ManageTemplate.php');
        }
    }
}