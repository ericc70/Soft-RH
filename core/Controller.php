<?php



abstract class Controller
{
    private $twig;

    public function loadModel(string $model)
    {

        require_once(ROOT . 'models/' . $model . '.php');
        $this->$model = new $model();
    }

    public function render($filename, $data = [])
    {
        // extract($data);


        //twig a installer ici

        require_once(ROOT . '/vendor/autoload.php');

        $loader = new \Twig\Loader\FilesystemLoader('views/');
        $twig = new \Twig\Environment($loader, [
            'cache' => false
        ]);
        

        // On charge notre vue
        $view =$twig->load($filename);
        

        // On récupère le contenu de la vue en lui passant nos données pour que la vue puisse les exploiter
        $content= $view->render($data);
        var_dump($data);
        echo $content;

        // return new voteController($content);
    }

    // $content = ob_get_clean();
    // require_once(ROOT.'views/layouts/default.php');
}
