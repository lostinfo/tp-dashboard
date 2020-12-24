<?php


namespace app\admin\controller;


use app\BaseController;
use think\facade\View;

class Article extends BaseController
{
    public function index()
    {
        $request = $this->request;
        return json([
            'code' => 200,
            'msg'  => '',
            'data' => \app\Model\Article::where(function ($query) use ($request) {
                if ($title = $request->get('title')) {
                    $query->where('title', 'like', "%{$title}%");
                }
                if ($create_time = $request->get('create_time')) {
                    $query->whereBetween('create_time', is_array($create_time) ? $create_time : explode(',', $create_time));
                }
            })->field(['id', 'title', 'create_time'])
                ->order($this->order_by_column, $this->order_by_direction)->paginate($this->page_size)->toArray(),
        ]);
    }

    public function store()
    {
//        todo validate
        $validated = [
            'title'    => $this->request->post('title'),
            'markdown' => $this->request->post('markdown'),
            'content'  => $this->request->post('content'),
        ];
        if ($id = $this->request->get('id')) {
            $article = \app\Model\Article::findOrFail($id);
        } else {
            $article = new \app\Model\Article();
        }
        $article->title    = $validated['title'];
        $article->markdown = $validated['markdown'];
        $article->content  = $validated['content'];
        $article->save();
        return json([
            'code' => 200,
            'msg'  => '',
            'data' => [],
        ]);
    }

    public function info($id)
    {
        $article = \app\Model\Article::findOrFail($id);
        return json([
            'code' => 200,
            'msg'  => '',
            'data' => $article->toArray(),
        ]);
    }

    public function destory($id)
    {
        $article = \app\Model\Article::findOrFail($id);
        $article->delete();
        return json([
            'code' => 200,
            'msg'  => '',
            'data' => [],
        ]);
    }

    public function view($id)
    {
        $article = \app\Model\Article::findOrFail($id);
        return View::fetch('article', [
            'title'       => $article->title,
            'content'     => $article->content,
            'create_time' => $article->create_time,
        ]);
    }
}
