<?php

namespace app\common\model;

use think\Model;

class Category extends Model
{
	// 主键
	protected $pk = 'id';
	// 完整表名称
	protected $table = 'imouto_category';
	// 自动完成
    protected $auto = ['des'];
    // 设置文章描述
    protected function setDesAttr($val)
    {
        return $val ? : NULL;
    }
	// 添加
    public function store($data)
    {
        $res = $this->validate(true)->save($data);
        if($res)
        {
            return ['valid'=>1, 'msg'=>'添加成功'];
        }else{
            return ['valid'=>0, 'msg'=>$this->getError()];
        }
    }
	// 编辑
    public function edit($data)
    {
        $res = $this->validate(true)->save($data, [$this->pk=>$data['id']]);
        if($res !== false)
        {
            return ['valid'=>1, 'msg'=>'编辑成功'];
        }else{
            return ['valid'=>0, 'msg'=>$this->getError()];
        }
    }
}
