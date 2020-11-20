<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;


class IndexController extends Action {
	
	public function index(){
	    $this->autenticação();
	 	$this->render('index','layout1');
	}

	public function cadastro(){
	
		$this->render('cadastrar','layout1');
	}

	public function feed(){
	
		$this->render('feed','layout2');
	}
	
	public function autenticação(){
       session_start();
	   if(!isset($_SESSION['id_usuario'])){

	   }else{
		   header('Location:/feed');
	   }

	   
      }

}