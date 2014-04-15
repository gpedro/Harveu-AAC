<?php
class AccountsController extends AppController {
	// Nome do controller
	var $name = 'Accounts';
	// Model usado no controller
	var $uses = array('Account');
	// Helpers usados na view
	var $helpers = array('Html', 'Form', 'Js');
	
	// Método de criação de conta
	function create() {
		// Seta o nome da view
		$this->set('title_for_layout', 'Criar conta');
		// Se a requisição for do tipo POST:
		if($this->request->is('post')) {
			$this->Account->create(); // Cria a conta
			// Se as senhas são iguais:
			if($this->data['Account']['password'] == $this->data['Account']['passwordRepeat']) {
				$this->request->data['Account']['password'] = sha1($this->request->data['Account']['password']); // Encrypta a senha
				// Se salvar os dados: 
				if($this->Account->save($this->request->data)) {
					$this->Session->setFlash('Conta criada com sucesso!');
					return $this->redirect(array('controller' => 'news', 'action' => 'index'));
            	}
			} else { // Se não:
				$this->Session->setFlash('Erro ao criar conta!');
			}
		}
	}
	
	// Método de login
	function login() {
		// Seta o nome da view
		$this->set('title_for_layout', 'Entrar');
		// Se a requisição for do tipo POST:
		if($this->request->is('post')) {
			$this->request->data['Account']['password'] = sha1($this->request->data['Account']['password']); // Encrypta a senha
			$account = $this->Account->find( // Busca a conta no banco de dados
				'first',
				array(
					'conditions' => array(
						'Account.name' => $this->request->data['Account']['name'],
						'Account.password' => $this->data['Account']['password']
					),
					'fields' => array(
						'Account.name',
						'Account.password'
					)
				)
			);
			if(!empty($account)) { // Se a conta existe:
				if(empty($this->Session->read('account'))) { // Se não existe nenhuma sessão criada:
					$accountSession = $this->Session->write('account', $account['Account']['name']);
					$this->redirect(array('action' => 'manager'));
				} else { // Se não:
					$this->Session->destroy(); // Destrói a sessão
				}
			} else { // Se não:
				$this->Session->setFlash('Conta incorreta! Verifique os dados digitados, ou crie uma conta.');
			}
		}
	}
	
	// Método de gerenciamento de conta
	function manager() {
		if(!empty($this->Session->read('account'))) { // Se existe uma sessão criada:
			
		} else { // Se não:
			$this->redirect('/');// Redireciona o usuário
		}
	}
	
	// Método de logout
	function logout() {
		// Se for uma sessão valida
		if ($this->Session->valid()) {
			$this->Session->destroy(); // Destrói a sessão
			$this->redirect('/');// Redireciona o usuário
		}
	}
	
}
