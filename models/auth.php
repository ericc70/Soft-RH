<?php

class auth extends Model{
  
    public function __construct(){
        $this->table ="utilisateur";
        $this->getConnection();


    }




public function login($name, $passwd){

//verifie que l'user et réel



     $sql="SELECT   count(id) as nb, id, departement_id, nom, prenom, `role` FROM utilisateur WHERE nom=:nom AND `password`= :password";
 
    
    $query = $this->_connexion->prepare($sql);
    $query->bindValue(':nom', $name, PDO::PARAM_STR);
    $query->bindValue(':password', $passwd, PDO::PARAM_STR);
    $query->execute();  
   $result = $query->fetch(PDO::FETCH_ASSOC);

   
     if($result['nb'] == 0){
         return false;
        }

    if($result['nb'] == 1){
         return $result;}




        



}




}