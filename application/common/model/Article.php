<?php

namespace app\common\model;

use think\Model;

class Article extends Model
{
	// 主键
	protected $pk = 'pid';
	// 完整表名称
	protected $table = 'imouto_article';
	// 自动完成
    protected $auto = ['authorId'];
    protected $insert = ['created'];
    protected $update = ['modified'];
    // 文章作者id
    protected function setAuthorIdAttr($value)
    {
        return session('admin.user_id');
    }
    // 文章发表时间
    protected function setCreatedAttr($val)
    {
        return time();
    }
    // 文章修改时间
    protected function setModifiedAttr($val)
    {
        return time();
    }
    // 首页列表
    public function getAll($size)
    {
        return $this->order('created', 'desc')->paginate($size);
    }
    // 文章内容切割分页链接替换
    public function moreToLink($obj)
    {
        foreach($obj as $k=>$v)
        {
            $obj[$k]['text'] = ($i = strpos($v['text'], '<!--more-->')) !== false ? substr($v['text'], 0, $i + 11) . '<p class="more"><a href="' . url('index/article/index', 'pid=' . $v['pid']) . '">- 查看更多 -</a></p>' : $v['text'];
        }
        return $obj;
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
        $res = $this->validate(true)->save($data, [$this->pk=>$data['pid']]);
        if($res !== false)
        {
            return ['valid'=>1, 'msg'=>'修改成功'];
        }else{
            return ['valid'=>0, 'msg'=>$this->getError()];
        }
    }
    // 删除
    public function destray($pid)
    {
        $post = $this->where('pid', $pid)->find();
        if(!$post)
        {
            return ['valid'=>0, 'msg'=>$this->getError()];
        }
        $res = $this->where('pid', $pid)->delete();
        if($res)
        {
            return ['valid'=>1, 'msg'=>'删除成功'];
        }
    }
    // 分类关联
    public function cate()
    {
        return $this->hasOne('Category','icon','category');
    }
    // 作者关联
    public function user()
    {
        return $this->hasOne('User','id','authorId');
    }
}
