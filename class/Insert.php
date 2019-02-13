<?php

require '../class/Select.php';

class Insert extends Select
{
    protected $last_id;

    //  @param array
    //  @format "column" => "data"

    public function insertOne($data)
    {
        $i = 0;
        $count = count($data)-1;
        $column = "";
        $values = "";
        foreach($data as $key => $value){
            $column .= '`'.$key.'`';
            $values .= '"'.$value.'"';
            if ($i < $count) {
                $column .= ', ';
                $values .= ', ';
            }
            $i++;
        }
        $query = "insert into `".$this->table."` (".$column.") values (".$values.")";

        $this->query = $query;
    }

    //  @param array
    //  @format column >> array('col1',('col2'),('col3'))
    //  @format value >> array(
    //                      array('a1','a2','a3'),
    //                      array('a1','a2','a3'),
    //                      array('a1','a2','a3'),
    //                      )


    public function insertMany($column,$value)
    {
        $i = 0;
        $countColumn = count($column)-1;
        $columns = "";
        $values = "";
        foreach($column as $item){
            $columns .= '`'.$item.'`';
            if ($i < $countColumn) {
                $columns .= ', ';
            }
            $i++;
        }
        $i = 0;
        $countValue = count($value)-1;
        foreach($value as $item){
            $values .= '('.$this->loopInsertMany($item).')';
        $countValue = count($value)-1;
            if ($i < $countValue) {
                $values .= ', ';
            }
            $i++;
        }
        $query = "insert into `".$this->table."` ($columns) values $values";

        $this->query = $query;
    }

    // @param array -> value from insertMany
    // @param return string ='"val1","val2","val3"'

    private function loopInsertMany($item)
    {
        $values = '';
        $count = count($item);
        for ($i=0; $i < $count; $i++) { 
            $values .= '"'.$item[$i].'"';
            if ($i < $count-1) {
                $values .= ', ';
            }
        }
        return $values;
    }

    // Query sql

    public function query()
    {
        $conn = new mysqli($this->host, $this->user, $this->pass,$this->db);
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        mysqli_set_charset($conn,"utf8");

        if ($conn->query($this->query) !== TRUE)
        {
            $_SESSION['query'] = $this->query;
            $_SESSION['error'] = $conn->error;
            header ('Location: ../error/Query_error.php');
        }
        $this->last_id = $conn->insert_id;
        $conn->close();
    }

    public function queryReturn()
    {
        $conn = new mysqli($this->host, $this->user, $this->pass,$this->db);
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        mysqli_set_charset($conn,"utf8");

        if ($conn->query($this->query) !== TRUE)
        {
            return $conn->error;
        } else {
            $this->last_id = $conn->insert_id;
            return true;
        }
        $conn->close();
    }

    public function getLastInsertID()
    {
        return $this->last_id;
    }
}