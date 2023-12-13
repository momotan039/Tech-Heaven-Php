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
        //PDO=>databaseType:host;dbname
        try {
            $this->con=new PDO('mysql:host='.$this->host.';dbname='.$this->db,$this->user,$this->pass);
        } catch (PDOException $err) {
            die('fiald to connect to database '.$err->getMessage());
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

