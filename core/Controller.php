<?php



abstract class Controller
{


    public function loadModel(string $model)
    {

        require_once(ROOT . 'models/' . $model . '.php');
        $this->$model = new $model();
    }

    public function render(string $fichier, array $data = [])
    {
        extract($data);


        //twig a installer ici
        require_once '/path/to/vendor/autoload.php';

        $loader = new \Twig\Loader\FilesystemLoader('/path/to/templates');
        $twig = new \Twig\Environment($loader, [
            'cache' => '/path/to/compilation_cache',
        ]);

        //on demare le buffer
        // ob_start();

        // require_once(ROOT. 'views/'.strtolower(get_class($this)).'/'.$fichier.'.php');

        // $content = ob_get_clean();
        // require_once(ROOT.'views/layouts/default.php');
    }
}
