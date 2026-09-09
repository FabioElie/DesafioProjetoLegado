<?php

define('BASE_DIR', dirname(__FILE__, 2)); // VARIÁVEL CONSTANTE E GLOBAL
define('VIEW', BASE_DIR .  '/desafioprojetolegado/View'); // VARIÁVEL CONSTANTE E GLOBAL
define('URL_BASE', '/desafioprojetolegado');
define('APP_URL', '/Desafio/desafioprojetolegado'); // prefixo usado nas rotas/links

$_ENV['db']['host'] = 'localhost';
$_ENV['db']['user'] = 'root';
$_ENV['db']['pass'] = '';
$_ENV['db']['database'] = 'desafio_legado';
