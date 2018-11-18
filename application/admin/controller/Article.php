<?php
/**
 * Created by PhpStorm.
 * User: 15633
 * Date: 2018/6/3
 * Time: 15:42
 */
namespace app\admin\controller;

use think\Controller;

class Article extends Controller
{
    public function index()
    {
        return view("article_index");
    }

    public function add()
    {
        return view("article_add");
    }

    public function update()
    {
        return view("article_update");
    }
}