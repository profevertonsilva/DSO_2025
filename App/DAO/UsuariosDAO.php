<?php

namespace App\DAO;

use App\DAO;

use FW\Controller\FuncoesGlobais;

use App\Model\UsuariosModel;


class UsuariosDAO extends DAO{


    public function inserir($obj){
        try{
            $global = new FuncoesGlobais();
            $nome = $obj->__get('nome');
            $email = $obj->__get('email');
            $senha = $global->criptografar($obj->__get('senha'));
            $status = $obj->__get('status');
            $sql = "
                INSERT INTO usuarios (
                        nome,
                        email,
                        senha,
                        status
                    ) VALUES (
                        :nome,
                        :email,
                        :senha,
                        :status
                    )
            ";
            $stmt = $this->getConn()->prepare($sql);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":senha", $senha);
            $stmt->bindParam(":status", $status);
            $stmt->execute();

        }catch(\PDOException $ex){
            header('Location: '.$_ENV['BASE_URL'].'error404');
            die();
        }
    }
    public function excluir($obj){
        try{
            $id = $obj;
            $sql = "
                UPDATE usuarios SET 
                    status = 'I'
                WHERE id = :id
            ";
            $stmt = $this->getConn()->prepare($sql);
            $stmt->bindParam(":id", $id);
            if($stmt->execute()){
                return true;
            } else{
                return false;
            }

        }catch(\PDOException $ex){
            header('Location: '.$_ENV['BASE_URL'].'error404');
            die();
        }
    }
    public function alterar($obj){
        try{
            $global = new FuncoesGlobais();
            $id = $obj->__get('id');
            $nome = $obj->__get('nome');
            $email = $obj->__get('email');
            $senha = $global->criptografar($obj->__get('senha'));
            $status = $obj->__get('status');
            $sql = "
                UPDATE usuarios SET
                    nome = :nome,
                    email = :email,
                    senha = :senha,
                    status = :status
                WHERE id = :id
            ";
            $stmt = $this->getConn()->prepare($sql);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":senha", $senha);
            $stmt->bindParam(":status", $status);
            $stmt->bindParam(":id", $id);
            if($stmt->execute()){
                return true;
            } else{
                return false;
            }

        }catch(\PDOException $ex){
            header('Location: '.$_ENV['BASE_URL'].'error404');
            die();
        }
    }
    public function buscarPorId($obj){
        $sql = "
            SELECT 
                *
                FROM
                usuarios
                WHERE
                id = :id
        ";
        $stmt = $this->getConn()->prepare($sql);
        $stmt->bindParam(':id',$obj);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        $usuariosModel = new UsuariosModel();
        $global = new FuncoesGlobais();
        $global->popularModel($usuariosModel,$result);

        return $usuariosModel;
    }
    public function listar(){
        $usuarios = array();
        $sql = "
            SELECT 
                *
                FROM
                usuarios
        ";
        $stmt = $this->getConn()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        foreach($result as $row){

            $usuariosModel = new UsuariosModel();
            $global = new FuncoesGlobais();
            $global->popularModel($usuariosModel,$row);

            array_push($usuarios, $usuariosModel);

        }

        return $usuarios;

        
    }

}