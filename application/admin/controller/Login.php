<?php

namespace app\admin\controller;

use think\Controller;

class Login extends Controller
{
	public function login()
	{
		if(request()->isPost()){
			$res = model('User')->login(input('post.'));
			if($res['valid'])
			{
				// 成功
				$this->success($res['msg'], 'admin/index/index');
			}else{
				// 失败
				$this->error($res['msg']);
			}
		}
		// captcha_src();
		return $this->fetch();
	}
}
