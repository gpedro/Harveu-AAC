<?php
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
class Account extends AppModel {
	#nome do model
	var $name = 'Account';
	#tabela usada no model
	var $useTable = 'accounts';
	#validação
	public $validate = array(
        'name' => array(
            'rule' => array('isUnique')
        ),
        'password' => array(
            'rule' => 'notEmpty'
        )
    );
	#Hash senha
	public function beforeSave($options = array()) {
        if (!$this->id) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data['Account']['password'] = $passwordHasher->hash(
                $this->data['Account']['password']
            );
        }
        return true;
    }
}
?>