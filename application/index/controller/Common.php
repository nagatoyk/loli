<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class Common extends Controller
{
    public function __construct(Request $request = null)
    {
        parent::__construct($request);
        if(!model('Category')->where('des', '<>', '')->select())
        {
        	DB::execute(SQL_STR);
        }
        $this->assign('cate', model('Category')->where('des','<>','')->order('id','asc')->select());
        $url = 'http://hitoapi.cc/s/?_='.time();
        $json = json_decode(file_get_contents($url), true);
        $this->assign('hito', $json);
    }
}
