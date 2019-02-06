<?php

require "../class/Database.php";

$tsa = new Database();
$tsa->table('test1');
$col = array('test1','test2','test3');
$value = array(
    array('a1','a2','a3'),
    array('a1','a2','a3'),
    array('a1','a2','a3'),
);
$tsa->insertMany($col,$value);