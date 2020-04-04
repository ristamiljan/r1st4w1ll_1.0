
<?php 
require_once __DIR__ . '/../vendor/autoload.php';
include('../config/database.php');

use Controllers\Controller as Controller;
use Users\User as User;
use Connections\Connection as Connection;


Connection::getPDO($DB_HOST,$DB_NAME,$DB_USER,$DB_PASS);


include('../routes/routes.php');
?>
