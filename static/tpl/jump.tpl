{__NOLAYOUT__}
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>跳转提示</title>
    <!--<meta http-equiv="refresh" content="<?php echo($wait);?>;url=<?php echo($url);?>">-->
    <style>
        html{margin:0;height:100%;}

        h1{font:120px/400px '\5FAE\8F6F\96C5\9ED1';width:960px;color:#AAA;text-shadow:0 0 1px;text-align:center;position:absolute;top:50%;left:50%;margin:-230px 0 0 -480px;}
    </style>
</head>
<body>
    <h1><?php echo strip_tags($msg);?></h1>
    <script>(function(){setTimeout(function(){location.href='<?php echo($url);?>'},<?php echo($wait);?>e3)})()</script>
</body>
</html>