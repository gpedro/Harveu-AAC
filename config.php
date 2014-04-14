<?php
// Settings required for the proper functioning of Harveu AAC
// Configuration database
$config['Database'] = array (
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'tfs'
);
// Configuration server informations
$config['Server'] = array (
	'name' => 'Harveu AAC',
	'slogan' => 'Now your server has a super AAC!',
	'url' => 'http://localhost/Harveu-AAC/'
);
$config['Cities'] = array(
	1 => 'Main City',
	2 => 'Second City'
);
$config['Vocations'] = array(
	0 => 'None',
	1 => 'Sorcerer',
	2 => 'Druid',
	3 => 'Paladin',
	4 => 'Knight',
	5 => 'Master Sorcerer',
	6 => 'Elder Druid',
	7 => 'Royal Paladin',
	8 => 'Elite Knight'
);
$config['Worlds'] = array(
	0 => 'Main world',
	//1 => 'Second world'
);
$config['Groups'] = array(
	0 => 'Player',
	1 => 'Tutor',
	2 => 'Senior Tutor',
	3 => 'Gamemaster',
	4 => 'Community Manager',
	5 => 'God'
);

// Configuration website and engine data
$config['Engine'] = array(
	'layout' 	=> 'default'
);