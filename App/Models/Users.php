<?php

namespace App\Models;

use MF\Model\Model;

class Users extends Model{
   
    private $id_usuario;
    private $id_usuario_seguir;

    public function __get($atributo){
           return $this->$atributo;
    }

    public function __set($atributo,$valor){
           $this->$atributo=$valor;
    }

    public function quemSeguir(){
        $query="SELECT id_usuario,nome,usuario FROM tb_usuario WHERE id_usuario NOT IN ( SELECT id_usuario_seguindo FROM tb_seguir WHERE id_usuario=:id_usuario ) AND id_usuario !=:id_usuario";
        $stmt=$this->db->prepare($query);
        $stmt->bindValue(':id_usuario',$this->__get('id_usuario'));
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function seguir(){
        $query="INSERT INTO tb_seguir VALUES(0,:id_usuario,:id_usuario_seguir)";
        $stmt=$this->db->prepare($query);
        $stmt->bindValue(':id_usuario',$this->__get('id_usuario'));
        $stmt->bindValue(':id_usuario_seguir',$this->__get('id_usuario_seguir'));
        $stmt->execute();

    }
    
    public function seguindo(){
        $query="SELECT id_usuario,nome,usuario FROM tb_usuario WHERE id_usuario IN ( SELECT id_usuario_seguindo FROM tb_seguir WHERE id_usuario=:id_usuario)";
        $stmt=$this->db->prepare($query);
        $stmt->bindValue(':id_usuario',$this->__get('id_usuario'));
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
   
}
?>