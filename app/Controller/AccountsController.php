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
					$this->Session->setFlash( // Mensagem de sucesso
						'Conta criada com sucesso!.',
						'default',
						array('class'=>'alert alert-success')
					);
					return $this->redirect(array('controller' => 'posts', 'action' => 'index'));
            	}
			} else { // Se não:
				$this->Session->setFlash( // Mensagem de erro
					'Erro ao criar conta!',
					'default',
					array('class'=>'alert alert-danger')
				);
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
						'Account.id',
						'Account.name',
						'Account.password'
					)
				)
			);
			if(!empty($account)) { // Se a conta existe:
				if(empty($this->Session->read('account'))) { // Se não existe nenhuma sessão criada:
					$accountSession = $this->Session->write('account', $account['Account']['name']);
					$accountSession = $this->Session->write('account_id', $account['Account']['id']);
					$this->redirect(array('action' => 'manager'));
				} else { // Se não:
					$this->Session->destroy(); // Destrói a sessão
				}
			} else { // Se não:
				$this->Session->setFlash( // Mensagem de erro
					'Conta incorreta! Verifique os dados digitados, ou crie uma conta.!',
					'default',
					array('class'=>'alert alert-danger')
				);
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
	
	// Método de gerenciamento de conta
	function change($id) {
		if(!empty($this->Session->read('account'))) { // Se existe uma sessão criada:
			$this->Account->id = $id; // Atribuimos o id passado para o id do registro
			if($this->request->is('get')) { // Se a requisição for do tipo GET:
				$this->request->data = $this->Account->read(); // Exibe na view
			} else { // Se não:
				if($this->Account->save($this->request->data)) { // Se salvar os dados:
					$this->Session->setFlash( // Mensagem de sucesso
						'Dados salvos com sucesso!.',
						'default',
						array('class'=>'alert alert-success')
					);
					$this->redirect(array('action' => 'manager')); // Redireciona
				} else { // Se não:
					$this->Session->setFlash( // Mensagem de erro
						'O registro não pode ser salvo!',
						'default',
						array('class'=>'alert alert-danger')
					);
				}
			}
		} else { // Se não:
			$this->redirect('/');// Redireciona o usuário
		}
	}
	
	// Método de logout
	function logout() {
		// Se for uma sessão valida
		if ($this->Session->valid()) {
			$this->Session->destroy(); // Destrói a sessão
			$this->Session->setFlash( // Mensagem de erro
				'Você saiu da sua conta!',
				'default',
				array('class'=>'alert alert-info')
			);
			$this->redirect('/');// Redireciona o usuário
		}
	}
	
}
