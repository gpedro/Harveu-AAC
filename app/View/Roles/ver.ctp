<?php echo $this->Session->flash(); ?>
<div class="widget-block">
	<div class="widget-head">
		<!--Título da Página-->	
		<h5>
			<i class="black-icons users"></i>
			Grupos - Ver
		</h5>
		<!--Botões de Ações-->
		<div class="widget-control pull-right">
			<a href="#" data-toggle="dropdown" class="btn dropdown-toggle <?php if(!$pode_consultar && !$pode_add && !$pode_desativar && !$pode_ativar && !$pode_excluir){ echo "disabled"; }?>"><i class="icon-cog"></i><b class="caret"></b></a>
			<ul class="dropdown-menu">
				<?php if($pode_consultar) { ?><li><a href="/roles/consultar"><i class="icon-list"></i> Listar</a></li><?php } ?>
				<?php if($pode_add){ ?><li><a href="/roles/add"><i class="icon-plus"></i> Adicionar</a></li><?php } ?>
				<?php
					if($role['Role']['situacao'] == 'A'){
						if($pode_desativar){
							?> <li><a href="/roles/desativar/<?php echo $role['Role']['id']; ?>"><i class="icon-remove-circle"></i> Desativar</a></li> <?php
						}
					} else {
						if($pode_ativar){
							?> <li><a href="/roles/ativar/<?php echo $role['Role']['id']; ?>"><i class="icon-ok-circle"></i> Ativar</a></li> <?php
						}
					}
				?>
				<?php if($pode_excluir){ ?><li><a href="/roles/excluir/<?php echo $role['Role']['id']; ?>"><i class="icon-trash"></i> Excluir</a></li><?php } ?>
			</ul>
		</div>
	</div>
				
	<?php 
	//adicionar breadcrumb
	$this->Html->addCrumb('Cadastro', ''); 
	$this->Html->addCrumb('Permissões', '/'.$this->params['controller'].'/consultar'); 
	$this->Html->addCrumb('Adicionar', $this->Html->url($this->here)); 
	?>
		
		<div class="well">
			<p>
				<b>Grupo ID:</b><i> <?php echo $role['Role']['id']; ?></i>
			</p>			
			<p>
				<b>Nome:</b><i> <?php echo $role['Role']['name']; ?></i>
			</p>		
				
			
		<blockquote>
			<small>
				<?php
					echo ucfirst($this->element('create_update_dates', array('model' => $role['Role']), array('plugin' => 'alaxos')));
				?>
			</small>
		</blockquote>	
			
		</div>
	</div>
</div>			