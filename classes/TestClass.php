<?php
namespace Classes;
require_once __DIR__ . '/../boot/load.php';

use Classes\UploadClass;
use Model\TestQuestionInfoModel;
use Model\TestQuestionsModel;
use Model\TemplateQuestionModel;


// Class
class TestClass
{
    public function addTest($info, $pre_test, $image)
    {
        $file = new UploadClass;
        $template_question = TemplateQuestionModel::where('template_id', $info['template_id'])->get();
        // Upload image
        $info_cover = $file->upload($image['test_cover'], time()."_".$info['template_id']);

        $info_db = new TestQuestionInfoModel;
        $info_db->name = $info['test_name'];
        $info_db->info = $info['test_info'];
        $info_db->cover = $info_cover;
        $info_db->method = $info['method'];
        $info_db->organization = $info['organization'];
        $info_db->test_template_info_id = $info['template_id'];
        $info_db->save();

        for ($i=0; $i < count($template_question); $i++) {
            $image_upload = array(
                'name' => $image['test_image']['name'][$i],
                'type' => $image['test_image']['type'][$i],
                'tmp_name' => $image['test_image']['tmp_name'][$i],
                'error' => $image['test_image']['error'][$i],
                'size' => $image['test_image']['size'][$i],
            );
            $path = $file->upload($image_upload, time()."_".$i."_".$info['template_id']);

            $question = new TestQuestionsModel;
            $question->test_question_info_id = $info_db->id;
            $question->test_template_question_id = $template_question[$i]['id'];
            $question->image = $path;
            $question->save();

            $_SESSION["success"] = "เพิ่มการทดสอบสำเร็จ";

            return header('Location: http://'.$_SERVER["HTTP_HOST"].'/backoffice/AddTest.php');
        }

    }

    public function test($file)
    {
        echo 'test';
        UploadClass::upload($file, 'test');
    }
}

if (isset($_POST['add_test'])) {
    // info
    $info = array(
        'method' => $_POST['method'],
        'organization' => $_POST['organization'],
        'test_name' => $_POST['test_name'],
        'test_info' => $_POST['test_info'],
        'template_id' => $_POST['template']
    );

    $pre_test = array(
        'gender' => $_POST['gender'],
        'age' => $_POST['age'],
        'education' => $_POST['education'],
        'career' => $_POST['career']
    );

    $image = array(
        'test_cover' =>  $_FILES['test_cover'],
        'test_image' =>  $_FILES['test_image']
    );
    
    TestClass::addTest($info, $pre_test, $image);
}