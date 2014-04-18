<div class="panel panel-default">
	<div class="panel-body">
		<fieldset>
			<legend><?php echo 'Criar personagem'; ?></legend>
			<?php print $this->Form->create('Player', array('class' => 'form-horizontal')); ?>
				<div class="form-group">
					<label for="inputName" class="col-sm-3 control-label">Nome do personagem:</label>
					<div class="col-sm-7">
						<?php print $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Nome do seu personagem', 'label' => FALSE)); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="inputVocation" class="col-sm-3 control-label">Vocação:</label>
					<div class="col-sm-7">
						<?php print $this->Form->input('vocation', array('class' => 'form-control', 'placeholder' => 'Escolha sua vocação', 'label' => FALSE)); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="inputTown" class="col-sm-3 control-label">Sexo:</label>
					<div class="col-sm-7">
						<?php print $this->Form->input('sex', array('class' => 'form-control', 'placeholder' => 'Escolha seu sexo', 'label' => FALSE)); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="inputTown" class="col-sm-3 control-label">Cidade:</label>
					<div class="col-sm-7">
						<?php print $this->Form->input('town_id', array('class' => 'form-control', 'placeholder' => 'Escolha a sua cidade', 'label' => FALSE)); ?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-3 col-sm-7">
						<button type="submit" class="btn btn-success">Criar conta</button>
					</div>
				</div>
			</form>
		</fieldset>
	</div>
</div>