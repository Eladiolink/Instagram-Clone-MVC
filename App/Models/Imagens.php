<?php

namespace App\Models;

use App\Connection;
//use MF\Model\Model;

class Imagens{
   
   

    public function __get($atributo){
           return $this->$atributo;
    }

    public function __set($atributo,$valor){
           $this->$atributo=$valor;
    }
    
    
    public function getFotoPerfil($id_usuario){
        
        $conexao=new Connection();

        $db=$conexao->getDb();
        
                       $query="SELECT foto FROM tb_foto_perfil WHERE id_usuario=:id_usuario";
                       $stmt=$db->prepare($query);
                       $stmt->bindValue(':id_usuario',$id_usuario);
                       $stmt->execute();
                         
                        
                       $foto=$stmt->fetchAll(\PDO::FETCH_ASSOC);
                       header('Content-Type:image/png');
                       echo $foto[0]['foto'];
                       //return $foto;
    }

    public function test(){
           
        $conexao=new Connection();

        $db=$conexao->getDb();
       
        $query="SELECT foto FROM tb_foto_perfil WHERE id_usuario=:id_usuario";
        $stmt=$db->prepare($query);
        $stmt->bindValue(':id_usuario',$_GET['user']);
        $stmt->execute();
                                      
        $foto=$stmt->fetchAll(\PDO::FETCH_ASSOC);
               
             header('Content-Type:image/png');
              echo $foto[0]['foto'];
    }
}
?>

