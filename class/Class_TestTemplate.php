<?php

require '../class/Insert.php';

class TestTemplate
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

        $saveQuestions = new Insert();
        $saveQuestions->table('test_questions');
        $saveQuestions->insertMany($column,$value);
        $saveQuestions->success('../admin/addTestTemplate.php','เพิ่มชุดคำถามสำเร็จ');
        $saveQuestions->query();
    }

    private function saveTemplateName()
    {
        $insertTemplateName = new Insert();
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
}
