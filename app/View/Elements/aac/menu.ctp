<nav class="navbar navbar-default navbar-static-top" role="navigation">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-8">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand visible-xs" href="<?php echo url; ?>">
			<?php echo nameServer; ?>
		</a>
	</div>
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-8">
		<ul class="nav navbar-nav">
			<li <?php if($this->params['controller'] == 'posts' && $this->params['action'] == 'index') { ?> class="active" <?php } ?>>
				<a href="<?php echo url; ?>">Home</a>
			</li>
			<li <?php if($this->params['controller'] == 'community') { ?> class="active" <?php } ?> class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Community <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li <?php if($this->params['controller'] == 'community' && $this->params['action'] == 'characters') { ?> class="active" <?php } ?>>
						<a href="<?php echo url; ?>community/characters">Characters</a>
					</li>
					<li <?php if($this->params['controller'] == 'community' && $this->params['action'] == 'highscores') { ?> class="active" <?php } ?>>
						<a href="<?php echo url; ?>community/highscores">Highscores</a>
					</li>
					<li <?php if($this->params['controller'] == 'community' && $this->params['action'] == 'houses') { ?> class="active" <?php } ?>>
						<a href="<?php echo url; ?>community/houses">Houses</a>
					</li>
					<li class="divider"></li>
					<li <?php if($this->params['controller'] == 'community' && $this->params['action'] == 'guilds') { ?> class="active" <?php } ?>>
						<a href="<?php echo url; ?>community/guilds">Guilds</a>
					</li>
					<li <?php if($this->params['controller'] == 'community' && $this->params['action'] == 'guild_war') { ?> class="active" <?php } ?>>
						<a href="<?php echo url; ?>community/guild_war">Guild War</a>
					</li>
					<li class="divider"></li>
					<li <?php if($this->params['controller'] == 'community' && $this->params['action'] == 'live_casts') { ?> class="active" <?php } ?>>
						<a href="<?php echo url; ?>community/live_casts">Live Casts</a>
					</li>
				</ul>
			</li>
			<li <?php if($this->params['controller'] == 'library') { ?> class="active" <?php } ?> class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Library <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li <?php if($this->params['controller'] == 'library' && $this->params['action'] == 'spells') { ?> class="active" <?php } ?>>
						<a href="<?php echo url; ?>library/spells">Spells</a>
					</li>
					<li <?php if($this->params['controller'] == 'library' && $this->params['action'] == 'monsters') { ?> class="active" <?php } ?>>
						<a href="<?php echo url; ?>library/monsters">Monsters</a>
					</li>
					<li <?php if($this->params['controller'] == 'library' && $this->params['action'] == 'quests') { ?> class="active" <?php } ?>>
						<a href="<?php echo url; ?>library/quests">Quests</a>
					</li>
					<li class="divider"></li>
					<li <?php if($this->params['controller'] == 'library' && $this->params['action'] == 'exp_stages') { ?> class="active" <?php } ?>>
						<a href="<?php echo url; ?>library/exp_stages">Exp. stages</a>
					</li>
				</ul>
			</li>
			<li><a href="#">Shop</a></li>
		</ul>
		<?php if(!empty($this->Session->read('account'))) { ?>
		<ul class="nav navbar-nav navbar-right" style="margin-right: 0px;">
			<li <?php if($this->params['controller'] == 'accounts') { ?> class="active" <?php } ?> class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li <?php if($this->params['controller'] == 'accounts' && $this->params['action'] == 'manager') { ?> class="active" <?php } ?>>
						<a href="<?php echo url; ?>accounts/manager">Manager</a>
					</li>
					<li <?php if($this->params['controller'] == 'players' && $this->params['action'] == 'create') { ?> class="active" <?php } ?>>
						<a href="<?php echo url; ?>players/create">Create player</a>
					</li>
					<li <?php if($this->params['controller'] == 'accounts' && $this->params['action'] == 'change') { ?> class="active" <?php } ?>>
						<a href="<?php echo url; ?>accounts/change/<?php echo $this->Session->read('account_id'); ?>">Change details</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="<?php echo url; ?>accounts/logout">Logout</a>
			</li>
		</ul>
		<?php } else { ?>
		<ul class="nav navbar-nav navbar-right" style="margin-right: 0px;">
			<li <?php if($this->params['controller'] == 'accounts' && $this->params['action'] == 'create') { ?> class="active" <?php } ?>>
				<a href="<?php echo url; ?>accounts/create">Register</a>
			</li>
			<li <?php if($this->params['controller'] == 'accounts' && $this->params['action'] == 'login') { ?> class="active" <?php } ?>>
				<a href="<?php echo url; ?>accounts/login">Log in</a>
			</li>
		</ul>
		<?php } ?>
	</div><!-- /.navbar-collapse -->
</nav>