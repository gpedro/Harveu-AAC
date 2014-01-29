<?php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
class User extends AppModel {
	#nome do model
	var $name = 'User';
	#tabela usada no model
	var $useTable = 'users';
	#Ações que serão usadas no controller
	var $actsAs = array('Containable');
	#Field
	public $displayField = 'username';
	#validação
	public $validate = array(
		'username' => array(
			'required' => array(
				'rule'			=> array('notEmpty'),
				'allowEmpty'	=> false,
				'required'		=> true
			),
			'unique'	=> array(
				'rule'			=> array('isUnique'),
				'allowEmpty'	=> true,
				'required'		=> true
			)
		),
		'password'	=>	array(
			'required' =>	array(
				'rule'			=> array('notEmpty'),
				'on'			=> 'create',
			),
			'confirmaSenhaAtual' => array(
                'rule'			 => array('confirmaSenhaAtual'),
                'on'			 => 'update'
            )
		),
		'password2'	=>	array(
			'matchPasswords'	=>	array(
				'rule' 			=> array('matchPasswords')            
			)	
		)
	);
	#Liagção com a tabela Role
	public $belongsTo = array(
		'Role' => array(
			'className'  => 'Role',
			'foreignKey' => 'role_id',
			'conditions' => '',
			'fields'     => '',
			'order' 	 => ''
		)
	);
	#Função de parentesco Role
	function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        
        $data = $this->data;
        
        if (empty($this->data)) {
            $data = $this->read();
        }
        elseif(isset($this->id) && empty($data[$this->alias]['role_id'])) {
            $data[$this->alias]['role_id'] = $this->field('role_id', array('User.id' => $this->id));
        }
        
        if (empty($data[$this->alias]['role_id'])) {
            return null;
        }
        else {
            return array('Role' => array('id' => $data[$this->alias]['role_id']));
        }
    }
	#Função confirma senha
	function confirmaSenhaAtual() {
		//se está editando
		if(isset($this->data['User']['id']) && !empty($this->data['User']['id'])){
			//procura os dados do usuario	
			$dados_atuais = $this->find(
				'first',
				array(
					'conditions' => array(
						'User.id' => $this->data['User']['id']
					),
					'recursive' => -1
				)
			);
			//confere a senha atual
			if(Security::hash($this->data['User']['password'], null, true) == $dados_atuais['User']['password']){
				return true;
			//se não	
			}else{
				return false;
			}
		}else{
			return true;
		}
	}
	#Função match senhas
	function matchPasswords() {
		//Edição
		if(isset($this->data['User']['id']) && !empty($this->data['User']['id'])){
			//Alteração de senha
			unset($this->data['User']['password']);
			if(isset($this->data['User']['nova_senha']) && !empty($this->data['User']['nova_senha'])){
				if($this->data['User']['nova_senha'] != $this->data['User']['password2']){
					return false;
				}else{
					$this->data['User']['password'] = Security::hash($this->data['User']['nova_senha'], null, true);
					return true;
				}
			}else{
				return true;
			}
		}else{
			//Adição
			if(isset($this->data['User']['password']) && !empty($this->data['User']['password'])){
				if($this->data['User']['password'] != $this->data['User']['password2']){
					return false;
				}else{
					return true;
				}
			}else{
				return false;
			}
		}
	}
	#Hash senha
	public function beforeSave($options = array()) {
        if (!$this->id) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data['User']['password'] = $passwordHasher->hash(
                $this->data['User']['password']
            );
        }
        return true;
    }
}
?>