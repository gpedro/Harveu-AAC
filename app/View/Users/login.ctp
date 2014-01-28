<div class="panel panel-default">
	<div class="panel-body">
		<div class="users form">
		<?php echo $this->Session->flash('auth'); ?>
		<?php echo $this->Form->create('User', array('class' => 'form-horizontal', 'role' => 'form'));?>
		    <fieldset>
		        <legend><?php echo 'Enter your account'; ?></legend>
		        <div class="form-group">
					<label for="inputUsername" class="col-sm-2 control-label">Username</label>
					<div class="col-sm-10">
						<?php echo $this->Form->input(
							'username', 
							array(
								'class' 		=> 'form-control',
								'id' 			=> 'inputUsername',
								'placeholder' 	=> 'Account name',
								'label' 		=> FALSE
							)
						); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword" class="col-sm-2 control-label">Password</label>
					<div class="col-sm-10">
						<?php echo $this->Form->input(
							'password', 
							array(
								'class' 		=> 'form-control',
								'id' 			=> 'inputPassword',
								'placeholder' 	=> 'Password',
								'label' 		=> FALSE
							)
						); ?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<?php echo $this->Form->input(
							'Login', 
							array(
								'class' 	=> 'btn btn-success',
								'type' 		=> 'submit',
								'label' 	=> FALSE
							)
						); ?>
					</div>
				</div>
		    </fieldset>
		<?php echo $this->Form->end();?>
		</div>
	</div>
</div>