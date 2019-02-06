<?php

require '../class/Class_TestTemplate.php';

$template_name = ($_POST['template_name']) ? $_POST['template_name'] : '' ;
$quantity = ($_POST['question_qt']) ? $_POST['question_qt'] : '' ;
$questions = ($_POST['question']) ? $_POST['question'] : '' ;

$testTemplate = new TestTemplate();
$testTemplate->setTemplateName($template_name);
$testTemplate->setQuantity($quantity);
$testTemplate->addQuestions($questions);
$testTemplate->save();

