<?php


namespace app\admin\controller;


use app\BaseController;

class User extends BaseController
{
    public function index()
    {
        $request = $this->request;
        return json([
            'code' => 200,
            'msg'  => '',
            'data' => \app\Model\User::where(function ($query) use ($request) {
                if ($name = $request->get('name')) {
                    $query->where('name', 'like', "%{$name}%");
                }
                if ($email = $request->get('email')) {
                    $query->where(['email' => $email]);
                }
                if ($phone = $request->get('phone')) {
                    $query->where(['phone' => $phone]);
                }
                if ($age = $request->get('age')) {
                    $query->where(['age' => $age]);
                }
                if ($create_time = $request->get('create_time')) {
                    $query->whereBetween('create_time', is_array($create_time) ? $create_time : explode(',', $create_time));
                }
            })->order($this->order_by_column, $this->order_by_direction)->paginate($this->page_size)->toArray(),
        ]);
    }

    public function info($id)
    {
        $user = \app\Model\User::findOrFail($id);
        return json([
            'code' => 200,
            'msg'  => '',
            'data' => $user->toArray(),
        ]);
    }
}
