<?php



class authController extends Controller{

  /*  public function formLogin(){

        $this->render("login/index.twig");

    }*/


    public function login($name, $passwd){
        
        $this->loadModel('auth');
        $auth=$this->auth->login($name, md5($passwd));

    
        if ($auth == false){
             $err = "Login ou mot de passe invalide";
               $this->render("login/index.twig",[

                'erreur' => $err
            ]); 

        }
        else{

                $_SESSION['id'] = (int)$auth['id'];
                $_SESSION['nom'] = $auth['nom'];
                $_SESSION['prenom'] = $auth['prenom'];
                $_SESSION['role'] = $auth['role'];
                $_SESSION['dpt'] = $auth['departement_id'];
        }

        //twig
            if($auth['role'] == 1) //admin
            {
            
                     header('Location: admin/index');
            }
            if($auth['role'] == 2) //user
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


        public function ifUserPage($page){
            switch ($page){
                case 'add':
                    require_once 'controllers/historiqueController.php';
                    require_once 'controllers/voteController.php';
                    $histo = new historiqueController; 
                    $vote1 = new voteController;
                    //verifier $_POST['humeur'];
                    if (isset($_POST['humeur'])){

                        $humeur =(int)$_POST['humeur'];
                     
                     
                        if( $humeur != 1 && $humeur  != 2 && $humeur  != 3 )
                        {

                            
                           // echo "Erreur lors du traitement ";
                          
                           $this->render("vote/vote-bad.twig");
                            return false;
                           // header('Location: user');
                        } 
                      
                    }
                    
                    if($histo->hasVote($_SESSION['id'], date('Y-m-d'), false) == 0){
                        $vote1->add(date('Y-m-d'), $_SESSION['dpt'] , $_POST['humeur']);
                        $histo->add($_SESSION['id'], date('Y-m-d'));

                        echo "Merci pour votre vote, vous allez être deconnecté !";
                
                    }
                    else{echo "tu as déja voté";}
        
                  $this->logout('../login');
                  // header('Location:  ../login');


                    break;  

                }         
            

            if($this->islogin() && $this->isUser()){


            }


        }


        public function logout($redirection){
        //session destroy
        session_destroy();

        header('Location:'.  $redirection);
        
        }

public function verifLogin($name, $passwd){
   // if(!isset($name) || !isset($passwd)){
       if ($name =='' || $passwd==''){
     // echo "idendifiant non valide";
        require_once 'controllers/mainController.php';
        $main = new mainController;
        $main->formLogin();

}  
elseif(isset($name) && isset($passwd))
{
   
    $this->login(strip_tags($name), htmlentities($passwd));
}


}


}