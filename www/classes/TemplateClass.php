<?php
namespace Classes;
require_once __DIR__ . '/../boot/load.php'; 

use Model\TestTemplateInfoModel;
use Model\TemplateQuestionModel;

// Class
class TemplateClass
{
    public function __construct()
    {
        // 
    }

    public function addTemplate($template_name, $question_quantity, $questions)
    {
        if (TestTemplateInfoModel::where('template_name', $template_name)->first()) {
            $_SESSION["error"] = ["ชื่อชุดคำถามนี้ถูกใช้แล้ว"];
            return header('Location: http://'.$_SERVER["HTTP_HOST"].'/backoffice/TestTemplate.php');
        }
        $template_info = new TestTemplateInfoModel;
        $template_info->template_name = $template_name;
        $template_info->question_quantity = $question_quantity;
        $template_info->save();

        foreach ($questions as $item) {
            $question = new TemplateQuestionModel;
            $question->template_id = $template_info->id;
            $question->question = $item;
            $question->save();
        }

        $_SESSION["success"] = "เพิ่มคำถามสำเร็จ";
        return header('Location: http://'.$_SERVER["HTTP_HOST"].'/backoffice/TestTemplate.php');
    }

    public function deleteTemplate ($id)
    {
        $template_info = new TestTemplateInfoModel;
        $template_info->destroy($id);

        $_SESSION["success"] = "ลบข้อมูลสำเร็จ";

        return header('Location: http://'.$_SERVER["HTTP_HOST"].'/backoffice/ManageTemplate.php');
    }

    public function getTestTemplate()
    {
        $template_info = new TestTemplateInfoModel;
        return $template_info->all();
    }

    public function getTest($templateId)
    {
        $test = new TemplateQuestionModel;
        $questions = $test->where('template_id', $templateId)->get();
        echo $questions;
    }
}

// Request from front
if (isset($_POST['addTemplate'])) {
    $template_name = $_POST['template_name'];
    $question_quantity = $_POST['question_qt'];
    $questions = $_POST['questions'];
    TemplateClass::addTemplate($template_name, $question_quantity, $questions);
}

if (isset($_GET['templateId'])) {
    TemplateClass::getTest($_GET['templateId']);
}

if (isset($_GET['del'])) {
    TemplateClass::deleteTemplate($_GET['del']);
}
