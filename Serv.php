<?php
use Ratchet\ConnectionInterface;
use Ratchet\MessageComponentInterface;
use Propel\Runtime\Propel;
use Propel\Runtime\Connection\ConnectionManagerSingle;
use Propel\Runtime\ActiveQuery\ModelCriteria;

class Serv implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $data = json_decode($msg);

        if(property_exists($data, 'type')) {
        	switch($data->type) {
        		case 'run':
                    include './commands/run.php';
        		break;
                case 'get': 
                    include './commands/get.php';
                break;
                case 'set':
                    include './commands/set.php';
                break;

        	}
            

        }
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        $conn->close();
    }
}