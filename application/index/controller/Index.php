<?php
namespace app\index\controller;

class Index extends Common
{
    public function index()
    {
        $db = model('Article');
        $data = $db->order('created', 'desc')->paginate(8, false, ['page'=>input('param.page', 1, 'intval')]);
        $db->moreToLink($data->items());
        $this->assign('data', $data);
        if($data->currentPage() < $data->lastPage())
        {
            $more = '<a href="'.url('index/index/index', 'page='.($data->currentPage() + 1)).'"> - 查看 '.date('Y-m-d H:i:s', $data[$data->listRows() - 1]['created']).' 前的文章 - </a>';
        }else{
            $more = '<a href="'.url('/').'"> - 查看最新文章 - </a>';
        }
        $this->assign('more', $more);
        return $this->fetch();
    }
    public function live()
    {
        return $this->fetch();
    }
}
