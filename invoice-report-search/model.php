<?php

class Model
{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "erp_system";
    private $conn;
 
    public function __construct()
    {
        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
        } catch (\Throwable $th) {
            //throw $th;
            echo "Connection error " . $th->getMessage();
        }
    }
 
    // Fetch Records

    public function fetch()
    {
        $data = [];

        $query = "SELECT i.id, i.invoice_no, i.date, c.first_name, c.district, i.item_count, i.amount FROM customer c INNER JOIN invoice i ON i.customer = c.id";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }

        return $data;
    } 
}