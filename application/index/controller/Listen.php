<?php

namespace app\index\controller;

use Metowolf\Meting;
use think\Controller;
use think\Response;

class Listen extends Controller
{
    public function index()
    {
        return $this->fetch();
    }
    public function get()
    {
        $fm = new Meting('netease');
        $reslut = [];
        if(input('param.list', 0, 'intval') != 0 || input('param.id', 0, 'intval') != 0)
        {
            $reslut = $fm->format(true)->playlist(input('param.list', 0) ? : input('param.id', 0));
        }
        if(input('param.song', 0, 'intval') != 0)
        {
            $reslut = $fm->format(true)->url(input('param.song', 0));
        }
        if(input('param.pic', 0, 'is_numeric') != 0)
        {
            $pic = $fm->format(true)->pic(input('param.pic', 0));
            $this->redirect(json_decode($pic, true)['url']);
            exit();
        }
        if(input('param.lrc', 0, 'intval') != 0)
        {
            $reslut = $fm->format(true)->lyric(input('param.lrc', 0));
        }
        return Response::create(json_decode($reslut, true),'json');
    }
    public function test()
    {
        $fm = new Meting();
        $data = $fm->format(true)->song('35847388');
        $j = json_decode($data, true);
        echo $j[0]['pic_id'];
        echo '<pre>';
        print_r($fm->format(true)->pic(3.3886948375069E+15));
    }
}
