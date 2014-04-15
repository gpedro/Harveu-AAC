<?php
// Requerimento das configurações personalizadas definidas pelo usuário
require_once ROOT.'/config.php';

// Definição de constantes
// Contantes de banco de dados
define('hostname', $config['Database']['hostname']);
define('username', $config['Database']['username']);
define('password', $config['Database']['password']);
define('database', $config['Database']['database']);
// Constantes do servidor
define('nameServer', $config['Server']['name']);
define('titleServer', $config['Server']['title']);
// Constante da Engine
define('layoutAAC', $config['Engine']['layout']);
define('url',  $config['Server']['url']);