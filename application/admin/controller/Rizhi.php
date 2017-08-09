<?php

namespace app\admin\controller;

use think\Controller;

class Rizhi extends Controller
{
    //
    public function index()
    {
        $list = model('Rizhi')->order('id', 'DESC')->select();
        $data = [];
        foreach($list as $da)
        {
            $d = json_decode($da['data'], true);
            $data[] = [
                'id'=>$da['id'],
                'xj1'=>$d['xj1'],
                'xj2'=>$d['xj2'],
                'alipay1'=>$d['alipay1'],
                'alipay2'=>$d['alipay2'],
                'ce1'=>$d['ce1'],
                'ce2'=>$d['ce2'],
                'cdk'=>$d['cdk']
            ];
        }
        $this->assign('rizhi', $data);
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
