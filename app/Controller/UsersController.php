<?php
class UsersController extends AppController {
	#nome do controller
	var $name = 'Users';
	#model usado no controller
	var $uses = array('User');
	#helpers usados na view
	var $helpers = array('Html', 'Form', 'Js');
	#Carrega antes de qualquer coisa
	function beforeFilter() {
	    parent::beforeFilter();
	    $this->Auth->allow('recuperar_senha');
	}
	#Add User
	function register() {
		#nome da page
		$this->set('title_for_layout', 'Register account');
		#verifica se a requisição é no method post
		if($this->request->is('post')) {
			#Passa os dados para o Model
			$this->User->set($this->data);
			#Valida os dados
			 if($this->User->validates()) {
				$senha = $this->Auth->password($this->request->data['User']['password']);
				$this->request->data['User']['password'] = $senha;
				#Cria usuario
				$this->User->create();
				if($this->User->save($this->request->data, FALSE)) {
					#mensagem de sucesso
					$this->Session->setFlash('The user has been saved.', 'default', array('class' => 'alert alert-success'));
					#redireciona para a index
					$this->redirect(array('controller' => 'posts', 'action' => 'index'));
				} else {
					#mensagem de erro
					$this->Session->setFlash('The user could not be saved. Please, try again.', 'default', array('class' => 'alert alert-warning'));
				}
			 } else {
			 	#mensagem de erro
				$this->Session->setFlash('The user could not be saved. Please, try again.', 'default', array('class' => 'alert alert-warning'));
			 }
		}
		#Roles
		$roles = $this->User->Role->find(
			'list',
			array(
				'conditions' => array(
					'Role.situacao' => 'ativado'
				)
			)
		);
		#se não for um administrador
		if($this->Auth->user('Role.name') != 'Administrador') {
			unset($roles[1]);
		}
		$this->set('roles', $roles);
    }
	#Login User
	function login() {
		#nome da page
		$this->set('title_for_layout', 'Login');
	    if ($this->Auth->login()) {
	        $this->redirect($this->Auth->redirect());
	    } else {
	        #$this->Session->setFlash('Invalid username or password, try again', 'default', array('class' => 'alert alert-warning'));
	    }
	}
	#Logout User
	function logout() {
    	$this->redirect($this->Auth->logout());
	}
}
?>