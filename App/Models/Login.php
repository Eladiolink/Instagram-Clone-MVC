<?php

namespace App\Models;

use MF\Model\Model;

class Login extends Model{
   
    private $email;
    private $nome;
    private $usuario;
    private $senha;

    public function __get($atributo){
           return $this->$atributo;
    }

    public function __set($atributo,$valor){
           $this->$atributo=$valor;
    }
    
    public function cadastro(){
           $query="INSERT INTO tb_usuario(email,nome,usuario,senha) VALUES (:email,:nome,:usuario,:senha)";
           $stmt=$this->db->prepare($query);
           $stmt->bindValue(':email',$this->__get('email'));
           $stmt->bindValue(':nome',$this->__get('nome'));
           $stmt->bindValue(':usuario',$this->__get('usuario'));
           $stmt->bindValue(':senha',$this->__get('senha'));
           $stmt->execute();
    }
    
    public function login(){
           $query="SELECT id_usuario,nome,usuario,senha FROM tb_usuario WHERE usuario=:usuario";
           $stmt=$this->db->prepare($query);
           $stmt->bindValue(':usuario',$this->__get('usuario'));
           $stmt->execute();

          return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
?>