<script>
CKEDITOR.disableAutoInline = true;

$( document ).ready( function() {
	$( '#body' ).ckeditor(); // Use CKEDITOR.replace() if element is <textarea>.
} );
</script>
<ol class="breadcrumb">
	<li><a href="<?php echo Configure::read('site.url'); ?>admin">Admin</a></li>
	<li><a href="<?php echo Configure::read('site.url'); ?>admin/posts">Posts</a></li>
	<li class="active">Add</li>
</ol>
<div class="panel panel-default">
	<div class="panel-body">
		<?php echo $this->Form->create('Post', array('class' => 'form-horizontal', 'role' => 'form')); ?>
			<div class="form-group">
				<label for="inputTitle" class="col-sm-2 control-label">Title</label>
				<div class="col-sm-10">
					<?php echo $this->Form->input(
						'title', 
						array(
							'class' 		=> 'form-control',
							'id' 			=> 'inputTitle',
							'placeholder' 	=> 'Title post',
							'label' 		=> FALSE
						)
					); ?>
				</div>
			</div>
			<div class="form-group">
				<label for="body" class="col-sm-2 control-label">Body</label>
				<div class="col-sm-10">
					<?php echo $this->Form->input(
						'body', 
						array(
							'class' 	=> 'form-control',
							'id' 		=> 'body',
							'type'		=> 'textarea',
							'label' 	=> FALSE
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