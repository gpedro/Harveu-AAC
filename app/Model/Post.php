<?php
class Post extends AppModel {
	#nome do model
	var $name = 'Post';
	#tabela usada no model
	var $useTable = 'posts';
	#validação
	public $validate = array(
        'title' => array(
            'rule' => 'notEmpty'
        ),
        'body' => array(
            'rule' => 'notEmpty'
        )
    );
}
?>