<?php

/**
 * User: TMs
 * Date: 2016-06-06
 * Time: 15:30
 */

require 'DB_driver.php';

$db_driver = 'PDO';//当前可选driver:Mysql,PDO;
if (!empty($_ENV['MYSQL_HOST'])) {
    $host = $_ENV['MYSQL_HOST'];
    $port = $_ENV['MYSQL_PORT'];
    $dbname = $_ENV['MYSQL_DATABASE'];
    $user = $_ENV['MYSQL_USERNAME'];
    $pwd = $_ENV['MYSQL_PASSWORD'];
} else {
    $host = 'localhost';
    $port = 3306;
    $dbname = 'imouto';
    $user = 'root';
    $pwd = 'root';
}

$driver = 'DB_' . $db_driver;
$sql = new $driver($host, $port, $user, $pwd, $dbname);