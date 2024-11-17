<?php

//Database connection

class Database{
    private $host = "localhost";
    private $dbname = "diji_store";
    private $username = "root";
    private $password = "";
    protected $connection;

  public function __construct(){
    try{
        $this->connection = new PDO("mysql:host=$this->host;
        dbname=$this->dbname", $this->username, $this->password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e){
        die("Connection failed: " . $e->getMessage());
    }
    //return $this->connection;
  }

}