<pre>
<?php
$str = "1,2,2,1,3,1,2,2,1,2,2,1,3,1,2,2";
// $nbr=explode(',',$str);
foreach (count_chars($str, 1) as $i => $val) {
    if (chr($i) ==',') {
        continue;
    }
    echo "Il y a $val occurence(s) de \"", chr($i), "\" dans la phrase.\n";
}

?></pre><?php

        class vote extends Model
        {


            public function __construct()
            {
                $this->table = "vote";
                $this->getConnection();
            }

            public function getByDay($day)
            {


                $sql = "SELECT now() as jour, departement_id AS Departement, COUNT(departement_id) as nbrVotantParDepartement, GROUP_CONCAT(humeur_id) AS HumeurChacun FROM `vote` WHERE date=now() GROUP BY departement_id";


                $query = $this->_connexion->prepare($sql);
                
                $query->execute();
                $result = $query->fetch(PDO::FETCH_ASSOC);

                echo $query;
              
                
            }

            public function getByMonth($month)
            {

                "SELECT month(date)as mois, departement_id AS Departement, COUNT(departement_id) as nbrVotantParDepartement, GROUP_CONCAT(humeur_id) AS HumeurChacun FROM `vote` WHERE SUBSTR(DATE, 1, 4) = YEAR(NOW()) and SUBSTR(DATE, 6, 2) = 1 GROUP BY departement_id";
            }

            public function getByYear($year)
            {
                "SELECT year(date)as annee, departement_id AS Departement, COUNT(departement_id) as nbrVotantParDepartement, GROUP_CONCAT(humeur_id) AS HumeurChacun FROM `vote` WHERE SUBSTR(DATE, 1, 4) = YEAR(NOW()) GROUP BY departement_id";
            }
        }
