<?php

namespace Classes;
require_once __DIR__ . '/../boot/load.php';

class MiddlewareClass
{
    public function loginPage()
    {
        $permission = $_SESSION['Auth']['position'] === 1 || $_SESSION['Auth']['position'] === 2;
        if (isset($_SESSION['Auth']) && $permission) {
            return header('Location: http://'.$_SERVER["HTTP_HOST"].'/backoffice/Dashboard.php');
        }
    }

    public function auth()
    {
        if (!isset($_SESSION['Auth'])) {
            return header('Location: http://'.$_SERVER["HTTP_HOST"].'/backoffice/Login.php');
        }
    }
}