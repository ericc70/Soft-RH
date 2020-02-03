<?php

class voteController extends Controller
{

  public function getByDay($day)
  {

    $this->loadModel('vote');
    $vote = $this->vote->getByDay($day);
  }

  public function getByMonth($month)
  {

    $this->loadModel('vote');
    $vote = $this->vote->getByMonth($month);
  }

  public function getByYear($year)
  {

    $this->loadModel('vote');
    $vote = $this->vote->getByYear($year);
  }


  public function add($day , $departement, $humeur)
  {

    $this->loadModel('vote');
    $vote = $this->vote->add($day , $departement, $humeur);
  }

}
