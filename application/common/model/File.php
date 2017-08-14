<?php

namespace app\common\model;

use think\Model;

class File extends Model
{
    protected $pk = 'id';
    protected $table = 'imouto_core_attachment';
    public function store($field)
    {
        $file = request()->file($field);
        if($file)
        {
            $info = $file->move(ROOT_PATH.'public/attachment');
            if($info)
            {
                $path = '/attachment/' . $info->getSaveName();
                $data = [
                    'name' => $info->getInfo('name'),
                    'filename' => $info->getFilename(),
                    'path' => $path,
                    'extension' => $info->getExtension(),
                    'size' => $info->getSize(),
                    'hash' => $info->hash()
                ];
                $data['data'] = serialize($data);
                $result = $this->save($data);
                if($result !== false)
                {
                    return ['valid'=>1, 'msg'=>'添加成功', 'path'=>$path];
                }else{
                    return ['valid'=>0, 'msg'=>$file->getError()];
                }
            }
        }else{
            return ['valid'=>0,'msg'=>'没有文件上传'];
        }
    }
    public function destray($id)
    {
        $info = $this->where('id', $id)->find();
        dump(file_exists($info->path));
        die();
        file_exists($info->path) && unlink($info->path);
    }
}
