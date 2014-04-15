<h3>Crie sua conta</h3>
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
		<label for="inputPasswordRepeat" class="col-sm-3 control-label">Repita a senha:</label>
		<div class="col-sm-7">
			<?php print $this->Form->input('passwordRepeat', array('class' => 'form-control', 'placeholder' => 'Sua senha novamente', 'type' => 'password', 'label' => FALSE)); ?>
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
			<button type="submit" class="btn btn-success">Criar conta</button>
		</div>
	</div>
</form>