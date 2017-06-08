<?php

namespace app\Admin\controller;

class File extends Common
{
    public function index()
    {
        $file = (new \app\common\model\File())->select();
        $this->assign('file', $file);
        return $this->fetch();
    }
    public function upload()
    {
        $res = (new \app\common\model\File())->store('editormd-image-file');
        if($res['valid'])
        {
            echo json_encode(['success'=>1, 'message'=>$res['msg'], 'url'=>$res['path']]);
        }else{
            echo json_encode(['success'=>0, 'message'=>$res['msg']]);
        }
    }
}