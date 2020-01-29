<?php



class voteController extends Controller{

public function getByDay(){

  $this->loadModel('vote');
            $vote=$this->vote->getByDay();
}
    
    
    
}