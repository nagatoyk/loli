<?php

namespace app\common\model;

use think\Model;

class Link extends Model
{
    protected $pk = 'id';
    protected $table = 'imouto_link';
    public function getAll($size = null)
    {
        return $size ? $this->order('id','desc')->paginate($size) : $this->order('id','desc')->select();
    }
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
