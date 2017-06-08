<?php

namespace app\Index\controller;

use think\Controller;
use think\Request;

class Common extends Controller
{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        $this->assign('cate', model('Category')->where('des','<>','')->order('id','asc')->select());
        $json = json_decode(file_get_contents('http://hitoapi.cc/s/?_='.time()), true);
        $this->assign('hito', $json);
    }
}
