<?php
/**
 * Created by PhpStorm.
 * User: 15633
 * Date: 2018/10/21
 * Time: 20:39
 */
namespace app\admin\service;

use think\service;
class result{
    static public function index($code,$res=""){
        if($code == 200){
            $result = [
                "Status" => 1,
                "Code" => $code,
                "Message" => "Success",
                "resArr" => $res
            ];
        }elseif($code == 500){
            $result = [
                "Status"=>0,
                "Code"=>$code,
                "Message"=> "Error",
                "resArr"=>$res
            ];
        }elseif($code == 600){
            $result = [
                "Status"=>2,
                "Code"=>$code,
                "Message"=>"Already exists"
            ];
        }

        return $result;
    }
}