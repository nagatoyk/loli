<?php
require_once './mysql.class.php';

if (!empty($_POST)) {
    $st = strtotime($_POST['st'] . ' 00:00:00');
    $et = strtotime($_POST['et'] . ' 23:59:59');
    // $list = $sql->getData('select * from app where recTime >= "'.$st.'" and recTime <= "'.$et.'" order by recTime desc');
    // $count = $sql->getVar('select count(*) as cnt from app where recTime >= "'.$st.'" and recTime <= "'.$et.'"');
    // print_r($count);
}
echo '<pre>'.print_r($sql, true).'</pre>';