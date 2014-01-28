<?php echo $this->Session->flash(); ?>
<div class="widget-block">
	<div class="widget-head">
		<!--Título da Página-->	
		<h5>
			<i class="black-icons users"></i>
			Grupos - Editar
		</h5>
		<!--Botões de Ações-->
		<div class="botoes-atalhos">
				<?php if($pode_add){ ?><a class="btn btn-success tip-top" href="/roles/add" title="Adicionar"><i class="icon-plus icon-white"></i></a><?php } ?>
				<?php if($pode_consultar) { ?><a class="btn btn-warning tip-top" href="/roles/consultar" title="Listar"><i class="icon-align-justify icon-white"></i></a><?php } ?>
				<?php
					if($role['Role']['situacao'] == 'A'){
						if($pode_desativar){
							?><a class="btn btn-primary tip-top" title="Desativar" href="/roles/desativar/<?php echo $role['Role']['id']; ?>"><i class="icon-ban-circle icon-white"></i></a><?php
						}
					} else {
						if($pode_ativar){
							?><a class="btn btn-primary tip-top" title="Ativar" href="/roles/ativar/<?php echo $role['Role']['id']; ?>"><i class="icon-ok-circle icon-white"></i></a> <?php
						}
					}
				?>
				<?php if($pode_excluir){ ?><a class="btn btn-danger tip-top" href="/roles/excluir/<?php echo $role['Role']['id']; ?>" title="Ecluir" ><i class="icon-remove icon-white"></i></a><?php } ?>
		</div>
	</div>
				
	<?php 
	//adicionar breadcrumb
	$this->Html->addCrumb('Cadastro', ''); 
	$this->Html->addCrumb('Permissões', '/'.$this->params['controller'].'/consultar'); 
	$this->Html->addCrumb('editar', $this->Html->url($this->here)); 	
	
	$options_erro = array('wrap' => NULL, 'class' => '', 'escape'=> FALSE);	
	echo $this->Form->create('Role', array('class'=> 'form-horizontal well ucase'));
	echo $this->Form->hidden('id');
	?>
					
	<div id="Grupo_name" class="control-group">
		<label class="control-label">Nome <span class="obrigatorio">(*)</span></label>
		<div class="controls">
			<div class="input-prepend input-append">
				<?php echo $this->Form->input('name', array('label' => false, 'div'=> false, 'class' => 'input-square popover_quem', 'data-content'=> 'Preencha o nome do grupo!', 'data-original-title'=> "Grupo de Usuários  <span class='obrigatorio'>(Obrigatório)</span>", 'error' => FALSE)); ?>
				<?php echo $this->Form->error('name', null, $options_erro); ?>			
			</div>
		</div>
	</div>
	
	<blockquote>
		<span class="obrigatorio">Campos de preenchimento obrigatório!(*)</span>
	</blockquote>
				
	<div class="form-actions">
		<?php echo $this->Form->input('Salvar', array('label' => false, 'class' => 'btn btn-primary', 'type' => 'submit')); ?>
		<?php echo $this->Form->end(); ?> 		
	</div>	
</div>			