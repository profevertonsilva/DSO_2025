<?php

namespace App\Controller;

use FW\Controller\Action;
use App\DAO\AlunosDAO;
use App\Model\AlunosModel;


class LandingPageController extends Action{

    public function index(){
        $title = "alunos";
        $title_pagina = "Alunos";

        

        $this->getView()->title = $title;
        $this->getView()->title_pagina = $title_pagina;

        $this->render('index', '');
    }
    
    
    

    public function validaAutenticacao() {

        
    }
}
