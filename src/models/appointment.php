<?php
 
 namespace App\models;
 use App\DbSession;
 require ("../DbSession.php");


class appointment {
    private ?int $id;
    private ?string $name;
    private ?string $topic;
    private ?string $date;
    private $database;
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

    public function getCoderName(){
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
        $this->database->mysql->query("INSERT INTO `{$this->table}` (`Name`, `Topic`) VALUES ('{$name}', '{$topic}');"); 
    }
    public static function all(){
        $database = new DbSession();
        $query = $database->mysql->query("SELECT *  FROM `appointment`");
        $appoimnetsArray = $query->fetchAll();
        $appoimnetslist = [];
        foreach ($tickectsArray as $appointment) {
            $appointmentItem = new self($appointment["name"], $appointment["topic"], $appointment["date"], $appointment["id"]);
            array_push($appoimnetslist, $appointmentItem);
        }
        return $appoimnetslist;
    }
    public function Delete(){
    }
            



}
