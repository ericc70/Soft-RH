<?php



class historiqueController extends Controller{

    public function hasVote( $idUser, $date){


        $this->loadModel('historique');
        $historiques=$this->historique->hasVote($idUser, $date);
   // var_dump($historiques);
        

        if($historiques['nb']== 0){

            echo "pas encore voté";
            //$vote = new voteController(); //??
            //$vote->add();//??
            $this->render("vote/vote.twig",[  ]);
         //   $historique->add();
        }
        if($historiques['nb'] == 1){
            echo "deja voté";
            //deja voter aujourd'hui
            $this->render("vote/vote-ok.twig",[  ]);
          //  sleep(5);
       //     echo "deconnection";
       
        }

    }




}
