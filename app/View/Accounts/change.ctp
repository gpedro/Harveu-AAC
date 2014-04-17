<div class="panel panel-default">
	<div class="panel-body">
		<fieldset>
			<legend><?php echo 'Change account'; ?></legend>
			<?php 
			print $this->Form->create('Account', array('class' => 'form-horizontal')); 
			print $this->Form->input('Account.id', array('type' => 'hidden')); 
			?>
				<div class="form-group">
					<label for="inputName" class="col-sm-3 control-label">Nome da conta:</label>
					<div class="col-sm-7">
						<?php print $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Nome da sua conta', 'label' => FALSE)); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail" class="col-sm-3 control-label">Seu email:</label>
					<div class="col-sm-7">
						<?php print $this->Form->input('email', array('class' => 'form-control', 'placeholder' => 'Informe seu email', 'type' => 'email', 'label' => FALSE)); ?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-7">
						<button type="submit" class="btn btn-success">Salvar</button>
					</div>
				</div>
			</form>
		</fieldset>
	</div>
</div>