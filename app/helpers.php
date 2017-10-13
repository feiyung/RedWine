<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/30
 * Time: 14:12
 */
function trueAjax($msg,$data=[]){
    header('Content-Type:application/json; charset=utf-8');
    $info = [
        'msg' => $msg,
        'data' => $data,
        'flag' => 1
    ];
    exit(json_encode($info));
}
function falseAjax($msg,$data=[]){
    $info = [
        'msg' => $msg,
        'data' => $data,
        'flag' => 0
    ];
    exit(json_encode($info));
}

