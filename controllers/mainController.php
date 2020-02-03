<?php

    class mainController extends Controller {

    public function index(){

    }

    /* page 404*/
    public function notFound(){
        $this->render("views/error404.twig");
    }

}