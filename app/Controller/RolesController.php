<?php
class RolesController extends AppController {

	var $name = 'Roles';
	var $helpers = array('Html', 'Form');
	var $components = array('Mswi');

	function beforeFilter(){
		parent :: beforeFilter();
		$this->Mswi->geraPermissoes($this);
	}

	function consultar(){
		$roles = $this->Role->find(
			'all', 
			array(
				'conditions' => array('Role.situacao != ' => 'E'), 
				'recursive'=> -1, 
				'order' => array(
					'Role.name'
				)
			)
		);
		
		$this->set('roles', $roles);
	}

	function ver($id = null)
	{
		$this->_set_role($id);
	}

	function add()
	{
		if($this->request->is('post')){
			$this->request->data['Role']['situacao'] = 'A';
			
			$this->Role->set($this->data);
			if($this->Role->validates()){
				if($this->Role->save($this->request->data)){
					$this->Session->setFlash(
						'Dados salvos com sucesso!.',
						'default',
						array(
							'class'=>'sucesso',
							'descricao'=>''
						)
					);
					$this->Mswi->gerarLog($this->name, $this->uses, $this->Role->getLastInsertId());
					$this->redirect(array('action' => 'consultar'));
				} else {
					$this->Session->setFlash(
						'O registro não pode ser salvo!',
						'default',
						array(
							'class'=>'erro',
							'descricao'=>''
						)
					);
				}
			} else {
				$this->Session->setFlash(
					'Verifique os erros do formulário!',
					'default',
					array(
						'class'=>'erro',
						'descricao'=>''
					)
				);
			}
		}
	}

	function edit($id = null)
	{
		$this->Role->id = $id;
		if($this->request->is('post') || $this->request->is('put'))
		{
			$this->Role->set($this->data);
			if($this->Role->validates()){
				if($this->Role->save($this->request->data))
				{
					$this->Session->setFlash(
						'Dados salvos com sucesso!.',
						'default',
						array(
							'class'=>'sucesso',
							'descricao'=>''
						)
					);
					$this->Mswi->gerarLog($this->name, $this->uses);
					$this->redirect(array('action' => 'consultar'));
				}
				else
				{
					$this->Session->setFlash(
						'O registro não pode ser salvo!',
						'default',
						array(
							'class'=>'erro',
							'descricao'=>''
						)
					);
				}
			} else {
				$this->Session->setFlash(
					'Verifique os erros do formulário!',
					'default',
					array(
						'class'=>'erro',
						'descricao'=>''
					)
				);
			}
		}

		$this->_set_role($id);
	}

	function excluir($id = null)
	{
		$this->Role->id = $id;
		if($this->Role->saveField('situacao', 'E')){
			$this->Session->setFlash(
				'Registro excluido com sucesso!.',
				'default',
				array(
					'class'=>'sucesso',
					'descricao'=>''
				)
			);
			$this->Mswi->gerarLog($this->name, $this->uses);
		} else {
			$this->Session->setFlash(
				'Erro ao excluir registro!',
				'default',
				array(
					'class'=>'erro',
					'descricao'=>''
				)
			);
		}
		
		$this->redirect(array('action'=>'consultar'));
	}

	function desativar($id = null)
	{
		$this->Role->id = $id;
		if($this->Role->saveField('situacao', 'I')){
			$this->Session->setFlash(
				'Registro desativado com sucesso!.',
				'default',
				array(
					'class'=>'sucesso',
					'descricao'=>''
				)
			);
			$this->Mswi->gerarLog($this->name, $this->uses);
		} else {
			$this->Session->setFlash(
				'Erro ao desativar registro!',
				'default',
				array(
					'class'=>'erro',
					'descricao'=>''
				)
			);
		}
		$this->redirect(array('action'=>'consultar'));
	}

	function ativar($id = null){
		$this->Role->id = $id;
		if($this->Role->saveField('situacao', 'A')){
			$this->Session->setFlash(
				'Registro ativado com sucesso!.',
				'default',
				array(
					'class'=>'sucesso',
					'descricao'=>''
				)
			);
			$this->Mswi->gerarLog($this->name, $this->uses);
		} else {
			$this->Session->setFlash(
				'Erro ao ativar registro!',
				'default',
				array(
					'class'=>'erro',
					'descricao'=>''
				)
			);
		}
		$this->redirect(array('action'=>'consultar'));
	}
	
	function _set_role($id)
	{
		$this->Role->id = $id;
		if(!$this->Role->exists())
		{
			throw new NotFoundException(___('invalid id for role'));
		}
	    
	    /*
	    * Test allowing to not override submitted data
	    */
	    if(empty($this->request->data))
	    {
	    	$this->request->data = $this->Role->findById($id);
	    }
	    $this->set('role', $this->request->data);
	    return $this->request->data;
	}
	
	
}
?>
