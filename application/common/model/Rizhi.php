<?php

namespace app\common\model;

use think\Model;

class Rizhi extends Model
{
    //
    protected $pk = 'id';

    protected $table = 'imouto_rizhi';

    protected $insert = ['created'];

    protected function setCreatedAttr($value)
    {
        return time();
    }

    public function getAll($size)
    {
        return $this->order('created','desc')->paginate($size, false, ['page'=>input('param.page',1,'intval')]);
    }

    public function store($data)
    {
        $res = $this->validate(false)->save($data);
        if($res)
        {
            return ['valid'=>1, 'msg'=>'添加成功'];
        }else{
            return ['valid'=>0, 'msg'=>$this->getError()];
        }
    }
}
