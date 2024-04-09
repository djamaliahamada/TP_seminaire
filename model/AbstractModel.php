<?php


abstract class AbstractModel{
    
    protected $pdo;

    function __construct(){
        $this->pdo = new PDO("mysql:host=127.0.0.1;dbname=mvc_seminaire", "root", "", [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    

}