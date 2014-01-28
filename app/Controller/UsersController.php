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
	    $this->Auth->allow('register');
	}
	#Add User
	function register() {
		#nome da page
		$this->set('title_for_layout', 'Register account');
		#verifica se a requisição é no method post
        if ($this->request->is('post')) {
        	#Cria usuario
            $this->User->create();
			#verifica se salvou com sucesso
            if ($this->User->save($this->request->data)) {
            	$this->account();
                #mensagem de sucesso
				#$this->Session->setFlash('The user has been saved.', 'default', array('class' => 'alert alert-success'));
                #redireciona para a index
				#$this->redirect(array('controller' => 'posts', 'action' => 'index'));
            } else {
                $this->Session->setFlash('The user could not be saved. Please, try again.', 'default', array('class' => 'alert alert-warning'));
            }
        }
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