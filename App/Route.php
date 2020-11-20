<?php

namespace App;

use MF\Init\Boostrap;

class Route extends Boostrap{

	
	protected function initRoutes() {

		$routes['home'] = array(
			'route' => '/',
			'controller' => 'indexController',
			'action' => 'index'
		);

		$routes['cadastro'] = array(
			'route' => '/cadastro',
			'controller' => 'indexController',
			'action' => 'cadastro'
		);

		$routes['cadastrar'] = array(
			'route' => '/cadastrar',
			'controller' => 'LoginController',
			'action' => 'cadastrar'
		);

		$routes['login'] = array(
			'route' => '/login',
			'controller' => 'LoginController',
			'action' => 'login'
		);

		$routes['feed'] = array(
			'route' => '/feed',
			'controller' => 'AppController',
			'action' => 'feed'
		);

		$routes['exot'] = array(
			'route' => '/exit',
			'controller' => 'AppController',
			'action' => 'exit'
		);
		
		$routes['seguir'] = array(
			'route' => '/seguir',
			'controller' => 'UserController',
			'action' => 'seguir'
		);

		$routes['viewFoto'] = array(
			'route' => '/viewFoto',
			'controller' => 'ImagensController',
			'action' => 'viewFoto'
		);

		

		$routes['viewFotoPublication']= array(
			'route' => '/viewFotoPublication',
			'controller'=>'ImagensController',
			'action'=>'viewFotoPublication'
		);

		$routes['comments']= array(
			'route' => '/comments',
			'controller'=>'AppController',
			'action'=>'comments'
		);

		$this->setRoutes($routes);
	}

	
}

?>