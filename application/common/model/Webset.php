<?php

namespace app\common\model;

use think\Model;

class Webset extends Model
{
    protected $pk = 'webset_id';
    protected $table = 'imouto_webset';
    public function edit($data)
    {
        $res = $this->validate([
            'webset_value'=>'require'
        ], [
            'webset_value.require'=>'配置项不能为空'
        ])->save($data, [$this->pk=>$data['webset_id']]);
        if($res !== false)
        {
            return ['valid'=>1, 'msg'=>'操作成功'];
        }else{
            return ['valid'=>0, 'msg'=>$this->getError()];
        }
    }
}
