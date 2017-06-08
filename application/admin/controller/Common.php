<?php

namespace app\Admin\controller;

use think\Controller;
use think\Request;

class Common extends Controller
{
	public function __construct(Request $request = null)
	{
		parent::__construct($request);
		// 登录验证
		if(!session('admin.user_id'))
		{
			$this->redirect('admin/login/login');
		}
	}
}
