<?php


namespace app\admin\controller;


use app\BaseController;
use think\facade\Filesystem;

class File extends BaseController
{
    public function uploadImage($dir)
    {
        // todo validate file is image
        $file     = $this->request->file('file');
        $savename = Filesystem::disk('public')->putFile($dir, $file);

        $path = '/storage/' . $savename;
        return json([
            'code' => 200,
            'msg'  => '',
            'data' => [
                'url'          => $path,
//                 todo 生成带域名的绝对路径
                'absolute_url' => config('app.app_host') . $path,
            ],
        ]);
    }
}
