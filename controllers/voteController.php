<?php

class voteController extends Controller
{

  public function getByDay($day)
  {

    $this->loadModel('vote');
    $vote = $this->vote->getByDay($day);

    $this->render('admin\resultat\day.twig',[
        'results' => $vote,
       
    ]);
 
  }

  public function getByMonth($month)
  {

    $this->loadModel('vote');
    $vote = $this->vote->getByMonth($month);
    $this->render('admin\resultat\month.twig',[
      'results' => $vote,
     
  ]);
  }

  public function getByYear($year)
  {

    $this->loadModel('vote');
    $vote = $this->vote->getByYear($year);
    $this->render('admin\resultat\year.twig',[
      'results' => $vote,
     
  ]);
  }



  public function add($day , $departement, $humeur)
  {
  

    $this->loadModel('vote');
    $vote = $this->vote->add($day , $departement, $humeur);
  }

}
