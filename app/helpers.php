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

function getIp($type = 0)
{
    $type = $type ? 1 : 0;
    static $ip = NULL;
    if ($ip !== NULL) return $ip[$type];
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
    // IP地址合法验证
    $long = sprintf("%u", ip2long($ip));
    $ip = $long ? array($ip, $long) : array('0.0.0.0', 0);
    return $ip[$type];
}
/*日志记录*/
function actionLog($msg=''){
    $info = json_decode(session('info'),true);
    $adminlog = new \App\Model\AdminLog();
    $data = [
        'act_name' => $msg,
        'act_ip' => getIp(),
        'ad_name' => $info['ad_name'],
        'ad_id' => $info['ad_id'],
        'create_time' => time(),
    ];
    $adminlog->CreateLog($data);

}

