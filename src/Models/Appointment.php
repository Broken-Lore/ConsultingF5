<?php
 
 namespace App\Models;

use App\Core\View;
use App\DbSession;
 


class Appointment {
    private ?int $id;
    private ?string $name;
    private ?string $topic;
    private ?string $date;
    public $database;
    private $table ='appointment';

    public function __construct (string $name = null, string $topic = null, $date = null, int $id = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->topic = $topic;
        $this->date = $date;


        if (!$this->database){
            $this->database = new DbSession();
        }
    }
  

    public function getName(){
        return $this->name;
    }
    public function getId(){
        return $this->id;
    }
    public function getTopic(){
        return $this->topic;
    }
    public function getDate(){
        return $this->date;
    }
    public function renameName($name){
        $this->name = $name;
    }
    public function changeTopic($topic){
        $this->topic = $topic;
    }
    public function save($name, $topic): void
    {
        $this->database->mysql->query("INSERT INTO `{$this->table}` (`Name`, `Topic`) VALUES ('{$name}','{$topic}');"); 
    }
    public static function all(){
        $database = new DbSession();
        $query = $database->mysql->query("SELECT *  FROM `appointment`");
        $appointmentsArray = $query->fetchAll();
        $appointmentslist = [];
        foreach ($appointmentsArray as $appointment) {
            $appointmentsItem = new self($appointment["name"], $appointment["topic"], $appointment["date"], $appointment["id"]);
            array_push($appointmentslist, $appointmentsItem);
        }
        return $appointmentslist;
    }
    public function Delete(){
        $this->database->mysql->query("DELETE FROM `appointment` WHERE `appointment`.`id` = {$this->id}");
    }

    public function findById($id){
        $query = $this->database->mysql->query("SELECT * FROM `appointment` WHERE `id` = {$id}");
        $result = $query->fetchAll();

        return new Appointment($result[0]["name"], $result[0]["topic"], $result[0]["date"],$result[0]["id"]);
    }

    public function Update()
    {
        $this->database->mysql->query("UPDATE `appointment`SET `name` =  '{$this->name}', `topic` =  '{$this->topic}' WHERE `id` = {$this->id}"); 
    }

}
