<?php

class Database
{

    protected $host;
    protected $db;
    protected $user;
    protected $pass;
    protected $table;


    public function __construct()
    {
        include "../config.php";
        $this->host = $db_info['host'];
        $this->db = $db_info['db'];
        $this->user = $db_info['user'];
        $this->pass = $db_info['pass'];
    }

    // @param String table name
    
    public function table($table)
    {
        $this->table = $table;
    }


    // Redirect if success

    public function success($path, $message) {
        $_SESSION['success'] = $message;
        header ('Location: '.$path);
    }

    public function error()
    {
        header ('Location: ../error/Query_error.php');
    }
}
