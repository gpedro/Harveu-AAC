<?php
class Role extends AppModel {
	#nome do model
	var $name = 'Role';
	#tabela usada no model
	var $useTable = 'roles';
	#Ações que serão usadas no controller
	var $actsAs = array('Containable', 'Acl' => 'requester');
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
				'message'		=> "<script>SetaErro('Grupo_name'); SetaTextoErro('Role', 'Name', 'Preenchimento Obrigatório!');</script>",
				'allowEmpty'	=> false,
				'required'		=> true,
			),
			'unique'	=> array(
				'rule'			=> array('isUnique'),
				'message'		=> "<script>SetaErro('Grupo_name'); SetaTextoErro('Role', 'Name', 'O Grupo informado já está cadastrado');</script>",
				'allowEmpty'	=> true,
				'required'		=> true
			),
			'format_minlenght'	=> array(
				'rule'			=> array('minLength', '2'),
				'message'		=> "<script>SetaErro('Grupo_name'); SetaTextoErro('Role', 'Name', 'Informe no mínimo 2 caracteres');</script>",
				'allowEmpty'	=> true,
				'required'		=> true
			),
			'format_maxlenght'	=> array(
				'rule'			=> array('maxLength', '100'),
				'message'		=> "<script>SetaErro('Grupo_name'); SetaTextoErro('Role', 'Name', 'Informe no máximo 100 caracteres');</script>",
				'allowEmpty'	=> true,
				'required'		=> true
			)
		)
	);
}
?>