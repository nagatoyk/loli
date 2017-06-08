<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/4
 * Time: 15:15
 */

namespace app\admin\validate;

use think\Validate;

class Category extends Validate
{
    protected $rule = [
        'icon'=>'require',
        'name'=>'require'
    ];
    protected $message = [
        'icon.require'=>'分类图标名称不能为空',
        'name.require'=>'分类名称不能为空'
    ];
}