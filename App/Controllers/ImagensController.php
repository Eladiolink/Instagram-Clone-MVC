<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;
use App\Models\Imagens;
use App\Connection;
class ImagensController extends Action{
   
    public function viewFoto(){
        $this->autenticação();
        $conexao=new Connection();
         $db=$conexao->getDb();
         $query="SELECT foto FROM tb_foto_perfil WHERE id_usuario=:id_usuario";
         $stmt=$db->prepare($query);
         $stmt->bindValue(':id_usuario',$_GET['user']);
         $stmt->execute();                       
         $foto=$stmt->fetchAll(\PDO::FETCH_ASSOC);
         $this->view->foto=$foto[0]['foto'];
        
         $this->render('img','layout3');

     }
     
     public function viewFotoPublication(){
         $ImagemPublication=Container::getModel('Publication');

         $ImagemPublication->__set('id_img',$_GET['img']);
         
         $viewImagem=$ImagemPublication->imgPublications();

         header('Content-Type:image/png');
         echo $viewImagem[0]['foto'];
     }

     public function autenticação(){
       session_start();
       if(isset($_SESSION['id_usuario'])){

       }else
              header('Location:/');
        
     }
    
}

?>