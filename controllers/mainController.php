<?php 

class mainController extends Controller{

        public function index(){
           
        }

        /* page 404 */
        public function notFound(){
            $this->render("error404.twig");
                
        }

        public function formLogin(){

            $this->render("login/index.twig");

        }


}