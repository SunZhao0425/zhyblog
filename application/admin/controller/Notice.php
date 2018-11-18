<?php
/**
 * Created by PhpStorm.
 * User: 15633
 * Date: 2018/6/23
 * Time: 0:19
 */
namespace app\admin\controller;

use think\Controller;

class Notice extends Controller
{
    public function index()
    {

        return $this->fetch('index');
    }


}