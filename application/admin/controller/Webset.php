<?php

namespace app\Admin\controller;

class Webset extends Common
{
    public function index()
    {
        $field = db('webset')->select();
        $this->assign('setlist', $field);
        return $this->fetch();
    }
    public function edit()
    {
        if(request()->isAjax())
        {
            $res = (new \app\common\model\Webset())->edit(input('post.'));
            if($res['valid'])
            {
                $this->success($res['msg'], 'index');
            }else{
                $this->error($res['msg']);
            }
        }
    }
}
