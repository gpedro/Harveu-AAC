<?php
class PlayersController extends AppController {
	// Nome do controller
	var $name = 'Players';
	// Model usado no controller
	var $uses = array('Player');
	// Helpers usados na view
	var $helpers = array('Html', 'Form', 'Js');
	
	// Método de criação de personagem
	function create() {
		// Seta o nome da view
		$this->set('title_for_layout', 'Criar personagem');
		if(!empty($this->Session->read('account'))) { // Se existe uma sessão criada:
			// Se a requisição for do tipo POST:
			if($this->request->is('post')) {
				$this->Player->create(); // Cria o registro
				// Se salvar os dados: 
				if($this->Account->save($this->request->data)) {
					$this->Session->setFlash( // Mensagem de sucesso
						'Personagem criado com sucesso!.',
						'default',
						array('class'=>'alert alert-success')
					);
					return $this->redirect(array('controller' => 'accounts', 'action' => 'manager'));
	        	} else {
	        		$this->Session->setFlash( // Mensagem de erro
						'Erro ao criar personagem!',
						'default',
						array('class'=>'alert alert-danger')
					);
	        	}
			}
		} else { // Se não:
			$this->Session->setFlash( // Mensagem de erro
				'Você não tem permissão para acessar isto! Faça o login ou crie uma conta!',
				'default',
				array('class'=>'alert alert-danger')
			);
			$this->redirect('/');// Redireciona o usuário
		}
	}
	
}
