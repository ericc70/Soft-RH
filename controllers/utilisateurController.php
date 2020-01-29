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
                  

            }

            //twig
                if($utilisateur['role'] == 1) //admin
                {
                
                       $this->render("admin/index.twig",[
                         'session' => $_SESSION,

                     ]); 
                        // header('Location: admin/index');
                }
                if($utilisateur['role'] == 2) //user
                {
                       $this->render("user/vote.twig",[

                    ]);
                 //   header('Location: user');
                }



        
       // }
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
    }






}
