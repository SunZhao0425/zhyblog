<?php
/**
 * User: lidegang
 * Date: 2018/3/15
 */
namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Session;

class Login extends Controller
{
    public function index()
    {
        $this->view->engine->layout(false);
        return  view("index");
    }

    public function dologin(){
        $data = $_POST;
        if($data["username"] == "" || $data["userpwd"] == ""){
            return $this->error("登录失败  用户名/密码不能为空","Login/index","",0);
        }
        $result = Db::table("user")
            ->where("username",$_POST["username"])
            ->find();
        if(empty($result)) {
            return $this->error("登录失败  系统没有".  $data["username"]."用户", "Login/index", "", 0);
        }
        if($result["password"] == $data["userpwd"]){
            Session::set("id",$result["id"]);
            Session::set("username",$result["username"]);
            return $this->success("登录成功",'Index/index',"",0);
        }else{
            return $this->error("登录失败  用户密码不正确","Login/index","",0);
        }
    }

    public function outlogin()
    {
        Session::set("id","");
        Session::set("username","");
        return $this->success("退出登录成功","Login/index");
    }
}
