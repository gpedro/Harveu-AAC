<?php
foreach ($posts as $post) {
?>
<div class="panel panel-default">
	<div class="panel-heading"><?php echo $post['Post']['title']; ?></div>
	<div class="panel-body new-body">
		<?php echo $post['Post']['body']; ?>
	</div>
	<div class="panel-footer new-footer">
		Posted <?php echo date('d/m/Y', strtotime($post['Post']['created'])); ?> 
		at <?php echo date('H:i', strtotime($post['Post']['created'])); ?>
	</div>
</div>
<?php
}
?>