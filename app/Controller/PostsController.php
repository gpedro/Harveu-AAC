<?php
class PostsController extends AppController {
	#nome do controller
	var $name = 'Posts';
	#model usado no controller
	var $uses = array('Post');
	#helpers usados na view
	var $helpers = array('Html', 'Form', 'Js');
	#função de index (pagina inicial do aac)
	function index() {
		#nome da page
		$this->set('title_for_layout', 'Home');
		#buscando as noticias/posts no banco
		$posts = $this->Post->find(
			'all',
			array(
				'order' => array(
					'Post.id' => 'DESC'
				)
			)
		);
		#passando para a view
		$this->set('posts', $posts);
	}
}
?>