<?php
#Não mexa neste arquivo! Só mexa se tiver o conhecimento!#
#Requisita o config.php na index
require_once '../../config.php';

#Definições de constantes
#Nome do servidor
define('server_name', $config['Server']['name']);
#Slogan do servidor
define('server_slogan', $config['Server']['slogan']);
#Url do site
define('url', 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
#Definição do banco de dados
define('hostname', $config['Database']['hostname']);
define('username', $config['Database']['username']);
define('password', $config['Database']['password']);
define('database', $config['Database']['database']);