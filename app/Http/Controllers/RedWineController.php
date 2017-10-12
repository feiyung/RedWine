<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/10
 * Time: 11:48
 */

namespace App\Http\Controllers;


use App\Model\RedWine;
use App\Model\WineOrder;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class RedWineController extends Controller
{
    /*
     * 红酒列表
     */
    public function wineList()
    {
        $redWine = new RedWine();

        $alllist = $redWine->getAlllist();
        return view('redWine.winelist', compact('alllist'));
    }

    /*添加红酒*/

    public function addWine()
    {
        $redWine = new RedWine();
        $input = Input::all();
        $data['wine_name'] = $input['wine_name'];
        $data['price'] = $input['price'];
        $data['sku_num'] = $input['sku_num'];
        $data['description'] = $input['desc'];
        $data['create_time'] = time();
        $data['update_time'] = $data['create_time'];
        $data['status'] = $redWine::STATE_NORMAL;
//        dd($data);
        $result = $redWine->addWine($data);
        if ($result) {
            trueAjax('添加用户成功！');
        } else {
            falseAjax('添加用户失败');
        }
    }

    /*
     * 获取单条信息
     */
    public function getOneInfo()
    {
        $input = Input::all();
        $redWine = new RedWine();
        $result = $redWine->getOne($input['id']);
        trueAjax('', $result);
    }

    /*
     * 编辑红酒信息
     */
    public function editWine()
    {
        $input = Input::all();
        $data['wine_name'] = $input['wine_name'];
        $data['price'] = $input['price'];
        $data['sku_num'] = $input['sku_num'];
        $data['description'] = $input['desc'];
        $data['update_time'] = time();
        $redWine = new RedWine();
        $result = $redWine->updateWine($input['id'], $data);
        if ($result) {
            trueAjax('修改成功！');
        } else {
            falseAjax('修改失败');
        }
    }

    /*
     * 订单列表
     */
    public function orderList()
    {
        $wineOrder = new WineOrder();
        $alllist = $wineOrder->getOrderList();
        return view('redWine.wineorderlist', compact('alllist'));
    }

    /*
     * 创建订单
     */
    public function createOrder()
    {
        $wineOrder = new WineOrder();
        $redWine = new RedWine();
        $info = json_decode(session('info'), true);
        $input = Input::all();
        $res = $redWine->getOne($input['id']);
        if ($res->sku_num < $input['wine_num']) {
            falseAjax('库存不足！');
        }
        $data['wine_name'] = $input['wine_name'];
        $data['price'] = $input['price'];
        $data['wine_num'] = $input['wine_num'];
        $data['buy_name'] = $input['buy_name'];
        $data['buy_tel'] = $input['buy_tel'];
        $data['wine_id'] = $input['id'];
        $data['total_price'] = $data['price'] * $data['wine_num'];
        $data['create_time'] = time();
        $data['update_time'] = $data['create_time'];
        do {//确保订单号唯一
            $data['order_num'] = date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
            $con = $wineOrder->getOrderCount($data['order_num']);
        } while ($con > 0);
        $data['ad_id'] = $info['ad_id'];
        $data['ad_name'] = $info['ad_name'];
        $result = $wineOrder->addWineOrder($data);
        /*库存销量更新*/
        $update['sales_num'] = $res->sales_num + $input['wine_num'];
        $update['sku_num'] = $res->sku_num - $input['wine_num'];
        if ($result) {
            $redWine->updateWine($input['id'], $update);
            trueAjax('创建订单成功！');
        } else {
            falseAjax('创建订单失败！');
        }


    }

    /*去支付*/

    public function pay($id)
    {
        $paycontroller = new PayController();
        $wineOrder = new WineOrder();
        $input = Input::all();
        $res = $wineOrder->getOneorder($id);
        $out_trade_no = $res['order_num'];
        $subject = $res['wine_name'] . '×' . $res['wine_num'] . '瓶';
        $total_fee = 0.1;/*$res['total_price'];*/
        $body = '姓名：' . $res['buy_name'] . '时间:' . $res['create_time'] . '金额:' . $res['total_price'];
        //dd($body);
        $paycontroller->Alipay($out_trade_no, $subject, $total_fee, $body);
    }

    /*订单线详情*/
    public function detail()
    {
        $wineOrder = new WineOrder();
        $input = Input::all();
        $res = $wineOrder->getOneorder($input['id']);
        $res->create_time = date('Y-m-d H:i', $res->create_time);
        if ($res->order_status == 0) {
            $res->order_status = '未付款';
        } elseif ($res->order_status == 1) {
            $res->order_status = '已付款';
        }
        trueAjax('', $res);
    }


}