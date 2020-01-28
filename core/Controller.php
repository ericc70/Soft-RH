<?php



abstract class Controller{
    private $twig;

public function loadModel(string $model){

    require_once(ROOT.'models/'. $model.'.php');
    $this->$model = new $model();
}

public function render($filename, $data = []){
    // extract($data);

    
//twig a installer ici


    //on demare le buffer
    // ob_start();

    // require_once(ROOT. 'views/'.strtolower(get_class($this)).'/'.$fichier.'.php');

    // $content = ob_get_clean();
    // require_once(ROOT.'views/layouts/default.php');

    require_once  (ROOT .'/vendor/autoload.php');

    $loader = new \Twig\Loader\FilesystemLoader('views/user/');
    $twig = new \Twig\Environment($loader, [
        'cache' => 'false'
    ]);

    
    // On charge notre vue
    $view = $this->twig->load($filename);
  
    // On récupère le contenu de la vue en lui passant nos données pour que la vue puisse les exploiter
    $content = $view->render($data);

}

}