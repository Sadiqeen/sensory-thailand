<?php

require "../class/DatabaseClass.php";

$tsa = new DatabaseClass();
$tsa->table('test_templates');
$value = array(
    'col1' => '2', 
    'col2' => '3', 
    'col3' => '3',
);
$tsa->delOne($value);
