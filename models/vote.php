<?php

class vote extends Model{
  
  
    public function __construct(){
        $this->table ="vote";
        $this->getConnection();


    }

    public function getByDay($day){
        $sql = "SELECT MONTH(DATE) AS mois, COUNT(departement_id) AS nbrVotantParDepartement, GROUP_CONCAT(humeur_id) AS humeur, departement_id FROM vote WHERE date='2020-01-01' GROUP BY departement_id";
        $query =  $this->_connexion->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $retour=[];
        foreach($results as $result){
            $ret1=$retour;
            $ee= explode(',',$result['humeur']);
            $humeur1=0;
            $humeur2=0;
            $humeur3=0;
            foreach($ee as $row){
                if ($row == 1){$humeur1++;}
                if ($row == 2){$humeur2++;}
                if ($row == 3){$humeur3++;}
            }
            $ret=[
                        'departement_id' => $result['departement_id'],
                        'mois'=>$result['mois'],
                        'nbrVotantParDepartement' => $result['nbrVotantParDepartement'],
                        'humeur1' => $humeur1,
                        'humeur2' => $humeur2,
                        'humeur3' => $humeur3
                    ];
                
               $retour= array_merge_recursive($ret1, $ret);
                   
        }
     
          $json= json_encode($retour);
        //    var_dump($result);
        

var_dump($json);

    }

    public function getByMonth($month){


    }

    public function getByYear($year){

        
    }


    public function add(){

    }
    

}