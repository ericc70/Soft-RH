<?php

class historiqueController extends Controller{

    public function hasVote($idUser, $date){


        $this->loadModel('historique');
        $historique=$this->historique->hasVote($idUser, $date);
    //  $etat=(  $historique->hasVote() = true) ? 'deconnection' : 'affiche vote';

        if($historique->hasVote() == true){

            //deja voter aujourd'hui
        }

        if($historique->hasVote() == false){

            $vote = new voteController(); //??
            $vote->add();//??

            $historique->add();
        }


    }




}
