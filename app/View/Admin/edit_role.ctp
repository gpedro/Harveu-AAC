<ol class="breadcrumb">
	<li><a href="<?php echo Configure::read('site.url'); ?>admin">Admin</a></li>
	<li><a href="<?php echo Configure::read('site.url'); ?>admin/roles">Roles</a></li>
	<li class="active">Edit</li>
</ol>
<div class="panel panel-default">
	<div class="panel-body">
		<?php 
		echo $this->Form->create('Role', array('class'=> 'form-horizontal', 'role' => 'form'));?>
		<?php echo $this->Form->input('id', array('type' => 'hidden')); ?>
		<div class="form-group">
			<label for="inputName" class="col-sm-2 control-label">Name</label>
			<div class="col-sm-10">
				<?php echo $this->Form->input(
					'name', 
					array(
						'class' 		=> 'form-control',
						'id' 			=> 'inputName',
						'placeholder' 	=> 'Role name',
						'label' 		=> FALSE
					)
				); ?>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<?php echo $this->Form->input(
					'Save', 
					array(
						'class' 	=> 'btn btn-default',
						'type' 		=> 'submit',
						'label' 	=> FALSE
					)
				); ?>
			</div>
		</div>
		<?php echo $this->Form->end(); ?> 	
	</div>
</div>	