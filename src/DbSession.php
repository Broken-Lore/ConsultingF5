<?php

namespace App;

use PDO;
use PDOException;

class DbSession{

    public $mysql;

    public function __construct()
    { 
        try {
            $this->mysql = $this->getConnection();
            echo "conection succesful";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }
    private function getConnection(){
        $host = "localhost";
        $user = "root";
        $password = "";
        $dtbase = "consulting";
        $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
        $pdo = new PDO("mysql:host=$host; dbname=$dtbase", $user, $password, $options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

}