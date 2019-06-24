<?php
namespace Classes;
require_once __DIR__ . '/../boot/load.php'; 

// Class
class UploadClass
{
    public function Upload($file, $file_name)
    {
        $path = __ROOT__.getenv('IMAGE_PATH');
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        if(move_uploaded_file($file["tmp_name"], $path.$file_name.'.'.$ext))
        {
            return getenv('IMAGE_PATH').$file_name.'.'.$ext;
        } else {
            $_SESSION["error"] = "ผิดพลาด";
            return header('Location: http://'.$_SERVER["HTTP_HOST"].'/backoffice/AddTest.php');
        }
    }
}