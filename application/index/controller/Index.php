<?php
namespace app\index\controller;

class Index extends Common
{
    protected $db;

    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        $this->db = new \app\common\model\Article();
    }

    public function index()
    {
        $data = $this->db->getAll(8);
        $this->assign('data', $data);
        if($data->currentPage() < $data->lastPage())
        {
            $more = '<a href="'.url('index/index/index', 'page='.($data->currentPage()+1)).'"> - 查看 '.date('Y-m-d H:i:s', $data[$data->listRows()-1]['created']).' 前的文章 - </a>';
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

    public function search()
    {
        $key = input('post.key');
        $data = $this->db->where('title', 'like', '%'.$key.'%')->whereOr('text', 'like', '%'.$key.'%')->whereOr('category', 'like', '%'.$key.'%')->select();
        if($data){
            $data = array_map(function($o){
                $o['title'] = htmlspecialchars_decode($o['title'], ENT_QUOTES);
                $content = htmlspecialchars_decode($o['text'], ENT_QUOTES);
                $o['text'] = ($i = strpos($content, '<!--more-->')) !== false ? substr($content, 0, $i + 11) : $content;
                $o['text'] = strip_tags($o['text']);
                $o['text'] = mb_substr($o['text'], 0, 100).'…';
                $o['text'] = str_replace(PHP_EOL, ' ', $o['text']);
                unset($o['modified']);
                $o['url'] = url('index/article/index', ['pid'=>$o['pid']]);
                return $o;
            }, $data);
        }
        return json($data);
    }
}
