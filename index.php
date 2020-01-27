<?php

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
// On sépare les paramètres et on les met dans le tableau $params
if (isset($_GET['p'])){
$params = explode('/', $_GET['p']);

//print_r($params);
}


switch ($params[0]) {
         case '':
        case'/':
        //login 
  //  require_once 'controllers/defaultController.php';
  echo "defaultcontroller";
        break;
    case "user":
        echo "user";
    require_once 'controllers/voteController.php';
    //view formulaire 
        break;
    case "admin":
        echo "admin";

        require_once 'controllers/voteController.php';

       if (!isset($params[1])){
           $params[1] ='/';
       }


        switch($params[1]){
            case 'jour':

            echo "resultat du jour";
            break;
            case 'mois':
                echo "mois";
            break;
            default :
                echo "selectionner mois ou jour";


        }

        //view resultat
        break;
    
    default:
       // require_once 'view/page404.html.php';
       echo "404";
        
}



?>