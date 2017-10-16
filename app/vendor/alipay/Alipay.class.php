<?php

/**
 * Created by PhpStorm.
 * User：PengSongyang
 *
 * Date: 2017/1/6
 * Time: 上午9:44
 */
require_once("lib/alipay_submit.class.php");
require_once("lib/alipay_notify.class.php");

class Alipay_interface
{

    public $config = [];  //配置数组

    /**
     * 构造函数 配置ailipay
     * Alipay_interface constructor.
     */
    public function __construct($alipay_config)
    {
//        $alipay_config = config('common.ALIPAY_INTERNATION');

        $this->config = [
            'partner' => $alipay_config['partner'],
            'key' => $alipay_config['key'],
            'notify_url' => $alipay_config['notify_url'],
            'return_url' => $alipay_config['return_url'],
            'sign_type' => strtoupper('MD5'),//签名方式
            'input_charset' => strtolower('utf-8'),//字符编码格式 目前支持 gbk 或 utf-8
            'cacert' => getcwd() . '\\cacert.pem',//ca证书路径地址，用于curl中ssl校验,在verify_nofity中使用,请保证cacert.pem文件在当前文件夹目录中
            'transport' => $alipay_config['transport'],
            'service' => $alipay_config['service']
        ];
    }

    /**
     * 描述：alipay RMB 支付接口
     * User：PengSongyang
     *
     * @param $out_trade_no 支付单号
     * @param $subject 订单名称
     * @param $total_fee 金额
     * @param string $body 描述
     * @param string $order_series 订单id序列
     * @return 提交表单HTML文本
     */
    public function alipay($out_trade_no, $subject, $total_fee, $body)
    {
        $parameter = [
            "service" => $this->config['service'],
            "partner" => $this->config['partner'],
            "notify_url" => $this->config['notify_url'],
            "return_url" => $this->config['return_url'],

            "out_trade_no" => $out_trade_no,
            "subject" => $subject,
            "rmb_fee" => $total_fee,
            "body" => $body,
            //"order_series" => $order_series,
            "currency" => 'USD',
            "_input_charset" => trim(strtolower($this->config['input_charset']))
        ];

        $alipaySubmit = new AlipaySubmit($this->config);

        $html_text = $alipaySubmit->buildRequestForm($parameter, "get", "确认");

        return $html_text;
    }

    /**
     * 描述：alipay USD 支付接口
     * User：PengSongyang
     *
     * @param $out_trade_no
     * @param $subject
     * @param $total_fee
     * @param $body
     * @param $order_series
     * @param string $currency
     * @return 提交表单HTML文本
     */
    public function alipay_USD($out_trade_no, $subject, $total_fee, $body, $order_series, $currency = 'USD')
    {
        $parameter = [
            "service" => $this->config['service'],
            "partner" => $this->config['partner'],
            "notify_url" => $this->config['notify_url'],
            "return_url" => $this->config['return_url'],

            "out_trade_no" => $out_trade_no,
            "subject" => $subject,

            "total_fee" => $total_fee,

            "body" => $body,
            "order_series" => $order_series,
            "currency" => $currency,
            "_input_charset" => trim(strtolower($this->config['input_charset']))
        ];

        $alipaySubmit = new AlipaySubmit($this->config);

        $html_text = $alipaySubmit->buildRequestForm($parameter, "get", "确认");

        return $html_text;
    }


    public function notify()
    {
        $alipayNotify = new AlipayNotify($this->config);

        $verify_result = $alipayNotify->verifyNotify();

        if ($verify_result) {//验证成功
            return true;
        } else { //验证成功
            return false;
        }
    }
}