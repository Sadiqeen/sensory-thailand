<?php

require '../class/ConnectClass.php';

class DeleteClass extends ConnectClass
{

    public function delOne($where)
    {
        $this->query = "DELETE FROM `$this->table` WHERE ";
        $i = 0;
        $count = count($where)-1;
        foreach ($where as $key => $value) {
            $this->query .= " `$key` = '$value'";
            $i++;
            if ($i> 0 && $i<$count) {
                $this->query .= " AND ";
            }
        }
    }
}

