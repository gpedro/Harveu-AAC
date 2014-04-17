<?php
class Player extends AppModel {
	// Nome do model
	var $name = 'Player';
	// Tabela usada no model
	var $useTable = 'players';
	// Ações que o Model usa
	var $actsAs = array('Containable');
	// Validação
	public $validate = array();
}
