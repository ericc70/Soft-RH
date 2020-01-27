<?php


class DepartementController extends Controller{




    public function index(){
        $this->loadModel("departement");
        $films=$this->departement->getAll();
            // $this->render('index', ['films' => $films]);
            $this->render('index', compact('departement'));
    }
}