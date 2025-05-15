<?php

namespace App\Model;

class UsuariosModel
{
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $status;
    
    

    public function __set($nome, $valor)
    {
        $this->$nome = $valor;
    }

    public function __get($nome)
    {
        return $this->$nome;
    }
}
