<?php echo $this->Session->flash(); ?>
<div class="row-fluid">
	<div class="span12">
		<div class="widget-block">
			<div class="widget-head">
				<!--Título da Página-->	
				<h5>
					<i class="black-icons users"></i>
					Grupos
				</h5>
				<!--Botões redondos-->
				<div class="botoes-atalhos">
			    	<?php if($pode_add){ ?><a class="btn btn-success tip-top" title="Novo registro [Shift+Alt+N]" accesskey="n" data-toggle="modal" href="/<?php echo $this->params['controller'];?>/add"><i class="icon-plus icon-white"></i></a><?php } ?>
				</div>
			</div>
			<?php
				//adicionar breadcrumb
				$this->Html->addCrumb('Cadastros', ''); 
				$this->Html->addCrumb('Grupos', $this->Html->url($this->here)); 
			?>		
			
			<div class="widget-content">
				<div class="widget-box">
					<!--<table class="data-tbl-tools table">-->
					<table class="data-tbl-boxy table">
						<thead>
							<tr>
								<th>
									Nome
								</th>
								<th style="max-width: 50px;">
									Ações
								</th>
							</tr>
						</thead>	
						<tbody>
							<?php
								$i = 0;
								foreach ($roles as $role){
									$class = null;
									$i++;
									if($role['Role']['situacao'] == 'A'){
										$texto = '#000';
									} else {
										$texto = '#cecece';
									}
							?>
							<tr style='color: <?php echo $texto;?>'>
								<td>
									<?php echo $role['Role']['name']; ?>
								</td>
								<td>
									<?php 
									//monta o array de links que será passado para montar o menu de ações de registros:
									if($role['Role']['situacao'] == 'A'){
										$arrayLinks = array(
											'Editar' => array('class'=>'page_white_edit_co', 'parametros'=> array('controller' => $this->params['controller'],'action' => 'edit', $role['Role']['id'])),
											'Desativar' => array('class'=>'disconnect_co', 'parametros'=> array('controller' => $this->params['controller'],'action' => 'desativar', $role['Role']['id'])),
											'Excluir' => array('class'=>'cross_co', 'parametros'=> array('controller' => $this->params['controller'],'action' => 'excluir', $role['Role']['id']),'confirm'=>'Term certeza que deseja excluir este registro?','li_class'=>'acaoExcluir')
										);
									}else{
										$arrayLinks = array(
											'Ativar' => array('class'=>'connect_co', 'parametros'=> array('controller' => $this->params['controller'],'action' => 'ativar', $role['Role']['id']))
										);
									}
									//Permissões
									if(!$pode_edit){
										if(isset($arrayLinks['Editar'])){
											unset($arrayLinks['Editar']);
										}
									}
									if(!$pode_desativar){
										if(isset($arrayLinks['Desativar'])){
											unset($arrayLinks['Desativar']);
										}
									}
									if(!$pode_excluir){
										if(isset($arrayLinks['Excluir'])){
											unset($arrayLinks['Excluir']);
										}
									}
									if(!$pode_ativar){
										if(isset($arrayLinks['Ativar'])){
											unset($arrayLinks['Ativar']);
										}
									}
									//chama o menu de ações do registro passando os parametros para montar os links
									echo $this->Mswi->menuAcoesRegistro($arrayLinks); 
									?>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>		
		</div>	
	</div>
</div>