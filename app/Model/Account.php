<?php
class Account extends AppModel {
	// Nome do model
	var $name = 'Account';
	// Tabela usada no model
	var $useTable = 'accounts';
	// Ações que o Model usa
	var $actsAs = array('Containable');
	// Validação
	public $validate = array();
}
