<?php
namespace Classes;
require_once __DIR__ . '/../boot/load.php';

use Model\UsersModel;

class AuthenticateClass
{

    public function login($username,$password)
    {
        if (AuthenticateClass::checkExitstUser($username)) {
            if(AuthenticateClass:: validatePassword($username, $password))
            {
                $user = new UsersModel;
                $userInfo = $user->where('username', $username)->first();
                if(!$userInfo)
                {
                    $userInfo = $user->where('email', $username)->first();
                }

                if ($userInfo->status !== 1) {
                    $_SESSION["error"] = ["บัญชีของคุณถูกปิดกั้นโดยผู้ดูแลระบบ"];
                } else {
                    $_SESSION['auth'] = array(
                        'id' => $userInfo->id,
                        'username' => $userInfo->username,
                        'name' => $userInfo->firstname.' '.$userInfo->lastname,
                        'position' => $userInfo->position,
                        'email' => $userInfo->email
                    );
                }
               
            } else {
                $_SESSION["error"] = ["รหัสผ่านไม่ถูกต้อง"];
            }
        } else {
            $_SESSION["error"] = ["ชื่อผู้ใช้ไม่ถูกต้อง"];
        }
        return header('Location: http://'.$_SERVER["HTTP_HOST"].'/backoffice/Login.php');
    }

    private function checkExitstUser($username)
    {
        $user = new UsersModel;
        if($user->where('username', $username)->first() || $user->where('email', $username)->first())
        {
            return true;
        }
        return false;
    }

    private function validatePassword($username, $password)
    {
        $user = new UsersModel;
        $userInfo = $user->where('username', $username)->first();
        if(!$userInfo)
        {
            $userInfo = $user->where('email', $username)->first();
        }
        if (password_verify($password, $userInfo->password)) {
            return true;
        } else {
            return false;
        }
        return false;
    }

    public function logout()
    {
        unset($_SESSION['auth']);
        return header('Location: http://'.$_SERVER["HTTP_HOST"].'/backoffice/Login.php');
    }
}

// Request from user
if (isset($_POST['login'])) {
    AuthenticateClass::login($_POST['username'],$_POST['password']);
}
if (isset($_POST['logout'])) {
    AuthenticateClass::logout();
}