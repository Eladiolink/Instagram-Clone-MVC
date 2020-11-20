<?php


namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class LoginController extends Action{


    public function cadastrar(){
        
        $Login= Container::getModel('Login');
        
        $senha= password_hash($_POST['senha'],PASSWORD_DEFAULT);

        $Login->__set('email',$_POST['email']);
        $Login->__set('nome',$_POST['nome']);
        $Login->__set('usuario',$_POST['usuario']);
        $Login->__set('senha',$senha);
        
        
        $Login->cadastro();

        header('Location:/');
    }
    
    public function login(){
        
        $Login= Container::getModel('Login');
        $Login->__set('usuario',$_POST['usuario']);
  
        $usuario= $Login->login();
        
        if(password_verify($_POST['senha'],$usuario[0]['senha'])){

           session_start();
           $_SESSION['id_usuario']=$usuario[0]['id_usuario'];
           $_SESSION['nome']=$usuario[0]['nome'];
           $_SESSION['usuario']=$usuario[0]['usuario'];
           header('Location:/feed');

        }else{
            header('Location:/?error="invalid"');
        }

    }

    public function autenticação(){
        session_start();
        if(isset($_SESSION['id_usuario'])){
            header('Location:/feed');
        }else
               header('Location:/');
         
      }


}

?>