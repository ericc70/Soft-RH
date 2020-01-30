<?php 
class historique extends Model{
  
    public function __construct(){
        $this->table ="historique";
        $this->getConnection();


    }

    public function hasVote($idUser, $date){
        $sql ="SELECT count(id) as nb FROM historique WHERE utilisateur_id=:id AND `date`=:date";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':id', $idUser, PDO::PARAM_INT);
        $query->bindParam(':date', $date,  PDO::PARAM_STR);
        $query->execute();  
       $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result;

    }



    public function add($idUser, $date){
        $sql="INSERT INTO ".$this->table."( `date`, `utilisateur_id`) VALUES ( :date, :iduser)";
        $query = $this->_connexion->prepare($sql);
        $query->bindValue(':date', $date);
        $query->bindParam(':iduser', $idUser, PDO::PARAM_INT);
        $query->execute();  
    }


}