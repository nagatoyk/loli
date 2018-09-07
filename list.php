<?php
require_once './mysql.class.php';
echo '<pre>' . print_r($sql, true) . '</pre>';
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://e.o2obest.cn/webapp/market/ListMore?page=' . $page . '&startTime=');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_COOKIE, 'USERSESSID=ubi6i93sai8svfmhkhgno68c03');
$output = curl_exec($ch);
curl_close($ch);
$json = json_decode($output, true);
echo '<pre>' . print_r($json, true) . '</pre>';
