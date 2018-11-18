<?php
/**
 * Created by PhpStorm.
 * User: 15633
 * Date: 2018/6/23
 * Time: 0:32
 */
namespace app\admin\controller;

use think\Controller;

class Flink extends Controller
{
    public function index()
    {
        return view("flink_index");
    }

    public function add()
    {
        return view("flink_add");
    }

    public function update()
    {
        return view("flink_update");
    }
}