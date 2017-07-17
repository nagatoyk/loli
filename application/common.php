<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function mdToHtml($data, $field, $type = 'art', $Url = null)
{
    if($type != 'art' && !is_null($Url))
    {
        $text = ($i = strpos($data[$field], '<!--more-->')) !== false ? substr($data[$field], 0, $i + 11) . '<p class="more"><a href="' . $Url . '">- 查看更多 -</a></p>' : $data[$field];
    }else{
        $text = $data[$field];
    }
    return \Michelf\MarkdownExtra::defaultTransform($text);
}