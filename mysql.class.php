<?php

/**
 * User: TMs
 * Date: 2016-06-06
 * Time: 15:30
 */

require 'DB_driver.php';

$db_driver = 'Mysql';//当前可选driver:Mysql,PDO;
if (!empty($_ENV['MYSQL_SERVICE_HOST'])) {
    $host = $_ENV['MYSQL_SERVICE_HOST'];
    $port = $_ENV['MYSQL_SERVICE_PORT'];
    $dbname = 'sampledb';
    $user = 'shose';
    $pwd = 'xgf520';
} else {
    $host = 'localhost';
    $port = 3306;
    $dbname = 'imouto';
    $user = 'root';
    $pwd = 'root';
}

$driver = 'DB_' . $db_driver;
$sql = new $driver($host, $port, $user, $pwd, $dbname);