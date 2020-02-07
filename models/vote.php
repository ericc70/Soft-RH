<?php

class vote extends Model
{


    public function __construct()
    {
        $this->table = "vote";
        $this->getConnection();
    }

    public function getByDay($day)
    {
        if ($day == null) {
            $day = date('Y-m-d');
        }
        $sql = 'SELECT d.id as departement_id , count(case when v.date= :day then 1 end) as nbrVotantParDepartement, GROUP_CONCAT( CASE WHEN v.date = :day THEN v.humeur_id END ) AS humeur from departement d left join vote v on v.departement_id=d.id group by d.nom order by d.id asc';
        $query =  $this->_connexion->prepare($sql);
        $query->bindParam(':day', $day, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $retour = [];
        foreach ($results as $result) {
            $ret1 = $retour;
            $ee = explode(',', $result['humeur']);
            $humeur1 = 0;
            $humeur2 = 0;
            $humeur3 = 0;
            foreach ($ee as $row) {
                if ($row == 1) {
                    $humeur1++;
                }
                if ($row == 2) {
                    $humeur2++;
                }
                if ($row == 3) {
                    $humeur3++;
                }
            }
            $ret = [
                'departement_id' => $result['departement_id'],
                // 'mois' => $result['mois'],
                'nbrVotantParDepartement' => $result['nbrVotantParDepartement'],
                'humeur1' => [$humeur1],
                'humeur2' => [$humeur2],
                'humeur3' => [$humeur3]
            ];

            $retour = array_merge_recursive($ret1, $ret);
        }

        $json = json_encode($retour);
        //    var_dump($json);

        return $retour;

    }

    public function getByMonth($month )
    {
        if ($month == null) {
            $m = date('Y-m');
            $like ='%';
            $month=$m.$like;
        }
        $sql = "SELECT d.id as departement_id , count(case when v.date like :month then 1 end) as nbrVotantParDepartement, GROUP_CONCAT( CASE WHEN v.date like :month THEN v.humeur_id END ) AS humeur from departement d left join vote v on v.departement_id=d.id group by d.nom order by d.id asc";
        $query =  $this->_connexion->prepare($sql);
        $query->bindParam(':month', $month,  PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $retour = [];
        foreach ($results as $result) {
            $ret1 = $retour;
            $ee = explode(',', $result['humeur']);
            $humeur1 = 0;
            $humeur2 = 0;
            $humeur3 = 0;
            foreach ($ee as $row) {
                if ($row == 1) {
                    $humeur1++;
                }
                if ($row == 2) {
                    $humeur2++;
                }
                if ($row == 3) {
                    $humeur3++;
                }
            }
            $ret = [
                'departement_id' => $result['departement_id'],
              //  'mois' => $result['mois'],
                'nbrVotantParDepartement' => $result['nbrVotantParDepartement'],
                'humeur1' => [$humeur1],
                'humeur2' => [$humeur2],
                'humeur3' => [$humeur3]
            ];

            $retour = array_merge_recursive($ret1, $ret);
        }

        $json = json_encode($retour);
        //    var_dump($result);

        return $retour;
        //var_dump($json);
    }


    public function getByYear($year)
    {
        if ($year == null ) {
            
            $y = date('Y');
            $like ='%';
            $year=$y.$like;
        }
        $sql = "SELECT d.id as departement_id , count(case when v.date like :year then 1 end) as nbrVotantParDepartement, GROUP_CONCAT( CASE WHEN v.date like :year THEN v.humeur_id END ) AS humeur from departement d left join vote v on v.departement_id=d.id group by d.nom order by d.id asc";
        $query =  $this->_connexion->prepare($sql);
        $query->bindParam(':year', $year, PDO::PARAM_STR);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $retour = [];

        foreach ($results as $result) {
            $ret1 = $retour;
            $ee = explode(',', $result['humeur']);
            $humeur1 = 0;
            $humeur2 = 0;
            $humeur3 = 0;
            foreach ($ee as $row) {
                if ($row == 1) {
                    $humeur1++;
                }
                if ($row == 2) {
                    $humeur2++;
                }
                if ($row == 3) {
                    $humeur3++;
                }
            }
            $ret = [
                'departement_id' => $result['departement_id'],
              //  'mois' => $result['mois'],
                'nbrVotantParDepartement' => $result['nbrVotantParDepartement'],
                'humeur1' => [$humeur1],
                'humeur2' => [$humeur2],
                'humeur3' => [$humeur3]
            ];

            $retour = array_merge_recursive($ret1, $ret);
        }

        $json = json_encode($retour);
        //    var_dump($result);
        return $retour;

        //var_dump($json);
    }



    public function add($day , $departement, $humeur)
    {
        $sql="INSERT INTO `vote` (`date`, `departement_id`, `humeur_id`) VALUES ( :day, :departement, :humeur);";
        $query =  $this->_connexion->prepare($sql);
        $query->bindParam(':day', $day, PDO::PARAM_STR);
        $query->bindParam(':departement', $departement, PDO::PARAM_INT);
        $query->bindParam(':humeur', $humeur, PDO::PARAM_INT);
        $query->execute();
        
    }
}
