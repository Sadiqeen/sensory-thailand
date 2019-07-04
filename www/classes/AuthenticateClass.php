<?php
namespace Classes;
require_once __DIR__ . '/../boot/load.php';

use Model\UsersModel;

class AuthenticateClass
{

    public function login($username,$password)
    {
        $existUsername = UsersModel::where('username',$username)->first();
        if ($existUsername) {
             echo 'goodjob';
        } else {
            echo 'username not exist';
        }
    }
}

// Request from user
if (isset($_POST['login'])) {
    AuthenticateClass::login($_POST['username'],$_POST['password']);
}