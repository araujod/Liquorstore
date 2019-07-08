<?php
require_once 'db_connect.php';

class DB_Functions{
    private $conn;

    function __construct()
    {
        $db = new DB_Connect();
        $this->conn = $db->connect();
    }

    public function checkExistsUser($email)
    {
        $stmt = $this->conn->prepare("SELECT * FROM User WHERE email=?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows > 0)
        {
            $stmt->close();
            return true;
        }
        else
        {
            $stmt->close();
            return false;
        }
    }

    public function registerNewUser($phone, $name,$birthdate,$address,$email)
    {
        $stmt = $this->conn->prepare("INSERT INTO user(Phone, Name, Birthdate, Address, email) VALUES(?,?,?,?,?)");
        $stmt->bind_param("sssss",$phone, $name,$birthdate,$address,$email);
        $result = $stmt->execute();
        $stmt->close();

        if($result)
        {
            $stmt=$this->conn->prepare("SELECT * FROM User WHERE email = ?");
            $stmt->bind_param("s",$email);
            $stmt->execute();
            $user=$stmt->get_result()->fetch_assoc();
            $stmt->close();
            return $user;
        }
        else
        {
            return false;
        }


    }



}
?>