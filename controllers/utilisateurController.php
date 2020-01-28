<?php

class utilisateurController extends Controller{


    public function login(){
        
        //recuper $_POST
       // if (isset($_POST['name']) && isset($_POST['passwd'])){
          //  $name = strip_tags($_POST['name']);
           // $passwd = md5($_POST['passwd']);
$name="hhh";
$passwd="hhhh";


            $this->loadModel('utilisateur');
            $utilisateur=$this->utilisateur->login($name, $passwd);

            var_dump($utilisateur);
            if ($utilisateur == false){
                echo "Login ou mot de pass invalide";
            }
            else{

                    session_start();



            }

            //twig
                if($utilisateur['role'] == 1) //admin
                {

                    return   $this->render("admin/index.twig",[]); 
                }
                if($utilisateur['role'] == 2) //user
                {
                    return   $this->render("user/vote.twig",[]);

                }



        
       // }
    }




    public function logout(){
        //session destroy

    }






}