<?php
/**
 * Created by PhpStorm.
 * User: 15633
 * Date: 2018/6/23
 * Time: 0:22
 */
namespace app\admin\controller;

use think\Controller;

class Category extends Controller
{
    public function index()
    {
        return view("category_index");
    }

    public function add()
    {
        return view("category_add");
    }

    public function update()
    {
        return view("category_update");
    }
}