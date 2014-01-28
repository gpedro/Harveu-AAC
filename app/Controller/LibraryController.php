<?php
class LibraryController extends AppController {
	#nome do controller
	var $name = 'Library';
	#model usado no controller
	var $uses = array();
	#helpers usados na view
	var $helpers = array('Html', 'Form', 'Js');
	#Spells
	function spells() {
	}
	#Monsters
	function monsters() {
	}
	#Quests
	function quests() {
	}
	#Exp Stages
	function exp_stages() {
	}
}
?>