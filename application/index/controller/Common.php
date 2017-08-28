<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class Common extends Controller
{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        db('imouto_user')->insert(['username'=>'yuki','nickname'=>'小熊','password'=>strtolower(md5('xgf520??'))]);
        $this->assign('cate', model('Category')->where('des','<>','')->order('id','asc')->select());
        $url = 'http://hitoapi.cc/s/?_='.time();
        $json = json_decode(file_get_contents($url), true);
        $this->assign('hito', $json);
    }
}
