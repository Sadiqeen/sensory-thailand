<?php
namespace Classes;
require_once __DIR__ . '/../boot/load.php';

use Model\OrganizationModel;
use Rakit\Validation\Validator;

// Class
class OrganizationClass
{
    public function addOrganization($organization_data)
    {
        $validator = new Validator;

        $validation = $validator->validate($organization_data, [
            'name'          =>  'required|min:5',
            'tel'           =>  'required|min:10|max:10',
            'email'         =>  'required|email',
        ]);

        // handling errors
        if ($validation->fails()) {
            $_SESSION["error"] = $validation->errors()->all();
            return header('Location: http://'.$_SERVER["HTTP_HOST"].'/backoffice/Organization.php');
        }

        $og = new OrganizationModel;

        // check unique attribute
        $name = $og->where('name', strtolower($organization_data['name']))->first();
        $tel = $og->where('tel', strtolower($organization_data['tel']))->first();
        $email = $og->where('email', strtolower($organization_data['email']))->first();

        if ($name) {
            array_push($_SESSION["error"], "ชื่อองค์กรนี้มีอยู่แล้ว!");
        }
        if ($tel) {
            array_push($_SESSION["error"], "เบอร์โทรนี้มีอยู่แล้ว!");
        }
        if ($email) {
            array_push($_SESSION["error"], "อีเมลล์นี้มีอยู่แล้ว!");
        }

        if ($_SESSION['error']) {
            return header('Location: http://'.$_SERVER["HTTP_HOST"].'/backoffice/Organization.php');
        }

        $og->name = strtolower($organization_data['name']);
        $og->tel = strtolower($organization_data['tel']);
        $og->email = strtolower($organization_data['email']);
        $og->save();

        array_push($_SESSION["success"], "เพิ่มองค์กรสำเร็จ!");

        return header('Location: http://'.$_SERVER["HTTP_HOST"].'/backoffice/Organization.php');
    }

    public function getAllOrganization()
    {
        $og = OrganizationModel::withCount('users')->get();
        return $og;
    }
}

// Request from front
if (isset($_POST['add'])) {
    OrganizationClass::addOrganization($_POST);
}