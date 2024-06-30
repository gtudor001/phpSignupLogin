<?php

class DB{

    private $host = 'localhost';
    private $user = 'tudor2';
    private $pwd = 'P@rola123';
    private $dbname = 'usertest';

    protected function dbconnection(){
        try{
            $pdo_data = 'mysql:host=' . $this->host . ";dbname=" . $this->dbname ;
            $db = new PDO($pdo_data,$this->user,$this->pwd);
            $db -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC); // get results from db in the form of a assoc array
            return $db;
            }
        catch(PDOException $e){
            echo $e->getMessage();
            die();
        }
    }



}