<?php
namespace Classes;
require_once __DIR__ . '/../boot/load.php';

use Model\UsersModel;
use Rakit\Validation\Validator;

class UsersClass
{
    public function addUsers($userInfo)
    {
        $validator = new Validator;

        $validation = $validator->validate($userInfo, [
            'username'          =>  'required|min:5',
            'firstName'         =>  'required',
            'lastName'          =>  'required',
            'age'               =>  'required|numeric',
            'phone'             =>  'required|min:10',
            'email'             =>  'required|email',
            'password'          =>  'required|min:6',
            'confirm_password'  =>  'required|same:password',
            'organization'      =>  'required',
        ]);

        // handling errors
        if ($validation->fails()) {
            $_SESSION["error"] = $validation->errors()->all();
            return header('Location: http://'.$_SERVER["HTTP_HOST"].'/backoffice/AddUser.php');
        }
        
        $user = new UsersModel;

        // check unique attribute
        $username = $user->where('username', strtolower($userInfo['username']))->first();
        $phone = $user->where('phone', $userInfo['phone'])->first();
        $email = $user->where('email', strtolower($userInfo['email']))->first();
        if ($username) {
            array_push($_SESSION["error"], "ชื่อผู้ใช้นี้มีอยู่แล้ว!");
        }
        if ($phone) {
            array_push($_SESSION["error"], "เบอร์โทรนี้มีอยู่แล้ว!");
        }
        if ($email) {
            array_push($_SESSION["error"], "อีเมลล์นี้มีอยู่แล้ว!");
        }

        if ($_SESSION["error"]) {
            return header('Location: http://'.$_SERVER["HTTP_HOST"].'/backoffice/AddUser.php');
        }

        // Add to DB
        $user->username = strtolower($userInfo['username']);
        $user->firstName = $userInfo['firstName'];
        $user->lastName = $userInfo['lastName'];
        $user->age = $userInfo['age'];
        $user->phone = $userInfo['phone'];
        $user->email = strtolower($userInfo['email']);
        $user->password = password_hash($userInfo['password'], PASSWORD_DEFAULT);
        $user->position = 2;
        $user->organization_id = $userInfo['organization'];
        $user->status = 1;
        $user->save();

        array_push($_SESSION["success"], "เพิ่มผู้ใช้สำเร็จ!");

        return header('Location: http://'.$_SERVER["HTTP_HOST"].'/backoffice/AddUser.php');
    }

    public function getAllUsers()
    {
        $user = new UsersModel;
        $users = $user->where('position', 2)->get();
        return $users;
    }

    public function getUser($id)
    {
        $user = new UsersModel;
        $userData = $user->where('id', $id)->first();
        return $userData;
    }

    public function banUsers($id)
    {
        $users = new UsersModel;
        $user = $users->find($id);
        $user->status = 0;
        $user->save();

        array_push($_SESSION["success"], "ปิดกั้นผู้ใช้สำเร็จ!");

        return header('Location: http://'.$_SERVER["HTTP_HOST"].'/backoffice/ManageUsers.php');
    }

    public function unbannedUsers($id)
    {
        $users = new UsersModel;
        $user = $users->find($id);
        $user->status = 1;
        $user->save();

        array_push($_SESSION["success"], "ยกเลิกการปิดกั้นผู้ใช้สำเร็จ!");

        return header('Location: http://'.$_SERVER["HTTP_HOST"].'/backoffice/ManageUsers.php');
    }
    
    public function updateUser($userInfo)
    {
        $validator = new Validator;

        $validation = $validator->validate($userInfo, [
            'username'          =>  'required|min:5',
            'firstName'         =>  'required',
            'lastName'          =>  'required',
            'age'               =>  'required|numeric',
            'phone'             =>  'required|min:10',
            'email'             =>  'required|email',
            'organization'      =>  'required',
        ]);

        // handling errors
        if ($validation->fails()) {
            $_SESSION["error"] = $validation->errors()->all();
            return header('Location: http://'.$_SERVER["HTTP_HOST"].'/backoffice/UpdateUser.php?id='.$_SESSION['update_id']);
        }

        if ($userInfo['password']) {
            $validation = $validator->validate($userInfo, [
                'password'          =>  'required|min:6',
                'confirm_password'  =>  'required|same:password',
            ]);
    
            // handling errors
            if ($validation->fails()) {
                $_SESSION["error"] = $validation->errors()->all();
                return header('Location: http://'.$_SERVER["HTTP_HOST"].'/backoffice/UpdateUser.php?id='.$_SESSION['update_id']);
            }
        }

        $users = new UsersModel;

        // check unique attribute
        $username = $users->where('username', strtolower($userInfo['username']))
                        ->where('id','!=', $_SESSION['update_id'])
                        ->first();
        $phone = $users->where('phone', $userInfo['phone'])
                        ->where('id','!=', $_SESSION['update_id'])        
                        ->first();
        $email = $users->where('email', strtolower($userInfo['email']))
                        ->where('id','!=', $_SESSION['update_id'])        
                        ->first();

        if ($username) {
            array_push($_SESSION["error"], "ชื่อผู้ใช้นี้มีอยู่แล้ว!");
        }
        if ($phone) {
            array_push($_SESSION["error"], "เบอร์โทรนี้มีอยู่แล้ว!");
        }
        if ($email) {
            array_push($_SESSION["error"], "อีเมลล์นี้มีอยู่แล้ว!");
        }

        if ($_SESSION["error"]) {
            return header('Location: http://'.$_SERVER["HTTP_HOST"].'/backoffice/UpdateUser.php?id='.$_SESSION['update_id']);
        }

        // Update to DB
        $user = $users->find($_SESSION['update_id']);
        $user->username = strtolower($userInfo['username']);
        $user->firstName = $userInfo['firstName'];
        $user->lastName = $userInfo['lastName'];
        $user->age = $userInfo['age'];
        $user->phone = $userInfo['phone'];
        $user->email = strtolower($userInfo['email']);
        if ($userInfo['password']) {
            $user->password = password_hash($userInfo['password'], PASSWORD_DEFAULT);
        }
        $user->organization_id = $userInfo['organization'];
        $user->save();

        unset($_SESSION['update_id']);

        array_push($_SESSION["success"], "แก้ไขข้อมูลสำเร็จ!");

        return header('Location: http://'.$_SERVER["HTTP_HOST"].'/backoffice/ManageUsers.php');
        
    }

}

if (isset($_POST['addUser'])) {
    UsersClass::addUsers($_POST);
}

if (isset($_GET['ban'])) {
    UsersClass::banUsers($_GET['ban']);
}

if (isset($_GET['unbanned'])) {
    UsersClass::unbannedUsers($_GET['unbanned']);
}

if (isset($_POST['updateUser'])) {
    UsersClass::updateUser($_POST);
} 