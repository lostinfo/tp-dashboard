<?php


namespace app\admin\controller;


use app\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        $request = $this->request;
        return json([
            'code' => 200,
            'msg'  => '',
            'data' => \app\Model\Admin::where(function ($query) use ($request) {
                if ($username = $request->get('username')) {
                    $query->where(['username' => $username]);
                }
            })->order($this->order_by_column, $this->order_by_direction)->paginate($this->page_size)->toArray(),
        ]);
    }

    public function store()
    {
//        todo validate
        $validated = [
            'username' => $this->request->post('username'),
        ];
        if ($id = $this->request->get('id')) {
            $admin = \app\Model\Admin::findOrFail($id);
        } else {
            $admin           = new \app\Model\Admin();
            $admin->username = $validated['username'];
        }
        if ($password = $this->request->post('password')) {
            $admin->password = password_hash($password, PASSWORD_BCRYPT);
        }
        $admin->save();
        return json([
            'code' => 200,
            'msg'  => '',
            'data' => [],
        ]);
    }

    public function info($id)
    {
        $admin = \app\Model\Admin::findOrFail($id);
        return json([
            'code' => 200,
            'msg'  => '',
            'data' => $admin->toArray(),
        ]);
    }

    public function destory($id)
    {
        return json([
            'code' => 422,
            'msg'  => '不可删除',
            'data' => [],
        ]);
    }
}
