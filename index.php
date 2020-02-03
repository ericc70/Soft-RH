<?php
 session_start();
<<<<<<< HEAD
//  echo md5(123);
// $uri=$_SERVER["REQUEST_URI"];
// $controller='/';
=======
>>>>>>> 5809dfafd70ca02ed7444f207212d7d118af1cd4


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
require_once 'controllers/authController.php';
$auth = new authController;
require_once 'controllers/mainController.php';
$main = new mainController;

// On sépare les paramètres et on les met dans le tableau $params
if (isset($_GET['p'])){
$params = explode('/', $_GET['p']);

// print_r($params);
}




switch ($params[0]) {
        case '':
        case'/':
        //login 
  
        $main->formLogin();

        break;
    case "vote":
        if($auth->islogin() && $auth->isUser()){

        if (!isset($params[1])){
        $params[1] ='/';
    }
    switch($params[1]){
        case '':
    case '/':
        header('Location: vote/index');
    break;

        case 'index':
         
            $historique->hasVote($_SESSION['id'] ,date('Y-m-d'));
           
        break;
        case 'add':

         $auth->ifUserPage('add');

        break;
       default:
       $main->notFound();
    }

        }
        else{
            echo "login ou acces interdit";

        }
  break;


      
  
        case "admin":
      

            if($user->islogin() && $user->isAdmin()){



        if (!isset($params[1])){
            $params[1] ='/';
        }


            switch($params[1]){
                case 'index':
                    $user->render("admin/index.twig",['session' => $_SESSION, ]); 
                    
                break;

                case 'resultat':
                    switch($params[2]){
                    case 'day':
                    $vote->getByDay(null);
                    break;
                    case 'month':
                    $vote->getByMonth(null);
                    break;
                    case 'year':
                    $vote->getByYear(null);
                    break;
                    default:
                    $main->notFound();
                    }

                break;
        
            
                default :
                    echo "selectionner mois/ jour /annee";


            }

            }
            else{echo"login";}


            //view resultat
            break;
    case "logout":
        $auth->logout();
     
    break;

    case "login":
     //  var_dump($_POST);
//        if(!isset($_POST['inptName']) && !isset($_POST['passwd'])){
//         $main->formLogin();
// }
//         if(isset($_POST['inptName']) && isset($_POST['passwd'])){

//             $name=strip_tags($_POST['inptName']);
//             $passwd = $_POST['passwd'];
//              $user->login($name, $passwd);
//         }
if(isset($_POST['inptName']) && isset($_POST['passwd'])){
        $auth->verifLogin( $_POST['inptName'] , $_POST['passwd']);
} else {   $main->formLogin();}
    break;
    default:
<<<<<<< HEAD
       require_once 'views/error404.html.twig';
        
=======
       // require_once 'view/page404.html.php';
       $main->notFound();
>>>>>>> 5809dfafd70ca02ed7444f207212d7d118af1cd4
}
