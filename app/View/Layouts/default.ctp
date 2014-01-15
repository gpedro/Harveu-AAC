<!DOCTYPE html>
<html>
	<head>
		<?php echo $this->Html->charset(); ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $title_for_layout; ?></title>
		<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('style');
		echo $this->Html->css('bootstrap');
		echo $this->Html->script('https://code.jquery.com/jquery.js');
		echo $this->Html->script('bootstrap.min');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		?>
	</head>
	<body>
		<div id="topo" class="hidden-xs">
			<h1>
				<?php echo Configure::read('site.name'); ?> <small><?php echo Configure::read('site.slogan'); ?></small>
			</h1>
		</div>
		<?php echo $this->element('aac/menu'); ?>
		<div id="wrapper" class="container">
			<div class="content">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			</div>
			<div id="footer">&copy; <?php echo date('Y').' - '.Configure::read('site.name'); ?></div>
		</div>
		<?php echo $this->element('sql_dump'); ?>
	</body>
</html>
