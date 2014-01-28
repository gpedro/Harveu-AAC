<div class="panel panel-default">
	<div class="panel-body">
	<?php
	$OTServ = new AppController;
	
	// add this only if you need to set a check time higher than 5 minutes
	$OTServ->SetCheckTime(300); // in seconds // call this before starting the connection
	
	$Connect = $OTServ->Connect('shadowcores.twifysoft.net', 7171);
	
	if(!$Connect) {
		echo 'server offline';
	} else {
		echo "Players: {$OTServ->Players()} ({$OTServ->PlayersPeak()}) / {$OTServ->PlayersMax()}<BR>Uptime: {$OTServ->UptimeHours()} hours & {$OTServ->UptimeMinutes()} minutes<BR>Monsters: {$OTServ->Monsters()}<BR>Distro: {$OTServ->ServerVersion()}";
	}
	?>
	</div>
</div>