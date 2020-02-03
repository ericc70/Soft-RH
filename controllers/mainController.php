<?php 

class mainController extends Controller{

public function index(){

}

/* page 404 */
public function notFound(){


}

public function formLogin(){

    $this->render("login/index.twig");

}


}