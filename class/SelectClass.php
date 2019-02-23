<?php

// Require
require '../class/InsertClass.php';

// Class
class SelectClass extends InsertClass
{

    protected $result = array();

    public function all()
    {
        $this->query = "SELECT * FROM `$this->table`";
        return $this->querySelect();
    }

    private function querySelect()
    {
        $conn = new mysqli($this->host, $this->user, $this->pass,$this->db);
        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        }
        mysqli_set_charset($conn,"utf8");
        $resultQuery = $conn->query($this->query);
        $resultReturn = array();
        if ($resultQuery->num_rows > 0) {
            // output data of each row
            while($row = $resultQuery->fetch_row()) {
                array_push($resultReturn,$row);
            }
            return $resultReturn;
        } else {
            echo "0 results";
        }

        $conn->close();
    }
}
