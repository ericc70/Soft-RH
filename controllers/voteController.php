<?php


class voteController extends Controller{


    public function vote(){
        $name="Eric";
        $age = 37;
        $price = 35.47;
        $technos = ['html', 'Javascript', 'php', 'css'];
        $peoples =[
            ['name' => 'Anthony', 'age' => 28, 'sexe' => "Male"],
            ['name' => 'Franck', 'age' => 27, 'sexe' => "Male"],
            ['name' => 'Aurélie', 'age' => 26, 'sexe' => "Female"]


        ];
        return $this->render('vote.twig',
        [
            'name' => $name,
            'age' => $age,
            'technos' => $technos,
            'peoples' => $peoples,
            'price' => $price
        ]);
        

    
    }
}