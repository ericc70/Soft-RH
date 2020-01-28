<<<<<<< HEAD
<h1>page departement</h1>
=======
<?php


class DepartementController extends Controller{




    public function index(){
        $this->loadModel("departement");
        $films=$this->departement->getAll();
            // $this->render('index', ['films' => $films]);
            $this->render('index', compact('departement'));
    }
}
>>>>>>> b5373d39a99d3b77ca4ff9f06f0bc244c9254b5c
