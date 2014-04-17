<?php
#pr($this->Session->read('account'));
#pr($this->params);
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
					<tr>
						<td>1</td>
						<td><a href="#">Avuenja</a></td>
						<td>Paladin</td>
						<td>499</td>
						<td>Today 23:45</td>
						<td>
							<button type="button" class="btn btn-default btn-xs" title="Editar"><span class="glyphicon glyphicon-pencil"></span></button>
							<button type="button" class="btn btn-default btn-xs" title="Excluir"><span class="glyphicon glyphicon-trash"></span></button>
						</td>
					</tr>
				</tbody>
			</table>
		</fieldset>
	</div>
</div>