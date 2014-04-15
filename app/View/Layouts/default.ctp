<!DOCTYPE html>
<html>
	<head>
		<?php echo $this->Html->charset(); ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php echo $title_for_layout.' :: '.titleServer; ?></title>
		<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('style');
		echo $this->Html->css('bootstrap');
		echo $this->Html->script('https://code.jquery.com/jquery.js');
		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script('funcoes');
		echo $this->Html->script('ckeditor');
		echo $this->Html->script('../adapters/jquery');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		?>
	</head>
	<body>
		<div id="topo" class="hidden-xs">
			<h1>
				<?php echo nameServer; ?> <small><?php echo titleServer; ?></small>
			</h1>
		</div>
		<?php echo $this->element('aac/menu'); ?>
		<div id="wrapper" class="container">
			<div class="content">
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
			</div>
			<div id="footer">
				&copy; <?php echo date('Y').' - '.nameServer; ?> | Engine: <b><?php echo $this->Html->link('Harveu AAC', array('controller' => 'pages', 'action' => 'display', 'credits')); ?></b>
			</div>
		</div>
		<?php #echo $this->element('sql_dump'); ?>
	</body>
</html>
