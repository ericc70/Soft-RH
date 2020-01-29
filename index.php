<?php
 session_start();
// $uri=$_SERVER["REQUEST_URI"];
// $controller='/';

// if($uri !== "/"){

//     $positionSlash=(strpos($uri,"/",1)=== false)? strlen($uri) : strpos($uri,"/",6);
    

//     $controller=substr( $uri, 0, $positionSlash);
    

// }

// On génère une constante contenant le chemin vers la racine publique du projet
define('ROOT', str_replace('index.php','',$_SERVER['SCRIPT_FILENAME']));
// On appelle le modèle et le contrôleur principaux
require_once(ROOT.'core/Model.php');
require_once(ROOT.'core/Controller.php');
require_once(ROOT.'/vendor/autoload.php');


require_once 'controllers/utilisateurController.php';
$user = new utilisateurController;
require_once 'controllers/historiqueController.php';
$historique = new historiqueController;
require_once 'controllers/voteController.php';
$vote = new voteController;


// On sépare les paramètres et on les met dans le tableau $params
if (isset($_GET['p'])){
$params = explode('/', $_GET['p']);

//print_r($params);
}




switch ($params[0]) {
         case '':
        case'/':
        //login 
  
        echo "defaultcontroller";

        $vote->getByDay();
            $user->login();



        break;
    case "user":


        echo "user";
        
        if($user->islogin() && $user->isUser()){

            $historique->hasVote($_SESSION['id'] ,$date);
        require_once 'controllers/voteController.php';
        //include dans controleur historique ?
       //    $vote = new voteController();
       //   $vote->vote();
       //     //view formulaire 
       if (!isset($params[1])){
        $params[1] ='/';
    }
    switch($params[1]){
        case 'index':
            echo"page index user";
        break;
        case 'add':
            //ajout du vote
            //formulaire
        break;
    default:
    }

        }
        else{
            echo "login ou acces interdit";

        }


        break;
    case "admin":
      

        if($user->islogin() && $user->isAdmin()){


        //require_once 'controllers/voteController.php';

       if (!isset($params[1])){
           $params[1] ='/';
       }


        switch($params[1]){
            case 'index':
            echo"page index admin";
            break;
            case 'jour':

            echo "resultat du jour";
            break;
            case 'mois':
                echo "mois";
            break;
            default :
                echo "selectionner mois ou jour";


        }

        }
        else{echo"login";}


        //view resultat
        break;
    case "logout":
        $user->logout();
    break;
    default:
       // require_once 'view/page404.html.php';
       echo "404";
        
}
