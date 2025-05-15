<?php

namespace App\Controller;

use FW\Controller\Action;

use App\Model\UsuariosModel;
use App\DAO\UsuariosDAO;


class UsuariosController extends Action{

    public function index(){
        $title = "alunos";
        $title_pagina = "Alunos";

        

        $this->getView()->title = $title;
        $this->getView()->title_pagina = $title_pagina;

        $this->render('index', '');
    }

    public function cadastro(){
        $title = "Cadastro de Usuarios";
        $title_pagina = "Cadastro de Usuarios";


        

        

        $this->getView()->title = $title;
        $this->getView()->title_pagina = $title_pagina;

        $this->render('cadastro', '');
    }


    public function cadastrar(){

        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $status = $_POST["status"];


        /* print_r($nome." - ".$email." - ".$senha." - ".$status);
        exit; */

        $usuariosModel = new UsuariosModel();
        $usuariosModel->__set('nome',$nome);
        $usuariosModel->__set('email',$email);
        $usuariosModel->__set('senha',$senha);
        $usuariosModel->__set('status',$status);

        


        $usuariosDAO = new UsuariosDAO();
        $usuariosDAO->inserir($usuariosModel);
        header('Location: /dashboard/usuarios?success=1');
        



    }

    public function listar(){
        $title = "Cadastro de Usuarios";
        $title_pagina = "Cadastro de Usuarios";

        $usuariosDAO = new UsuariosDAO();
        $usuarios = $usuariosDAO->listar();
        $this->getView()->usuarios = $usuarios;

        $this->getView()->title = $title;
        $this->getView()->title_pagina = $title_pagina;

        $this->render('listar', '');
    }

    public function editar(){

        $id = $this->getParams()[0];


        $usuariosDAO = new UsuariosDAO();
        $usuarios = $usuariosDAO->buscarPorId($id);
        $this->getView()->usuarios = $usuarios;

        
        $this->render('editar', '');


    }


    public function alterar(){
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $status = $_POST["status"];

        $usuariosModel = new UsuariosModel();
        $usuariosModel->__set('id',$id);
        $usuariosModel->__set('nome',$nome);
        $usuariosModel->__set('email',$email);
        $usuariosModel->__set('senha',$senha);
        $usuariosModel->__set('status',$status);
        $usuariosDAO = new UsuariosDAO();
        $usuariosDAO->alterar($usuariosModel);
        header('Location: /dashboard/usuarios?success=1');
    }

    public function excluir(){
        $id = $this->getParams()[0];
        
        $usuariosDAO = new UsuariosDAO();
        $usuariosDAO->excluir($id);
        header('Location: /dashboard/usuarios?success=1');
    }
    
    
    

    public function validaAutenticacao() {

        
    }
}
