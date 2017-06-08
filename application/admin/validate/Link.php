<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/4
 * Time: 16:34
 */

namespace app\admin\validate;

use think\Validate;

class Link extends Validate
{
    protected $rule = [
        'icon'=>'url',
        'title'=>'require',
        'url'=>'require|url',
        'des'=>'require'
    ];
    protected $message = [
        'icon.url'=>'友链图标格式不正确',
        'title.require'=>'友链名称不能为空',
        'url.require'=>'友链地址不能为空',
        'url.url'=>'友链地址格式不正确',
        'des.require'=>'友链描述不能为空'
    ];
}