<?php

/**
 * User: TMs
 * Date: 2016-06-06
 * Time: 15:30
 */

require 'DB_driver.php';

$db_driver = 'PDO';//当前可选driver:Mysql,PDO;
if (defined('MYSQL_HOST')) {
    $host = MYSQL_HOST;
    $port = MYSQL_PORT;
    $dbname = MYSQL_DATABASE;
    $user = MYSQL_USERNAME;
    $pwd = MYSQL_PASSWORD;
} else {
    $host = 'localhost';
    $port = 3306;
    $dbname = 'imouto';
    $user = 'root';
    $pwd = 'root';
}

$driver = 'DB_' . $db_driver;
$sql = new $driver($host, $port, $user, $pwd, $dbname);