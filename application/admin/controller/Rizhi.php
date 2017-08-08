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
            dump(input('post.'));
        }
    }
}
