<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// $list = glob('../*');
// echo '<pre>'.print_r($list, true).'</pre>';
// echo '<pre>'.print_r($_SERVER).'</pre>';
$sql1 = <<<STR
CREATE TABLE IF NOT EXISTS `imouto_article` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `created` int(10) unsigned DEFAULT '0',
  `modified` int(10) unsigned DEFAULT '0',
  `text` text,
  `cover` varchar(32) NOT NULL,
  `category` varchar(10) NOT NULL,
  `authorId` int(10) unsigned DEFAULT '0',
  `look` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pid`),
  KEY `created` (`created`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
STR;
$sql2 = <<<STR
CREATE TABLE IF NOT EXISTS `imouto_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icon` varchar(30) NOT NULL,
  `name` varchar(60) NOT NULL,
  `des` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
STR;
$sql3 = <<<STR
CREATE TABLE IF NOT EXISTS `imouto_core_attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `extension` varchar(5) NOT NULL,
  `size` int(11) NOT NULL,
  `hash` varchar(64) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
STR;
$sql4 = <<<STR
CREATE TABLE IF NOT EXISTS `imouto_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `icon` varchar(30) NOT NULL,
  `name` varchar(60) NOT NULL,
  `url` varchar(60) NOT NULL,
  `des` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
STR;
$sql5 = <<<STR
CREATE TABLE IF NOT EXISTS `imouto_rizhi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `xj1` int(11) NOT NULL,
  `xj2` int(11) NOT NULL,
  `ce1` int(11) NOT NULL,
  `alipay1` int(11) NOT NULL,
  `alipay2` int(11) NOT NULL,
  `ce2` int(11) NOT NULL,
  `cdk` int(11) NOT NULL,
  `jifen` int(11) NOT NULL,
  `created` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
STR;
$sql5 = <<<STR
CREATE TABLE IF NOT EXISTS `imouto_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `nickname` varchar(60) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
STR;
$sql6 = <<<STR
CREATE TABLE IF NOT EXISTS `imouto_webset` (
  `webset_id` int(11) NOT NULL AUTO_INCREMENT,
  `webset_name` varchar(30) NOT NULL,
  `webset_value` text NOT NULL,
  `webset_des` text NOT NULL,
  PRIMARY KEY (`webset_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
STR;
define('SQL_STR', $sql1);
echo SQL_STR;
exit();
// [ 应用入口文件 ]
// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');
// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';
