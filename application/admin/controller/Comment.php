<?php
/**
 * Created by PhpStorm.
 * User: 15633
 * Date: 2018/6/23
 * Time: 0:24
 */
namespace app\admin\controller;

use think\Controller;

class Comment extends Controller
{
    public function index()
    {
        return view("comment_index");
    }

    public function add()
    {
        return view("comment_add");
    }

    public function update()
    {
        return view("comment_update");
    }
}