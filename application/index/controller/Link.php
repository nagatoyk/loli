<?php

namespace app\index\controller;

class Link extends Common
{
    public function index()
    {
        $data = model('Link')->order('id','asc')->select();
        $this->assign('data', $data);
        return $this->fetch();
    }
}
