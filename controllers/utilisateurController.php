<?php

class utilisateurController extends Controller{


    
    public function login($name, $passwd){
        
            $this->loadModel('utilisateur');
            $utilisateur=$this->utilisateur->login($name, md5($passwd));

        
            if ($utilisateur == false){
                 $err = "Login ou mot de pass invalide";
                   $this->render("login/index.twig",[

                    'erreur' => $err
                ]); 

            }
            else{
   
                    $_SESSION['id'] = (int)$utilisateur['id'];
                    $_SESSION['nom'] = $utilisateur['nom'];
                    $_SESSION['prenom'] = $utilisateur['prenom'];
                    $_SESSION['role'] = $utilisateur['role'];
                    $_SESSION['dpt'] = $utilisateur['departement_id'];
            }

            //twig
                if($utilisateur['role'] == 1) //admin
                {
                
                         header('Location: admin/index');
                }
                if($utilisateur['role'] == 2) //user
                {
                     header('Location: vote/index');
                }


    }
    public function isLogin(){

            if(isset($_SESSION['role']) && isset($_SESSION['nom']) && isset($_SESSION['id'] ) && isset($_SESSION['prenom'])){

                return true;
            }

 }

        public function isAdmin(){
            
            if (($_SESSION['role'])==1){
                return true;
            }

        }
        public function isUser(){
            if (($_SESSION['role'])==2){
                return true;
            }


        }


    public function logout(){
        //session destroy
        session_destroy();
       // $this->render("login/index.twig");
     
    }






}
