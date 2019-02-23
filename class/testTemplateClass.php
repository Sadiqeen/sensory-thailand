<?php

// Require
require '../class/DatabaseClass.php';


// Class
class TestTemplateClass
{
   
    protected $templateName = "";
    protected $quantity = "";
    protected $questions = "";

    public function setTemplateName($templateName)
    {
        $this->templateName = $templateName;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function addQuestions($questions)
    {
        
        $this->questions = $questions;

    }

    public function save()
    {
        $templateID = $this->saveTemplateName();
        $column = array('questions','test_templates_id');
        $value = array();
        
        for ($i=0; $i < count($this->questions); $i++) { 
            array_push($value, array($this->questions[$i],$templateID));
        }

        $saveQuestions = new DatabaseClass;
        $saveQuestions->table('test_questions');
        $saveQuestions->insertMany($column,$value);
        $saveQuestions->success('../admin/manageTestTemplate.php','เพิ่มชุดคำถามสำเร็จ');
        $saveQuestions->query();
    }

    private function saveTemplateName()
    {
        $insertTemplateName = new DatabaseClass;
        $insertTemplateName->table('test_templates');
        $insertTemplateName->insertOne(
            array(
                'name' => $this->templateName,
                'quantity' => $this->quantity
            )
        );
        $insertTemplateName->query();
        return $insertTemplateName->getLastInsertID();
    }

    public function getTestTemplate()
    {
        $template = new DatabaseClass;
        $template->table('test_templates');
        return $template->all();
    }

    public function delTestTemplate($templateID)
    {
        $template = new DatabaseClass;
        $template->table('test_templates');
        $delID = array(
            'test_names_id' => $templateID
        );
        $template->delOne($delID);
        $template->success('../../admin/manageTestTemplate.php','ลบชุดคำถามสำเร็จ');
        $template->query();
    }

}

// Add Test Template
if (isset($_POST['addTestTemplate'])) {
    $template_name = ($_POST['template_name']) ? $_POST['template_name'] : '' ;
    $quantity = ($_POST['question_qt']) ? $_POST['question_qt'] : '' ;
    $questions = ($_POST['question']) ? $_POST['question'] : '' ;

    $testTemplate = new TestTemplateClass;
    $testTemplate->setTemplateName($template_name);
    $testTemplate->setQuantity($quantity);
    $testTemplate->addQuestions($questions);
    $testTemplate->save();
}

// Delete Test Template
if (isset($_GET['del'])) {
    $templateID = ($_GET['del']) ? $_GET['del'] : '' ;

    $testTemplate = new TestTemplateClass;
    $testTemplate->delTestTemplate($templateID);

}
