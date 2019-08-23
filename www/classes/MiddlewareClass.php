<?php

namespace Classes;
require_once __DIR__ . '/../boot/load.php';

use Classes\UsersClass;

class MiddlewareClass
{
    public function loginPage()
    {
        $permission = $_SESSION['auth']['position'] === 1 || $_SESSION['auth']['position'] === 2;
        if (isset($_SESSION['auth']) && $permission) {
            return header('Location: http://'.$_SERVER["HTTP_HOST"].'/backoffice/Dashboard.php');
        }
    }

    public function auth()
    {
        if (!isset($_SESSION['auth'])) {
            return header('Location: http://'.$_SERVER["HTTP_HOST"].'/backoffice/Login.php');
        }
    }

    public function updateUserPage($id)
    {
        $_SESSION['update_id'] = $id;

        if ($_SESSION['auth']['position'] == 2 || $id == 1) {
            $_SESSION['update_id'] = $_SESSION['auth']['id'];
        }

        $userData = UsersClass::getUser($_SESSION['update_id']);

        if (!$userData) {
            return header('Location: http://'.$_SERVER["HTTP_HOST"].'/backoffice/ManageUsers.php');
        }

        return $userData;
    }
}