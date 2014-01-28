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
			<li <?php if($this->params['controller'] == 'posts' && $this->params['action'] == 'index') { ?> class="active" <?php } ?>>
				<a href="<?php echo Configure::read('site.url'); ?>">Home</a>
			</li>
			<li <?php if($this->params['controller'] == 'community') { ?> class="active" <?php } ?> class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Community <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo Configure::read('site.url'); ?>community/characters">Characters</a></li>
					<li><a href="<?php echo Configure::read('site.url'); ?>community/highscores">Highscores</a></li>
					<li><a href="<?php echo Configure::read('site.url'); ?>community/houses">Houses</a></li>
					<li class="divider"></li>
					<li><a href="<?php echo Configure::read('site.url'); ?>community/guilds">Guilds</a></li>
					<li><a href="<?php echo Configure::read('site.url'); ?>community/guild_war">Guild War</a></li>
					<li class="divider"></li>
					<li><a href="<?php echo Configure::read('site.url'); ?>community/live_casts">Live Casts</a></li>
				</ul>
			</li>
			<li <?php if($this->params['controller'] == 'library') { ?> class="active" <?php } ?> class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Library <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="<?php echo Configure::read('site.url'); ?>library/spells">Spells</a></li>
					<li><a href="<?php echo Configure::read('site.url'); ?>library/monsters">Monsters</a></li>
					<li><a href="<?php echo Configure::read('site.url'); ?>library/quests">Quests</a></li>
					<li class="divider"></li>
					<li><a href="<?php echo Configure::read('site.url'); ?>library/exp_stages">Exp. stages</a></li>
				</ul>
			</li>
			<li><a href="#">Shop</a></li>
		</ul>
		<ul class="nav navbar-nav navbar-right" style="margin-right: 0px;">
			<li <?php if($this->params['controller'] == 'users' && $this->params['action'] == 'register') { ?> class="active" <?php } ?>>
				<a href="">Register</a>
			</li>
			<li <?php if($this->params['controller'] == 'users' && $this->params['action'] == 'login') { ?> class="active" <?php } ?>>
				<a href="<?php echo Configure::read('site.url'); ?>users/login">Log in</a>
			</li>
		</ul>
	</div><!-- /.navbar-collapse -->
</nav>
<!-- <?php #echo Configure::read('site.url'); ?>users/register -->