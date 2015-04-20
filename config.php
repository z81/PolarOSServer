<?php

use Propel\Runtime\Propel;
use Propel\Runtime\Connection\ConnectionManagerSingle;

$conf = include('propel.php');


const SERVER_PORT = 8181;
define('SERVER_IP', trim(file_get_contents('http://icanhazip.com/')));

$serviceContainer = Propel::getServiceContainer();
//$serviceContainer->setAdapterClass('polaros', 'mysql');
$serviceContainer->setAdapterClass('polaros', 'sqlite');

$manager = new ConnectionManagerSingle();
$manager->setConfiguration($conf['propel']['database']['connections']['polaros']);

$serviceContainer->setConnectionManager('polaros', $manager);