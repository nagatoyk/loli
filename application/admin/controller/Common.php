<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Common extends Controller
{
	public function __construct(Request $request = null)
	{
		parent::__construct($request);
		dump($_ENV);
		// 登录验证
		if(!session('admin.user_id'))
		{
			$this->redirect('admin/login/login');
		}
	}
}
