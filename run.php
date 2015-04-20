<?php
use Propel\Runtime\Propel;
use Propel\Runtime\Connection\ConnectionManagerSingle;

require __DIR__ . '/vendor/autoload.php';
require 'config.php';
require 'Serv.php';

/* php "./vendor/propel/propel/bin/propel.php" model:build */

echo "start server ip: ".SERVER_IP.':'.SERVER_PORT;

$app = new Ratchet\App(SERVER_IP, SERVER_PORT, '0.0.0.0');
//$app = new Ratchet\App(SERVER_IP, SERVER_PORT);
$app->route('/', new Serv, ["*"]);
$app->run();