<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;


class UserController extends Action {
    
    public function seguir(){
        $this->autenticação();
        print_r($_GET);
        if($_GET['user']==$_GET['userSeguir']){
            header("Location:/");
        }

        $Users=Container::getModel('Users');

        $Users->__set('id_usuario',$_GET['user']);
        $Users->__set('id_usuario_seguir',$_GET['userSeguir']);
        $Users->seguir();

        header('Location:/');
    }
	
	public function autenticação(){
       session_start();
	   if(!isset($_SESSION['id_usuario'])){
        header('Location:/');
	   }else{
		  
	   }

	   
      }

}