<?php

namespace app\admin\controller;

class Index extends Common
{
	// 后台首页
	public function index()
	{
        dump($_ENV);
		// 加载模板
        $art = model('Article')->order('pid','desc')->limit(10)->select();
        $this->assign('art', $art);
        $user = model('User')->order('id','desc')->limit(10)->select();
        $this->assign('user', $user);
		return $this->fetch();
	}
	// 修改密码
	public function pass()
	{
		if(request()->isPost())
		{
			$res = model('User')->pass(input('post.'));
			if($res['valid'])
            {
                // 成功
                // session(null);
                $this->success($res['msg'], 'admin/index/index');
            }else{
			    // 失败
                $this->error($res['msg']);
            }
		}
		return $this->fetch();
	}
}
