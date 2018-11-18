<?php
/**
 * Created by PhpStorm.
 * User: 15633
 * Date: 2018/6/23
 * Time: 0:26
 */
namespace app\admin\controller;

use think\Controller;
use app\admin\model\User as Umodel;
use app\admin\service\Auth as AUservice;
use think\Db;



class User extends Controller
{
    public function __construct(\think\Request $request)
    {
        parent::__construct();
        $this->post         = $request->post();
        $this->get          = $request->get();
        $this->currTime     = date("Y-m-d H:i:s");
        $this->currDate     = date("Y-m-d");
        $this->Umodel       = new Umodel();
    }
    public function index()
    {
        $resulr = Db::table("user")->select();
        return view("user_index",["u_list"=>json_encode($resulr)]);
    }

    public function add()
    {
        if($this->post){
            $arr = $this->post;
            $data =[];
            $data["createtime"] = $this->currTime;
            $data["name"] = $arr["name"];
            $data["username"] = $arr["username"];
            $data["password"] = $arr["password"];
            $data["tel"] = $arr["tel"];
            $data["email"] = $arr["email"];
            $data["status"] = 0;
            $data["logintime"] = $this->currTime;
            $data["loginip"] = $this->get_client_ip();
            $result = AUservice::insert($this->Umodel,$data,"");
            echo $result;
        }else{
            $result = Db::table("user")->field("id,username,name,createtime")->select();
            return view("user_add",["data"=>json_encode($result)]);

        }
    }

    public function update()
    {
        if($this->post){
            $arr = $this->post;
            $data =[];
            $data["createtime"] = $this->currTime;
            $data["name"] = $arr["name"];
            $data["username"] = $arr["username"];
            $data["password"] = $arr["password"];
            $data["tel"] = $arr["tel"];
            $data["email"] = $arr["email"];
            $data["status"] = 0;
            $data["logintime"] = $this->currTime;
            $data["loginip"] = $this->get_client_ip();
            $result = AUservice::insert($this->Umodel,$data,"");
            echo $result;
        }else{
            $result = Db::table("user")->field("id,username,name,createtime")->select();
            return view("user_update",["data"=>json_encode($result)]);
        }
    }

    /**
     * 获取客户端IP地址
     * @param integer $type 返回类型 0 返回IP地址 1 返回IPV4地址数字
     * @param boolean $adv 是否进行高级模式获取（有可能被伪装）
     * @return mixed
     */
    function get_client_ip($type = 0,$adv=false)
    {
        $type = $type ? 1 : 0;
        static $ip = NULL;
        if ($ip !== NULL) return $ip[$type];
        if ($adv) {//高级模式获取(防止伪装)
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
                $pos = array_search('unknown', $arr);
                if (false !== $pos) unset($arr[$pos]);
                $ip = trim($arr[0]);
            } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            } elseif (isset($_SERVER['REMOTE_ADDR'])) {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        // IP地址合法验证
        $long = sprintf("%u", ip2long($ip));
        $ip = $long ? array($ip, $long) : array('0.0.0.0', 0);
        return $ip[$type];
    }
}