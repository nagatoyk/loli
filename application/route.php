<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['view/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['view/hello', ['method' => 'post']],
    ],
    '/'=>'index/index/index',
    'link'=>'index/link/index',
    'live'=>'index/index/live',
    '[page]'=>[
        ':page'=>['index/index/index', ['method'=>'get'], ['page'=>'\d+']]
    ],
    '[cate]'=>[
        ':cate'=>['index/cate/index', ['method'=>'get'], ['cate'=>'\w+']],
        ':page'=>['index/cate/index', ['method'=>'get'], ['page'=>'\d+']]
    ],
    '[archive]'=>[
        ':pid'=>['index/article/index', ['method'=>'get'], ['pid'=>'\d+']]
    ],
    '[user]'=>[
        ':uid'=>['index/user/index', ['method'=>'get'], ['uid'=>'\d+']]
    ],

];
