<?php 
class historique extends Model{
  
    public function __construct(){
        $this->table ="historique";
        $this->getConnection();


    }

    public function hasVote($idUser, $date){
        $sql ="SELECT count(id)as nb FROM". $this->table." WHERE utilisateur_id=:id AND `date`=:date";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':id', $idUser, PDO::PARAM_INT);
        $query->bindValue(':date', $date);
        $query->execute();  
       $result = $query->fetch(PDO::FETCH_ASSOC);

       if($result['nb']==0){return false;}
        if($result['nb']==1){return true;}


    }



    public function add($idUser, $date){
        $sql="INSERT INTO ".$this->table."( `date`, `utilisateur_id`) VALUES ( :date, :iduser)";
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':date', $date);
        $query->bindParam(':iduser', $idUser, PDO::PARAM_INT);
        $query->execute();  
    }


}