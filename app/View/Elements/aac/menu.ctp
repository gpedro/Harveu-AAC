<nav class="navbar navbar-default navbar-static-top" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-8">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand visible-xs" href="<?php echo Configure::read('site.url'); ?>">
			<?php echo Configure::read('site.name'); ?>
		</a>
	</div>
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-8">
		<ul class="nav navbar-nav">
			<li class="active"><a href="<?php echo Configure::read('site.url'); ?>">Home</a></li>
			<li><a href="#">Community</a></li>
			<li><a href="#">Library</a></li>
			<li><a href="#">Shop</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right" style="margin-right: 0px;">
			<li><a href="#">Register</a></li>
			<li><a href="#">Log in</a></li>
		</ul>
	</div><!-- /.navbar-collapse -->
</nav>