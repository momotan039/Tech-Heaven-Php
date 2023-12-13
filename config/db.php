<?php
class DBConnect{
    private $host;
    private $user;
    private $pass;
    private $db;
    private $con;
     function __construct($host,$user,$pass,$db) {
        $this->host=$host;
        $this->user=$user;
        $this->pass=$pass;
        $this->db=$db;
    }
     function connect(){
        $this->con=new mysqli($this->host,$this->user,$this->pass,$this->db);
        if($this->con->connect_error){
            die('fiald to connect to database '.$this->con->connect_error);
        }
        return $this->con;
    }
    function close(){
        if($this->con)
        $this->con->close();
    }
}

$dbConnect=new DBConnect('localhost','root','','test');
$con=$dbConnect->connect();