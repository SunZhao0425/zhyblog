<?php
/**
 * Created by PhpStorm.
 * User: 15633
 * Date: 2018/10/21
 * Time: 19:08
 */

namespace app\admin\service;

use think\service;
use think\Db;


class Auth{

    static function insert($model,$data,$check =""){

        if(empty($model)|| empty($data)){
            return false;
        }
        $che = Auth::check($model,$data,$check);

        if($che){
            return json_encode(result::index(600,$res["key"] = $che));
        }else{
            if($model->save($data)){
                $res["id"]= $model->id;
                return json_encode(result::index(200,$res));
            }else{
                return json_encode(result::index(500,""));
            }
        }

    }

    static function save($model,$data,$check = ""){

    }
    static function delete($model,$data,$check=""){

    }

    static function check($model,$data,$check){

        if(empty($check)){
            return false;
        }
        if(!is_array($check)){
            $check = explode(",",$check);
        }
        foreach($check as $key=>$value){
            if(isset($data["id"])){
                $count =$model->where([
                    $value => ["=",$data[$value]],
                    'id'  =>['<>',$data['id']]
                ])->count();
            }else{
                $count = $model->where([
                    $value => ["=",$data[$value]]
                ])->count();
            }

            if($count){
                $data[$value];
            }
        }
        return false;
    }
}