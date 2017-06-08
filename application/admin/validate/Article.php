<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/4
 * Time: 11:22
 */

namespace app\admin\validate;

use think\Validate;

class Article extends Validate
{
    protected $rule = [
        'title'=>'require',
        'text'=>'require',
        'category'=>'require'
    ];
    protected $message = [
        'title.require'=>'标题不能为空',
        'text.require'=>'正文内容不能为空',
        'category.require'=>'分类不能为空'
    ];
}