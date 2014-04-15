<div class="panel panel-default">
	<div class="panel-body">
		<fieldset>
			<legend><?php echo 'Realizar login'; ?></legend>
			<?php print $this->Form->create('Account', array('class' => 'form-horizontal')); ?>
				<div class="form-group">
					<label for="inputName" class="col-sm-3 control-label">Nome da conta:</label>
					<div class="col-sm-7">
						<?php print $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Nome da sua conta', 'label' => FALSE)); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword" class="col-sm-3 control-label">Senha:</label>
					<div class="col-sm-7">
						<?php print $this->Form->input('password', array('class' => 'form-control', 'placeholder' => 'Sua senha', 'label' => FALSE)); ?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-7">
						<button type="submit" class="btn btn-success">Entrar</button>
					</div>
				</div>
			</form>
		</fieldset>
	</div>
</div>
