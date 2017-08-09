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
            $data = json_encode(input('post.'));
            $rizhi = new \app\common\model\Rizhi();
            $res = $rizhi->store($data);
            echo $res['msg'];
        }
    }
}
