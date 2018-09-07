<?php
echo '<a href="/list.php">新增APP会员查询</a>';
$list = glob('./*');
echo '<pre>' . print_r($list, true) . '</pre>';
echo '<pre>' . print_r($_SERVER, true) . '</pre>';

echo '<pre>' . print_r($_ENV, true) . '</pre>';
