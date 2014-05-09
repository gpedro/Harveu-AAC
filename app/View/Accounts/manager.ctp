<?php
#pr($this->Session->read('account'));
#pr($this->params);
var_dump($characters);
?>
<div class="panel panel-default">
	<div class="panel-body">
		<fieldset>
			<legend><?php echo 'Gerenciar conta'; ?></legend>
			<h4>Personagens</h4>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Vocation</th>
						<th>Level</th>
						<th>Last login</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php

						if(count($characters) == 0)
						{
							echo '<tr><td colspan="5"><p class="text-muted">Ainda não criou seu jogador? '.$this->Html->link('Clique aqui', '/players/create').'</a> e crie agora!</p></td></tr>';
						}
						else
						{
							$i = 0;

							foreach($characters as $character)
							{
								$row = $character['Player'];
								echo '<td>'.++$i.'</td>';
								echo '<td><a href="#">'.$row['name'].'</a></td>';
								echo '<td>'.$row['level'].'</td>';
								echo '<td>'.$row['vocation'].'</td>';
								echo '<td>'.((!$row['lastlogin']) ? 'Nunca logou' : $row['lastlogin']).'</td>';
								echo '<td><button type="button" class="btn btn-default btn-xs" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button><button type="button" class="btn btn-default btn-xs" title="Excluir"><span class="glyphicon glyphicon-trash"></span></button></td>';
							}
						}

					?>
				</tbody>
			</table>
		</fieldset>
	</div>
</div>