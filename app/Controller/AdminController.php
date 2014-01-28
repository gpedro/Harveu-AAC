<?php
class AdminController extends AppController {
	#nome do controller
	var $name = 'Admin';
	#model usado no controller
	var $uses = array();
	#helpers usados na view
	var $helpers = array('Html', 'Form', 'Js');
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
	#View Post
	function posts() {
		#carrega o model para se usar
		$this->loadModel('Post');
		#busca os dados
		$registros = $this->Post->find('all');
		#passa para view
		$this->set('registros', $registros);
	}
}
?>