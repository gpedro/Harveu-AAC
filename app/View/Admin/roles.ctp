<ol class="breadcrumb">
	<li><a href="<?php echo Configure::read('site.url'); ?>admin">Admin</a></li>
	<li class="active">Roles</li>
</ol>
<div class="panel panel-default">
	<div class="panel-body">
		<?php
		if(empty($registros)) {
		?>
			<div class="alert alert-info">
				Have found no record in the table! 
				<a href="<?php echo Configure::read('site.url'); ?>admin/add_roles" title="Added roles">Added new role</a>!
			</div>
		<?php
		} else {
		?>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Situation</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($registros as $registro) {
					?>
					<tr>
						<td><?php echo $registro['Role']['id']; ?></td>
						<td><?php echo $registro['Role']['name']; ?></td>
						<td><?php echo $registro['Role']['situacao']; ?></td>
						<td>
							<?php echo $this->Html->link('Edit', array('action' => 'edit_role', $registro['Role']['id']));?> | 
							<?php echo $this->Form->postLink(
								'Del',
								array('action' => 'del_role', $registro['Role']['id']),
								array('confirm' => 'Are you sure?')
							)?>
						</td>
					</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		<?php
		}
		?>
	</div>
</div>