<?php
class PlayersController extends AppController {
	// Nome do controller
	var $name = 'Players';
	// Model usado no controller
	var $uses = array('Player');
	// Helpers usados na view
	var $helpers = array('Html', 'Form', 'Js');
}
