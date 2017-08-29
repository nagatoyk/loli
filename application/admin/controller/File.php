<?php

namespace app\admin\controller;

class File extends Common
{
    protected $db;
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        $this->db = new \app\common\model\File();
    }
    public function index()
    {
        $file = $this->db->getAll(15);
        $this->assign('file', $file);
        return $this->fetch();
    }
    public function upload()
    {
        $res = $this->db->store('editormd-image-file');
        if($res['valid'])
        {
            return json_encode(['success'=>1, 'message'=>$res['msg'], 'url'=>$res['path']]);
        }else{
            return json_encode(['success'=>0, 'message'=>$res['msg']]);
        }
    }
    public function del(){
        if(request()->isPost() && input('post.path'))
        {
            file_exists(ROOT_PATH.'public'.input('post.path')) && unlink(ROOT_PATH.'public'.input('post.path'));
            $this->success('删除成功!', 'index');
        }elseif(request()->isPost() && input('post.id'))
        {
            $res = $this->db->destray(input('post.id'));
            if ($res) {
                $this->success($res['msg'], 'index');
            } else {
                $this->error($res['msg']);
            }
        }
    }
}
