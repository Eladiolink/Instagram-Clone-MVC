<?php

namespace App\Models;

use MF\Model\Model;

class Publication extends Model{
   
    private $id_usuario;
    private $id_img;


    public function __get($atributo){
           return $this->$atributo;
    }

    public function __set($atributo,$valor){
           $this->$atributo=$valor;
    }

    public function publication(){
        $query="SELECT 
                   p.id_publication,u.nome,u.id_usuario,p.subtitle 
                FROM 
                   `tb_publicacoes` AS p 
                INNER JOIN tb_usuario AS u 
                     ON (p.id_usuario = u.id_usuario) 
                WHERE 
                     u.id_usuario IN ( SELECT s.id_usuario_seguindo FROM tb_seguir AS s WHERE s.id_usuario=:id_usuario)  
                ORDER BY 
                     p.time_add DESC";
                     
        $stmt=$this->db->prepare($query);
        $stmt->bindValue(':id_usuario',$this->__get('id_usuario'));
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    
    public function imgPublications(){
      $query='SELECT foto FROM tb_publicacoes WHERE id_publication=:id_publication';
      $stmt=$this->db->prepare($query);
      $stmt->bindValue(':id_publication',$this->__get('id_img'));
      $stmt->execute();
     
      $imagem=$stmt->fetchAll();
      
      return $imagem;
    }
   
}
?>