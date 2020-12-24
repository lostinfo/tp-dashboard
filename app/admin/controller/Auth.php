<?php


namespace app\admin\controller;


use app\BaseController;
use think\helper\Str;

class Auth extends BaseController
{
    public function login()
    {
        // todo login && jwt token
        return json([
            'code' => 200,
            'msg'  => '',
            'data' => [
                'admin'         => [
                    'id'         => 1,
                    'username'   => 'admin',
                    'created_at' => '2020-12-31',
                ],
                // jwt token
                'authorization' => Str::random(30),
            ],
        ]);
    }

    public function check()
    {
        // todo check is login
        $check = true;
        if ($check) {
            return json([
                'code' => 200,
                'msg'  => '',
                'data' => [
                    'status' => true,
                    'admin'  => [
                        'id'         => 1,
                        'username'   => 'admin',
                        'created_at' => '2020-12-31',
                    ],
                ],
            ]);
        }
        return json([
            'code' => 200,
            'msg'  => '',
            'data' => [
                'status' => false,
            ],
        ]);
    }

    public function logout()
    {
        // todo logout
        return json([
            'code' => 200,
            'msg'  => '',
            'data' => [],
        ]);
    }
}
