<?php

namespace app\admin\controller;

use think\Controller;

class Rizhi extends Controller
{
    //
    public function index()
    {
        return $this->fetch();
    }

    public function store()
    {
        if(request()->isPost())
        {
            $rizhi = new \app\common\model\Rizhi();
            $res = $rizhi->store(['data'=>json_encode(input('post.'))]);
            echo $res['msg'];
        }
    }
}
