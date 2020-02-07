<?php

abstract class Model{



    //information de basse de donnees

    private $host="localhost";
    private $db_name="softrh";
    private $username="root";
    private $password="1234";


    //propriete contenant la connexion
    protected $_connexion;

    //proprietes contenant les informations de requêtes
    public $table;
    public $id;

    public function getConnection(){
        $this->_connexion =null;

       
        try{
            $this->_connexion = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->_connexion->exec("set names utf8");
        }
        catch(PDOException $exception){
            echo 'Erreur : '. $exception->getMessage();
        }
    }


    public function getAll(){
        $sql ="SELECT * FROM ".$this->table;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }


    public function getOne(){
        $sql ="SELECT * FROM ".$this->table ."WHERE id=" .$this->id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch();

    }
}