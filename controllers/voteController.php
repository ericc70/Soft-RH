<?php



class voteController extends Controller{

public function getByDay($day){

  $this->loadModel('vote');
            $vote=$this->vote->getByDay($day);
}
    
   public function add(){
     echo"ajout du vote";
   } 
    
}