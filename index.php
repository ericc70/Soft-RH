<?php
$uri=$_SERVER["REQUEST_URI"];
$controller='/';

if($uri !== "/"){

    $positionSlash=(strpos($uri,"/",1)=== false)? strlen($uri) : strpos($uri,"/",6);
    

    $controller=substr( $uri, 0, $positionSlash);
    

}

switch ($controller) {
    case '/':
    require_once 'controller/defaultController.php';
        break;
    case "/films":
    require_once 'controller/filmsController.php';
        break;
    case "/genres":
        require_once 'controller/genresController.php';
        break;
    case "/realisateurs":
        require_once 'controller/realisateursController.php';
        break;
    default:
        require_once 'view/page404.html.php';
        
}



?>