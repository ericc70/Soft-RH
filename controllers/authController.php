<?php



class authController extends Controller{

  /*  public function formLogin(){

        $this->render("login/index.twig");

    }*/


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


        public function ifUserPage($page){
            switch ($page){
                case 'add':
                    require_once 'controllers/historiqueController.php';
                    require_once 'controllers/voteController.php';
                    $histo = new historiqueController; 
                    $vote1 = new voteController;
                    if($histo->hasVote($_SESSION['id'], date('Y-m-d'), false) == 0){
                        $vote1->add(date('Y-m-d'), $_SESSION['dpt'] , $_POST['humeur']);
                        $histo->add($_SESSION['id'], date('Y-m-d'));

                        echo "Merci pour votre vote, vous allez être deconnecté !";
                
                    }
                    else{echo "tu as déja voté";}
        
                    $this->logout();
                    break;  

                }         
            

            if($this->islogin() && $this->isUser()){


            }


        }


        public function logout(){
        //session destroy
        session_destroy();

        header('Location:  login');
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