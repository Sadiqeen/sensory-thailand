<?php
namespace Classes;
require_once __DIR__ . '/../boot/load.php';

class AuthenticateClass
{
    public function verify($username, $password)
    {
        if (password_verify('rasmuslerdorf', $hash)) {
            echo 'Password is valid!';
        } else {
            echo 'Invalid password.';
        }
    }
}

// Request from user
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    AuthenticateClass::verify($username, $password);
}