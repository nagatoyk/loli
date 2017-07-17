<?php

namespace app\common\model;

use think\Model;
use think\Loader;
use think\Validate;

class User extends Model
{
	// 主键
	protected $pk = 'id';
	// 完整表名称
	protected $table = 'imouto_user';
	// 登录
	public function login($data)
	{
		// 验证
		$validate = Loader::validate('User');
		// 失败
		if(!$validate->check($data))
		{
			return ['valid'=>0,'msg'=>$validate->getError()];
		}
		// 比对
		$info = $this->where('username', $data['username'])->where('password', md5(strtolower($data['password'])))->find();
		if(!$info)
		{
			// 失败
			return ['valid'=>0,'msg'=>'用户名或密码不正确'];
		}
		session('admin.user_id', $info['id']);
		session('admin.nickname', $info['nickname']);
		return ['valid'=>1,'msg'=>'登录成功'];
	}

    /**
     * 修改密码
     * @param $data post数据
     */
	public function pass($data)
	{
	    $validate = new Validate([
	        'admin_password'=>'require',
            'new_password'=>'require',
            'confirm_password'=>'require|confirm:new_password'
        ], [
            'admin_password.require'=>'原密码不能为空',
            'new_password.require'=>'新密码不能为空',
            'confirm_password.require'=>'确认密码不能为空',
            'confirm_password.confirm'=>'两次密码不一致'
        ]);
	    if(!$validate->check($data)){
	        return ['valid'=>0, 'msg'=>$validate->getError()];
        }
        $info = $this->where('id',session('admin.user_id'))->where('password',md5(strtolower($data['admin_password'])))->find();
        if(!$info)
        {
            return ['valid'=>0, 'msg'=>'原始密码不正确'];
        }
        $res = $this->save([
            'password'=>md5(strtolower($data['confirm_password']))
        ], [$this->pk=>session('admin.user_id')]);
        if($res != false)
        {
            return ['valid'=>1, 'msg'=>'修改成功'];
        }else{
            return ['valid'=>0, 'msg'=>$this->getError()];
        }
    }
}
