<?php
class AdminController extends AppController {
	#nome do controller
	var $name = 'Admin';
	#model usado no controller
	var $uses = array();
	#helpers usados na view
	var $helpers = array('Html', 'Form', 'Js');
	#Função que carrega as permissões
	#function beforeFilter() {
        #$this->Auth->allow('*');
    #}
	#Index admin
	function index() {
		$this->redirect(array('controller' => 'admin', 'action' => 'painel'));
	}
	#Index admin
	function painel() {
		
	}
	#Add Post
	function add_post() {
		#carrega o model para se usar
		$this->loadModel('Post');
		#verifica se a requisição é no method post
		if($this->request->is('post')) {
			#verifica se salvou com sucesso
			if($this->Post->save($this->request->data)) {
				#mensagem de sucesso
				$this->Session->setFlash('Your post has been saved.', 'default', array('class' => 'alert alert-success'));
				#redireciona para a index
				$this->redirect(array('controller' => 'admin', 'action' => 'painel'));
			}
		}
	}
	#Add Role
	function add_role() {
		#carrega o model para se usar
		$this->loadModel('Role');
		#verifica se a requisição é no method post
		if($this->request->is('post')) {
			#verifica se salvou com sucesso
			if($this->Role->save($this->request->data)) {
				#mensagem de sucesso
				$this->Session->setFlash('Your role has been saved.', 'default', array('class' => 'alert alert-success'));
				#redireciona para a index
				$this->redirect(array('controller' => 'admin', 'action' => 'painel'));
			}
		}
	}
	#Edit Post
	function edit_post($id) {
		#carrega o model para se usar
		$this->loadModel('Post');
		#Passa o id
		$this->Post->id = $id;
		#Se a requisição é do method get
	    if($this->request->is('get')) {
	    	#le os dados do formulário com method get
	        $this->request->data = $this->Post->read();
	    } else {#Senão vai ser method post
	    	#verifica se salvou com sucesso
	        if($this->Post->save($this->request->data)) {
	            #mensagem de sucesso
				$this->Session->setFlash('Your post has been saved.', 'default', array('class' => 'alert alert-success'));
	            #redireciona para a index
				$this->redirect(array('controller' => 'admin', 'action' => 'painel'));
	        }
	    }
	}
	#Edit Role
	function edit_role($id) {
		#carrega o model para se usar
		$this->loadModel('Role');
		#Passa o id
		$this->Role->id = $id;
		#Se a requisição é do method get
	    if($this->request->is('get')) {
	    	#le os dados do formulário com method get
	        $this->request->data = $this->Role->read();
	    } else {#Senão vai ser method post
	    	#verifica se salvou com sucesso
	        if($this->Role->save($this->request->data)) {
	            #mensagem de sucesso
				$this->Session->setFlash('Your role has been saved.', 'default', array('class' => 'alert alert-success'));
	            #redireciona para a index
				$this->redirect(array('controller' => 'admin', 'action' => 'painel'));
	        }
	    }
	}
	#Delete Post
	function del_post($id) {
		#carrega o model para se usar
		$this->loadModel('Post');
		#Verifica se não é requisicao do metho post
		if(!$this->request->is('post')) {
        	throw new MethodNotAllowedException();
	    }
		#Se deletar
	    if($this->Post->delete($id)) {
	    	#mensagem de sucesso
			$this->Session->setFlash('The post with id: ' . $id . ' has been deleted.', 'default', array('class' => 'alert alert-success'));
	        #redireciona para a index
			$this->redirect(array('controller' => 'admin', 'action' => 'painel'));
	    }
	}
	#Delete Role
	function del_role($id) {
		#carrega o model para se usar
		$this->loadModel('Role');
		#Verifica se não é requisicao do metho post
		if(!$this->request->is('post')) {
        	throw new MethodNotAllowedException();
	    }
		#Se deletar
	    if($this->Role->delete($id)) {
	    	#mensagem de sucesso
			$this->Session->setFlash('The role with id: ' . $id . ' has been deleted.', 'default', array('class' => 'alert alert-success'));
	        #redireciona para a index
			$this->redirect(array('controller' => 'admin', 'action' => 'painel'));
	    }
	}
	#View Posts
	function posts() {
		#carrega o model para se usar
		$this->loadModel('Post');
		#busca os dados
		$registros = $this->Post->find('all');
		#passa para view
		$this->set('registros', $registros);
	}
	#View Roles
	function roles() {
		#carrega o model para se usar
		$this->loadModel('Role');
		#busca os dados
		$registros = $this->Role->find('all');
		#passa para view
		$this->set('registros', $registros);
	}
}
?>