<?php
require_once 'mysql.class.php';

if (!empty($_POST)) {
    $st = strtotime($_POST['st'] . ' 00:00:00');
    $et = strtotime($_POST['et'] . ' 23:59:59');
    $list = $sql->getData('select * from app where recTime >= "'.$st.'" and recTime <= "'.$et.'" order by recTime desc');
    // $sql = $db->select()->from('table.app')->where('recTime >= ? and recTime <= ?', $st, $et)->order('recTime', Typecho_Db::SORT_DESC);
//    echo $sql;
    // $list = $db->fetchAll($sql);
//    echo '<pre>' . print_r($list, true) . '</pre>';
    $count = $sql->getVar('select count(*) as cnt from app where recTime >= "'.$st.'" and recTime <= "'.$et.'"');
    print_r($count);
    // $count = $db->fetchRow($db->select('count(*) as cnt')->from('table.app')->where('recTime >= ? and recTime <= ?', $st, $et));
    // extract($count);
}
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>app新增会员查询</title>

    <!-- Bootstrap -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim 和 Respond.js 是为了让 IE8 支持 HTML5 元素和媒体查询（media queries）功能 -->
    <!-- 警告：通过 file:// 协议（就是直接将 html 页面拖拽到浏览器中）访问页面时 Respond.js 不起作用 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .table th, .table td {
            /*text-align: center;*/
        }

        .table tbody tr td {
            vertical-align: middle;
        }
    </style>
</head>
<?php
$url = (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) ? $_SERVER['HTTP_X_FORWARDED_PROTO'] : 'http') . '://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
$url = urlencode($url);
?>
<div class="text-center qrcode">
    <img src="//api.imjad.cn/qrcode?text=<?php echo $url; ?>&logo=&size=180&level=H&bgcolor=%23ffffff&fgcolor=%23000000">
</div>
<form name="form1" action="/list.php" method="post">
    <div id="main" class="text-center">
        <span style="padding-left: 20px">
        查询日期
        <input type="date" name="st" value="<?php echo(isset($_POST['st']) ? $_POST['st'] : date('Y-m-d', time())); ?>">
        至
        <input type="date" name="et" value="<?php echo(isset($_POST['et']) ? $_POST['et'] : date('Y-m-d', time())); ?>">
        <input type="submit" name="search" style="margin-left:20px;padding: 5px 10px;" value="查询">
        </span>
    </div>
</form>
<?php if (!empty($_POST)) { ?>
    <a href="/appout.php?st=<?php echo $_POST['st']; ?>&et=<?php echo $_POST['et']; ?>" style="float: right">导出Excel</a>
    <div class="listbox">
        <table class="table table-striped table-center" style="width: 100%">
            <thead>
            <tr style="background-color: #B8B8B8">
                <th>会员注册号</th>
                <th>注册时间</th>
                <!--<th>已绑定银联卡</th>
                <th>绑定时间</th>
                <th>已绑定加油卡</th>
                <th>绑定时间</th>-->
                <th>推荐人</th>
            </tr>
            </thead>
            <tr>
                <td colspan="3" class="text-center">累计注册会员 [<?php echo $cnt; ?>]</td>
            </tr>
            <?php foreach ($list as $k => $v) { ?>
                <tr>
                    <td><?php echo $v['no']; ?></td>
                    <td><?php echo date('Y-m-d H:i:s', $v['recTime']); ?></td>
                    <!--<td></td>
                    <td></td>
                    <td></td>
                    <td></td>-->
                    <td></td>
                </tr>
            <?php } ?>
        </table>
    </div>
<?php } ?>
<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    $(function () {
        $.get('/appget.php?a=get', function (e) {
            console.log(e)
        });
    })
</script>
</body>
</html>
