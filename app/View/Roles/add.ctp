<?php echo $this->Session->flash(); ?>
<div class="widget-block">
	<div class="widget-head">
		<!--Título da Página-->	
		<h5>
			<i class="black-icons users"></i>
			Grupos - Adicionar
		</h5>
		<!--Botões de Ações-->
		<div class="botoes-atalhos">
			<?php if($pode_consultar){ ?><a class="btn btn-warning tip-top" href="/roles/consultar" title="Listar"><i class="icon-align-justify icon-white"></i></a><?php } ?>
		</div>
	</div>
				
	<?php 
	//adicionar breadcrumb
	$this->Html->addCrumb('Cadastro', ''); 
	$this->Html->addCrumb('Permissões', '/'.$this->params['controller'].'/consultar'); 
	$this->Html->addCrumb('Adicionar', $this->Html->url($this->here)); 	
	
	$options_erro = array('wrap' => NULL, 'class' => '', 'escape'=> FALSE);	
	echo $this->Form->create('Role', array('class'=> 'form-horizontal well ucase'));?>
					
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