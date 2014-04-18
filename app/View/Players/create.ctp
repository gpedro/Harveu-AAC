<div class="panel panel-default">
	<div class="panel-body">
		<fieldset>
			<legend><?php echo 'Criar personagem'; ?></legend>
			<?php 
			print $this->Form->create('Player', array('class' => 'form-horizontal')); 
			print $this->Form->input('account_id', array('type' => 'hidden', 'value' => $this->Session->read('account_id')));
			?>
				<div class="form-group">
					<label for="inputName" class="col-sm-3 control-label">Nome do personagem:</label>
					<div class="col-sm-7">
						<?php print $this->Form->input('name', array('class' => 'form-control', 'placeholder' => 'Nome do seu personagem', 'label' => FALSE)); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="inputVocation" class="col-sm-3 control-label">Vocação:</label>
					<div class="col-sm-7">
						<?php print $this->Form->input('vocation', array('type' => 'select', 'class' => 'form-control', 'label' => FALSE, 'options' => Configure::read('Vocations'), 'empty' => 'Escolha sua vocação')); ?>
					</div>
				</div>
				<div class="form-group">
					<label for="inputTown" class="col-sm-3 control-label">Sexo:</label>
					<div class="col-sm-7">
						<?php 
						$options = array('1' => 'Male', '0' => 'Female');
						$attributes = array('legend' => false);
						echo $this->Form->radio('sex', $options, $attributes);
						?>
					</div>
				</div>
				<div class="form-group">
					<label for="inputTown" class="col-sm-3 control-label">Cidade:</label>
					<div class="col-sm-7">
						<?php print $this->Form->input('town_id', array('type' => 'select', 'class' => 'form-control', 'label' => FALSE, 'options' => $towns, 'empty' => 'Escolha sua cidade')); ?>
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
