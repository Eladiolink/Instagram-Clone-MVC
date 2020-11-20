<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action{
 
    public function feed(){
		session_start();
        if(isset($_SESSION['id_usuario'])){
			$this->view->publication=$this->publication();
			$this->view->seguir=$this->seguir();
			$this->view->story=$this->story();
			$this->render('feed','layout2');
			
		}else{
			header('Location:/?error="Auth"');
		}
		
	}

	public function publication(){
		


		$Publication=Container::getModel('Publication');

		$Publication->__set('id_usuario',$_SESSION["id_usuario"]);

		return $Publication->publication();

	}

	public function seguir(){
		$seguir=Container::getModel('Users');
		$seguir->__set('id_usuario',$_SESSION["id_usuario"]);
		return $seguir->quemSeguir();
	}
	
	public function comments(){
		$this->view->publication=$this->publication();
	     $this->view->seguir=$this->seguir();
		  $this->view->story=$this->story();
		   $this->render('comments','layout2');
	}

	public function story(){
		 
		$seguir=Container::getModel('Users');
		$seguir->__set('id_usuario',$_SESSION["id_usuario"]);
		
		return $seguir->seguindo();
	}
	public function exit(){
		session_start();
		session_destroy();
		header('Location:/');
		
	}
}

?>