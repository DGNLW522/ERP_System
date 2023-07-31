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

        $query = "SELECT i.id, i.invoice_no, i.date, c.first_name, t.item_name, t.item_category, t.unit_price FROM customer c JOIN invoice i ON (i.customer = c.id) JOIN invoice_master m ON (m.invoice_no = i.invoice_no) JOIN item t ON(t.id = m.item_id)";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }

        return $data;
    } 
}