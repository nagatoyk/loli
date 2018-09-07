<?php
require_once './mysql.class.php';
echo '<pre>' . print_r($sql, true) . '</pre>';
$sqlText = "CREATE TABLE IF NOT EXISTS `tp_app` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no` varchar(11) NOT NULL,
  `year` varchar(4) NOT NULL,
  `month` varchar(2) NOT NULL,
  `day` varchar(2) NOT NULL,
  `time` varchar(11) NOT NULL,
  `recTime` varchar(11) NOT NULL,
  `tjr` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;";
$sql->runSql($sqlText);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://e.o2obest.cn/webapp/market/ListMore?page=' . $page . '&startTime=');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIE, 'USERSESSID=ubi6i93sai8svfmhkhgno68c03');
$output = curl_exec($ch);
curl_close($ch);
$json = json_decode($output, true);
echo '<pre>' . print_r($json, true) . '</pre>';
