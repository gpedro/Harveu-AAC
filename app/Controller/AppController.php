<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'posts', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'posts', 'action' => 'index')
        )
    );
    function beforeFilter() {
    	Security::setHash('sha1');
        $this->Auth->allow('index');
    }
	
	#Funções OTServer Status
	function Connect($host, $port) {
		$this->Host = $host;
		$this->Port = $port;
		$this->checkTime = (!$this->checkTime ? 300 : $this->checkTime);
		// load status file
		$Status = @parse_ini_file("status\\{$host}");
		// check time to next server check
		if($Status['LastCheck'] <= (time() - $this->checkTime)) {
		
			$Socket = fsockopen($this->Host, $this->Port, $errno, $errstr, 5);
			
			if(!$Socket) {
				return false;
			} else {

				stream_set_timeout($Socket, 1);
				stream_set_blocking($Socket, false);

				fwrite($Socket, chr(6).chr(0).chr(255).chr(255).'info');
				while(!feof($Socket)) {
					$this->SocketData .= fgets($Socket, 8192);
				}
				fclose($Socket);

				preg_match('/players online="(\d+)" max="(\d+)"/', $this->SocketData, $matches);
				$this->Players = $matches[1];
				$this->PlayersMax = $matches[2];

				preg_match('/uptime="(\d+)"/', $this->SocketData, $matches);
				$this->UptimeHour = floor($matches[1] / 3600);
				$this->UptimeMinutes = floor(($matches[1] - $this->UptimeHour * 3600) / 60);

				preg_match('/monsters total="(\d+)"/', $this->SocketData, $matches);
				$this->Monsters = $matches[1];
				
				// update players peak
				if($this->Players > $Status['PlayersPeak']) {
					$this->PlayersPeak = $this->Players;
				} else {
					$this->PlayersPeak = $Status['PlayersPeak'];
				}

				preg_match('#server="(.*?)" version="(.*?)"#s', $this->SocketData, $matches);
				$this->ServerVersion = "{$matches[1]} {$matches[2]}";

				// Get current number of npcs on server
				// NOTE: on some servers, it returns zero
				preg_match('#npcs total="(.*?)"#s', $this->SocketData, $matches);
				#$this->NPCs = $matches[1];

				preg_match('#name="(.*?)" author="(.*?)" width="(.*?)" height="(.*?)"#s', $this->SocketData, $matches);
				$this->MapName = $matches[1];
				$this->MapAuthor = $matches[2];
				$this->MapWidth = $matches[3];
				$this->MapHeight = $matches[4];

				preg_match('#servername="(.*?)"#s', $this->SocketData, $matches);
				$this->ServerName = $matches[1];
				
				// Get current server client version
				// NOTE: on some servers this doesn't work
				preg_match('#client="(.*?)"#s', $this->SocketData, $matches);
				$this->ClientVersion = $matches[1];
				
				preg_match('#ip="(.*?)"#s', $this->SocketData, $matches);
				$this->ServerIP = $matches[1];

				// save status file
				$this->SaveStatus();
				
				return true;
			}
		} else {
			
			$this->ServerIP = $Server['ServerIP'];
			
			$this->Players = $Status['Players'];
			$this->PlayersMax = $Status['PlayersMax'];
			$this->PlayersPeak = $Status['PlayersPeak'];

			$this->UptimeHour = $Status['UptimeHours'];
			$this->UptimeMinutes = $Status['UptimeMinutes'];

			$this->NPCs = $Status['NPCs'];
			$this->Monsters = $Status['Monsters'];

			$this->MapWidth = $Status['MapWidth'];
			$this->MapHeight = $Status['MapHeight'];
			$this->MapName = $Status['MapName'];

			$this->ServerName = $Status['ServerName'];
			$this->ClientVersion = $Status['ClientVersion'];
			$this->ServerVersion = $Status['ServerVersion'];
			
			return true;
		}
	}
	
	function SetCheckTime($seconds) {
		$this->checkTime = (int) $seconds;
	}

	function PlayersPeak() {
		$PlayersPeak = (int) $this->PlayersPeak;
		return (!$PlayersPeak ? 0 : $PlayersPeak);
	}
	
	function ServerIP() {
		return $this->ServerIP;
	}
	
	function ServerVersion() {
		return (!$this->ServerVersion ? 'N/A' : $this->ServerVersion);
	}
	
	function ServerName() {
		return $this->ServerName;
	}
	
	function ClientVersion() {
		return $this->ClientVersion;
	}
	
	function Monsters() {
		$Monsters = (int) $this->Monsters;
		return (!$Monsters ? 0 : $Monsters);
	}
	
	function NPCs() {
		$NPCs = (int) $this->NPCs;
		return (!$NPCs ? 0 : $NPCs);
	}
	
	function UptimeHours() {
		$UptimeHour = (int) $this->UptimeHour;
		return (!$UptimeHour ? 0 : $UptimeHour);
	}
	
	function UptimeMinutes() {
		$UptimeMinutes = (int) $this->UptimeMinutes;
		return (!$UptimeMinutes ? 0 : $UptimeMinutes);
	}
	
	function Players() {
		$Players = (int) $this->Players;
		return (!$Players ? 0 : $Players);
	}
	
	function PlayersMax() {
		$PlayersMax = (int) $this->PlayersMax;
		return (!$PlayersMax ? 0 : $PlayersMax);
	}
	
	function MapName() {
		$MapName = (int) $this->MapName;
		return (!$MapName ? 0 : $MapName);
	}
	
	function MapAuthor() {
		$MapAuthor = (int) $this->MapAuthor;
		return (!$MapAuthor ? 0 : $MapAuthor);
	}
	
	function MapWidth() {
		$MapWidth = (int) $this->MapWidth;
		return (!$MapWidth ? 0 : $MapWidth);
	}

	function MapHeight() {
		$MapHeight = (int) $this->MapHeight;
		return (!$MapHeight ? 0 : $MapHeight);
	}
	
	private function SaveStatus() {
		$Status = array(
			'LastCheck' => time() + $this->checkTime,
			'ServerIP' => $this->ServerIP(),
			'Players' => $this->Players(),
			'PlayersMax' => $this->PlayersMax(),
			'PlayersPeak' => $this->PlayersPeak(),
			'UptimeHours' => $this->UptimeHours(),
			'UptimeMinutes' => $this->UptimeMinutes(),
			'Monsters' => $this->Monsters(),
			'ServerVersion' => $this->ServerVersion(),
			'NPCs' => $this->NPCs(),
			'MapName' => $this->MapName(),
			'MapAuthor' => $this->MapAuthor(),
			'MapWidth' => $this->MapWidth(),
			'MapHeight' => $this->MapHeight(),
			'ClientVersion' => $this->ClientVersion(),
		);
		/*foreach ($Status as $key => $content){
			$lines .= "{$key} = {$content}\n";
		}
		// save config file
		file_put_contents("{$this->Host}", $lines);*/
	}
}
