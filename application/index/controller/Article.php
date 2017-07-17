<?php

namespace app\Index\controller;

use Michelf\Markdown;

class Article extends Common
{
    public function index()
    {
        $pid = input('param.pid',1,'intval');
        $db = model('Article');
        $post = $db->where('pid', $pid)->find();
        $this->assign('post', $post);
        return $this->fetch();
    }
}
