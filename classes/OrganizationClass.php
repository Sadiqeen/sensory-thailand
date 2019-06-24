<?php
namespace Classes;
require_once __DIR__ . '/../boot/load.php';

use Model\OrganizationModel;

// Class
class OrganizationClass
{
    public function addOrganization($name, $tel, $email)
    {
        $og = new OrganizationModel;
        $og->name = $name;
        $og->tel = $tel;
        $og->email = $email;
        $og->save();

        $_SESSION["success"] = "เพิ่มองค์กรสำเร็จ";

        return header('Location: http://'.$_SERVER["HTTP_HOST"].'/backoffice/Organization.php');
    }

    public function getAllOrganization()
    {
        $og = OrganizationModel::limit(15)->get();
        return $og;
    }
}

// Request from font
if (isset($_POST['add'])) {
    OrganizationClass::addOrganization($_POST['name'], $_POST['tel'], $_POST['email']);
}