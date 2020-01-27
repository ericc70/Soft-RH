<?php
$uri=$_SERVER["REQUEST_URI"];
$controller='/';

if($uri !== "/"){

    $positionSlash=(strpos($uri,"/",1)=== false)? strlen($uri) : strpos($uri,"/",6);
    var_dump($positionSlash);
    

    $controller=substr( $uri, 0, $positionSlash);
    var_dump($controller);

}

switch ($controller) {
    case '/':
    require_once 'core/Controller.php';
        break;
    case "/user":
    require_once 'controllers/voteController.php';
        break;
    case "/admin":
    require_once 'controllers/adminController.php';
        break;
 
    default:
        require_once 'views/page404.html.php';
        
}
?>