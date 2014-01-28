<ol class="breadcrumb">
	<li><a href="<?php echo Configure::read('site.url'); ?>admin">Admin</a></li>
	<li class="active">Posts</li>
</ol>
<div class="panel panel-default">
	<div class="panel-body">
		<?php
		if(empty($registros)) {
		?>
			<div class="alert alert-info">
				Have found no record in the table! 
				<a href="<?php echo Configure::read('site.url'); ?>admin/add_post" title="Added post">Added new post</a>!
			</div>
		<?php
		} else {
		?>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Title post</th>
						<th>Posted in</th>
						<th>Situation</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($registros as $registro) {
					?>
					<tr>
						<td><?php echo $registro['Post']['id']; ?></td>
						<td><?php echo $registro['Post']['title']; ?></td>
						<td><?php echo date('d/m/Y H:i', strtotime($registro['Post']['created'])); ?></td>
						<td><?php echo $registro['Post']['situacao']; ?></td>
						<td>
							<?php echo $this->Html->link('Edit', array('action' => 'edit_post', $registro['Post']['id']));?> | 
							<?php echo $this->Form->postLink(
								'Del',
								array('action' => 'del_post', $registro['Post']['id']),
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