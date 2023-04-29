<?php

include_once __DIR__ . '/../libs/database.php';

class paymentModel
{
    public $methodName;
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function createMethod($methodName)
    {
        $query = "INSERT INTO `phuongthucthanhtoan`(`tenphuongthuc`) VALUES ('{$methodName}')";
        $result = $this->db->insert($query);
        if (!$result) {
            return false;
        }

        return true;
    }

    public function getMethod()
    {
        $query = 'SELECT * FROM `phuongthucthanhtoan`';
        $result = $this->db->select($query);
        if (!$result) {
            return false;
        }
        $method = [];
        while ($row = $result->fetch_assoc()) {
            $method[] = $row;
        }

        return $method;
    }
}
