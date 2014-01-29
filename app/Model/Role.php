<?php
class Role extends AppModel {
	#nome do model
	var $name = 'Role';
	#tabela usada no model
	var $useTable = 'roles';
	#Ações que serão usadas no controller
	var $actsAs = array('Containable');
	#Field
	public $displayField = 'name';
	#Ligação com a tabela Users
	public $hasMany = array(
		'User' => array(
			'className' 	=> 'User',
			'foreignKey' 	=> 'role_id',
			'dependent' 	=> false,
			'conditions' 	=> '',
			'fields' 		=> '',
			'order' 		=> '',
			'limit' 		=> '',
			'offset' 		=> '',
			'exclusive' 	=> '',
			'finderQuery' 	=> '',
			'counterQuery' 	=> ''
		)
	);
	#Função Parent
	function parentNode() {
	    return null;
	}
	#Validações
	public $validate = array(
		'name' => array(
			'required' => array(
				'rule'			=> array('notEmpty'),
				'allowEmpty'	=> false,
				'required'		=> true,
			),
			'unique'	=> array(
				'rule'			=> array('isUnique'),
				'allowEmpty'	=> true,
				'required'		=> true
			),
			'format_minlenght'	=> array(
				'rule'			=> array('minLength', '2'),
				'allowEmpty'	=> true,
				'required'		=> true
			),
			'format_maxlenght'	=> array(
				'rule'			=> array('maxLength', '100'),
				'allowEmpty'	=> true,
				'required'		=> true
			)
		)
	);
}
?>