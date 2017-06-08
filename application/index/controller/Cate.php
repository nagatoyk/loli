<?php

namespace app\Index\controller;

class Cate extends Common
{
    public function index()
    {
        $data = model('Article')
            ->where('category',input('param.cate','nichijou'))
            ->order('created','desc')
            ->paginate(8, false, ['page'=>input('param.page',1,'intval')]);
        $this->assign('data', $data);
        if($data->currentPage() < $data->lastPage())
        {
            $more = '<a href="'.url('index/cate/index', 'cate='.input('param.cate','nichijou').'&page='.($data->currentPage()+1)).'"> - 查看 '.date('Y-m-d H:i:s', $data[$data->listRows()-1]['created']).' 前的文章 - </a>';
        }else{
            $more = '<a href="'.url('/').'"> - 查看最新文章 - </a>';
        }
        $this->assign('more', $more);
        return $this->fetch('/index/index');
    }
}
