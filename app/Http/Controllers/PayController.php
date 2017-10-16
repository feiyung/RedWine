<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/11
 * Time: 13:44
 */

namespace App\Http\Controllers;


use App\Model\WineOrder;
use Illuminate\Support\Facades\Session;

class PayController extends  Controller
{
   const ALIPAY_INTERNATION = [
    'partner' => '2088421921862366',  //合作身份者ID，签约账号，以2088开头由16位纯数字组成的字符串
    'key' => 'ie8ylvb9syxmjtyn6dgll3ismqn7pxu4', //MD5密钥，安全检验码，由数字和字母组成的32位字符串
    'notify_url' => "http://redwine.zhangdashu.com/admin/notify", //回调路径
    'return_url' => "http://redwine.zhangdashu.com/admin/orderlist", //返回路径
    'transport' => 'http',//访问模式,根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http
    'service' => "create_forex_trade"// 产品类型，无需修改
    ];

    public function Alipay($out_trade_no, $subject, $total_fee, $body="重庆玛丝特国际贸易"){
        header('Content-type:text/html;charset=utf-8');
        $Alipay = new \Alipay_interface($alipay_config = self::ALIPAY_INTERNATION);
        $html = $Alipay->alipay($out_trade_no, $subject, $total_fee, $body);
        echo $html;

    }

    public function notify(){
        $AlipayNotify = new \Alipay_interface($alipay_config = self::ALIPAY_INTERNATION);
        $wineOrder = new WineOrder();
        /*$result = $AlipayNotify->pay_notify();
        if($result){*/
            $res = $wineOrder->getorder($_POST['out_trade_no']);
            if($res['order_status']==$wineOrder::ORDER_STATE_NO){
                $wineOrder->updateOrder($_POST['out_trade_no']);
            }

        /*}else{
            echo "<script>
                 alert('支付失败');location.href='/admin/orderlist';
              </script>";
        }*/
    }
}