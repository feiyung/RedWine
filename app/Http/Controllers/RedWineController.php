<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/10
 * Time: 11:48
 */

namespace App\Http\Controllers;


use App\Model\AdminLog;
use App\Model\Customer;
use App\Model\OrderOnline;
use App\Model\RedWine;
use App\Model\WineOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Excel;

class RedWineController extends Controller
{
    /*
     * 红酒列表
     */
    public function wineList()
    {
        $redWine = new RedWine();
        $customer = new Customer();

        $alllist = $redWine->getAlllist();
        $customerlist = $customer->getCustomerList();
        return view('redWine.winelist', compact('alllist','customerlist'));
    }

    /*添加红酒*/

    public function addWine()
    {
        $redWine = new RedWine();
        $input = Input::all();
        $data = [
            'price'=>$input['price_in'],
            'price_c'=>$input['price_c'],
            'price_line'=>$input['price_line']
        ];
        $data['wine_name'] = $input['wine_name'];
        $data['sku_num'] = $input['sku_num'];
        $data['description'] = $input['desc'];
        $data['create_time'] = time();
        $data['update_time'] = $data['create_time'];
        $data['status'] = $redWine::STATE_NORMAL;
//        dd($data);
        $result = $redWine->addWine($data);
        if ($result) {
            actionLog('添加红酒成功！编号：'.$result.'，红酒名：'.$data['wine_name'].'，库存：'.$data['sku_num']);
            trueAjax('添加红酒成功！');
        } else {
            falseAjax('添加红酒失败');
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
        $data = [
            'price'=>$input['price_in'],
            'price_c'=>$input['price_c'],
            'price_line'=>$input['price_line'],
            'sales_num'=>$input['sales_num']
        ];
        $data['wine_name'] = $input['wine_name'];
        $data['sku_num'] = $input['sku_num'];
        $data['description'] = $input['desc'];
        $data['update_time'] = time();
        $redWine = new RedWine();
        $result = $redWine->updateWine($input['id'], $data);
        if ($result) {
            actionLog('编辑红酒成功！编号：'.$input['id'].'，红酒名：'.$data['wine_name'].'，单价：'.$data['price'].'元，库存：'.$data['sku_num']);
            trueAjax('修改成功！');
        } else {
            falseAjax('修改失败');
        }

    }

    /*
     * 订单列表线下
     */
    public function orderList()
    {
        $wineOrder = new WineOrder();
        $alllist = $wineOrder->getOrderList();
        return view('redWine.wineorderlist', compact('alllist'));
    }

    /*分时段查看*/
    public function scan(Request $request){
        $today_start = '';
        $today_end = '';
        /*if ($request->time==="today"){//今天
            $today_start=mktime(0,0,0,date('m'),date('d'),date('Y'));
            $today_end=mktime(23, 59, 59,date('m'),date('d'),date('Y'));
        }elseif($request->time==="month"){//本月
            $today_start=mktime(0,0,0,date('m'),1,date('Y'));
            $today_end=mktime(23,59,59,date('m'),date('t'),date('Y'));
        }elseif($request->time==="year"){//本年
            $today_start=mktime(0,0,0,1,1,date('Y'));
            $today_end=mktime(23,59,59,date('m'),date('t'),date('Y'));
        }else*/

            if ($request->time==="range"){//自定义范围
                if(empty($request->timerange) && empty($request->page)){
                        $today_start = 0;
                        $today_end = time();
                    }elseif(isset($request->page)&&!empty($request->page)){
                        $today_start = Session::get('today_start');
                        $today_end = Session::get('today_end');
                        if(empty($today_start) || empty($today_end)){
                            echo "<script>alert('请重新选择时间！');location.href='/admin/orderlist';</script>";
                            exit();
                        }
                }else{
                        $time = explode(' - ',$request->timerange);
                        $today_start =  strtotime($time[0]);
                        $today_end =  mktime(23, 59, 59,date('m',strtotime($time[1])),date('d',strtotime($time[1])),date('Y',strtotime($time[1])));
                    }
                session(['today_start'=>$today_start]);
                Session::save();
                session(['today_end'=>$today_end]);
                Session::save();/*dd(session('today_end'));*/


        }
        $order = new WineOrder();
        $alllist = $order->getListpage($today_start,$today_end);
        return view('redWine.wineorderlist', compact('alllist'));

    }

    /*
     * 创建订单
     */
    public function createOrder()
    {
        $wineOrder = new WineOrder();
        $redWine = new RedWine();
        $customer = new Customer();
        $info = json_decode(session('info'), true);
        $input = Input::all();
        $res = $redWine->getOne($input['id']);
        $sku_now = $res->sku_num - $res->sales;
        if ($sku_now < $input['wine_num']) {
            falseAjax('库存不足！');
        }
        $cus_info = $customer->getOneInfo(['id'=>$input['cus_id']]);

        $data['buy_addr'] = $cus_info['cus_addr'];
        $data['buy_id'] = $input['cus_id'];
        $data['wine_name'] = $input['wine_name'];
        $data['price'] = $input['price'];
        $data['wine_num'] = $input['wine_num'];
        $data['buy_name'] = $input['buy_name'];
        $data['buy_tel'] = $input['buy_tel'];
        $data['wine_id'] = $input['id'];
        $data['total_price'] = $data['price'] * $data['wine_num'];
        $data['debt_price'] = $data['total_price'];
        $data['create_time'] = time();
        $data['update_time'] = $data['create_time'];
        $data['san_num'] = $input['san_num'];
        $data['sendway'] = $input['sendway'];
        do {//确保订单号唯一
            $data['order_num'] = date('Ymd') . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
            $con = $wineOrder->getOrderCount($data['order_num']);
        } while ($con > 0);
        $data['ad_id'] = $info['ad_id'];
        $data['ad_name'] = $info['ad_name'];
        $result = $wineOrder->addWineOrder($data);
        /*库存销量更新*/
        $update['sales_num'] = $res->sales_num + $input['wine_num'];
       /* $update['sku_num'] = $res->sku_num - $input['wine_num'];*/
        if ($result) {
            $redWine->updateWine($input['id'], $update);
            actionLog('创建订单成功,订单号：'.$data['order_num'].'，客户名:'.$data['buy_name'].'，数量：'.$input['wine_num']);
            trueAjax('创建订单成功！');
        } else {
            actionLog('创建订单失败');
            falseAjax('创建订单失败！');
        }


    }

    /*支付方式*/
    public function payWay(){
        $wineOrder = new WineOrder();
        $input = Input::all();
        $result =$wineOrder->payWaySave($input['id'],$input);
        $data['pay_way'] = $input['pay_way'];
        $data['id'] = $input['id'];


            trueAjax('更新支付方式成功！',$input);



    }

    /*支付宝支付*/

    public function pay($id)
    {
        $paycontroller = new PayController();
        $wineOrder = new WineOrder();
        $input = Input::all();
        $res = $wineOrder->getOneorder($id);
        $out_trade_no = $res['order_num'];
        $subject = $res['wine_name'] . '×' . $res['wine_num'] . '瓶';
        $total_fee = $res['debt_price'];/*$res['total_price'];*/
        $body = '姓名：' . $res['buy_name'] . '时间:' . $res['create_time'] . '金额:' . $res['total_price'];
        //dd($body);
        $paycontroller->Alipay($out_trade_no, $subject, $total_fee, $body);
    }

    /*线下订单详情*/
    public function detail(Request $request)
    {
        $wineOrder = new WineOrder();
        if($request->isMethod('post')){
                $input = Input::all();
                $res = $wineOrder->getOneorder($input['id']);
                $res->create_time = date('Y-m-d H:i', $res->create_time);
                if ($res->order_status == 0) {
                    $res->order_status = '未付款';
                } elseif ($res->order_status == 1) {
                    $res->order_status = '已付款';
                }elseif ($res->order_status == 2) {
                    $res->order_status = '退货退款';
                }

                if($res->pay_way == 1){
                    $res->pay_way = '支付宝';
                }elseif ($res->pay_way == 2){
                    $res->pay_way = '现金';
                }elseif ($res->pay_way == 3){
                    $res->pay_way = '赊账';
                }elseif ($res->pay_way == 0){
                    $res->pay_way = '未付款';
                }
            trueAjax('', $res);
        }else{

            $res = $wineOrder->getOneorder($request->id);
            $res->create_time = date('Y-m-d H:i', $res->create_time);
            if ($res->order_status == 0) {
                $res->order_status = '未付款';
            } elseif ($res->order_status == 1) {
                $res->order_status = '已付款';
            }elseif ($res->order_status == 2) {
                $res->order_status = '退货退款';
            }

            if($res->pay_way == 1){
                $res->pay_way = '支付宝';
            }elseif ($res->pay_way == 2){
                $res->pay_way = '现金';
            }elseif ($res->pay_way == 3){
                $res->pay_way = '赊账';
            }elseif ($res->pay_way == 0){
                $res->pay_way = '未付款';
            }
            return view('redWine.inventory',compact('res'));
        }

    }

    /*退货退款*/
    public function reject(){
        $wineorder = new WineOrder();
        $redwine = new RedWine();
        $input = Input::all();
        $result = $wineorder->updatesOrder($input['id']);
        $one = $wineorder->getOneorder($input['id']);//订单信息
        $res = $redwine->getOne($one['wine_id']);//红酒信息
        /*$sku = $res['sku_num']+$one['wine_num'];//返回库存*/
        $sales = $res['sales_num']-$one['wine_num'];//减少销量
        $redwine->updateWine($one['wine_id'],['sales_num'=>$sales]);
        if($result){
            actionLog('订单号：'.$one['order_num'].',退货退款成功,'.$one['wine_num'].'瓶'.$one['wine_name'].'返回库存!');
            trueAjax('退货退款成功！');
        }
    }
    /*线上订单导入*/
    public function importExcel(Request $request){


        //$filePath = $request->file('file')->storeAs('uploads','taobao.xls');
        /*Excel::filter('chunk')->load($request->file('file')->getRealPath())->chunk(250000, function($results)
        {
            dd($results);
            foreach($results as $row)
            {
                dd($row);
            }
        });*/
        $orderon = new OrderOnline();
        Excel::load($request->file('file')->getRealPath(), function($reader) use ($orderon) {


            // Getting all results
            $time = time();
            $reader->noHeading();
            $results = $reader->get()->toArray();
            unset($results[0]);
            $datas = [];
            $item = [];
            foreach($results as $key => $val){


                    $item['order_sn'] = $val[0];
                    $item['total_price'] = $val[1];
                    $item['goods_name'] = $val[2];
                    $item['goods_num'] = $val[3];
                    $item['real_pay'] = $val[4];
                    $item['freight'] = $val[5];
                    $item['receiver_name'] = $val[6];
                    $item['address'] = $val[7];
                    $item['send_way'] = $val[8];
                    $item['mobile'] = $val[9];
                    $item['order_cretime'] = $val[10]->toDateTimeString();
                    $item['order_paytime'] = $val[11]->toDateTimeString();
                    $item['logistics_num'] = $val[12];
                    $item['logistics_company'] = $val[13];
                    $item['create_time'] = $time;
                    $item['update_time'] = $time;

                $datas[] = $item;

            }
            //dd($datas);
            $res = $orderon->Import($datas);
            if($res){
                echo 1;
            }else{
                echo 0;
            }





        },'UTF-8');
    }
    /*线上订单列表*/
    public function onlineOrderList(){
        $orderon = new OrderOnline();
        $list = $orderon->getOrderOnList();
        return view('redWine.orderlistonline',compact('list'));
    }

    /*客户列表*/
    public function customerList(){
        $customer = new Customer();
        $list = $customer->getCustomerList();
        return view('redWine.customerlist',compact('list'));

    }
    /*添加客户*/
    public function insertCustomer(){

        $customer = new Customer();
        $input = Input::all();

        $cus['cus_name'] = $input['buy_name'];
        $cus['cus_tel'] = $input['buy_tel'];
        $cus['cus_addr'] = $input['buy_addr'];
        $cus['create_time'] = time();
        $cus['update_time'] = $cus['create_time'];

        $re_cus = $customer->AddCustomer($cus);
        if ($re_cus) {
            actionLog('添加客户'.$input['buy_name'].'成功！');
            trueAjax('添加客户成功！');
        } else {
            actionLog('添加客户'.$input['buy_name'].'失败！');
            falseAjax('添加客户失败');
        }

    }

    /*获取单条用户信息*/
    public function editCustomer(){
        $customer = new Customer();
        $input = Input::all();
        $result = $customer->getOneInfo(['id'=>$input['cus_id']]);
        trueAjax('', $result);
    }
    /*保存修改信息*/
    public function saveEdit(){
        $customer = new Customer();
        $input = Input::all();
        $cus['cus_name'] = $input['buy_name'];
        $cus['cus_tel'] = $input['buy_tel'];
        $cus['cus_addr'] = $input['buy_addr'];

        $cus['update_time'] = time();

        $result = $customer->saveInfo($input['cus_id'],$cus);
        if($result){
            actionLog('更新客户信息成功！客户编号：'.$input['cus_id']);
            trueAjax('更新客户信息成功！');
        }else{
            actionLog('更新客户信息失败！客户编号：'.$input['cus_id']);
            falseAjax('更新客户信息失败');
        }

    }

    /*查看客户所有订单*/
    public function customerOrderList($id){
        $orderwine =new WineOrder();
        $customer = new Customer();
        $info = $customer->getOneInfo(['id'=>$id]);
        $list = $orderwine->getcusOrderList($id);
        $countall = $orderwine->getCount($id);
        $countyes = $orderwine->getCount($id,['order_status'=>$orderwine::ORDER_STATE_YES]);
        $countno = $orderwine->getCount($id,['order_status'=>$orderwine::ORDER_STATE_NO]);
        $countre = $orderwine->getCount($id,['order_status'=>$orderwine::ORDER_STATE_REJECT]);
        $money = $orderwine->getMoney($id);
        return view('redWine.cusorderlist',compact('list','info','countall','countno','countre','countyes','money','id'));
    }
    /*导出订单到excel*/
    public function downloadExcel(Request $request){
        if(empty($request->timerange)){
            $time1 = 0;
            $time2 = time();
        }else{
            $time = explode(' - ',$request->timerange);
            $time1 =  strtotime($time[0]);
            $time2 =  mktime(23, 59, 59,date('m',strtotime($time[1])),date('d',strtotime($time[1])),date('Y',strtotime($time[1])));

        }



        $order = new WineOrder();
        $data = $order->getList($time1,$time2);
        if(!$data->count()){
            $prev_path = url()->previous();
            echo "<script>
                    alert('该时间段没有相关数据！');
                    location.href='".$prev_path."';
                </script>";
        }
        foreach ($data as $k=>$v){
            $cellData[] = array(
                '订单编号' => $v->order_num,
                '红酒名称' => $v->wine_name,
                '单价(RMB)' => $v->price,
                '数量(瓶)' => $v->wine_num,
                '订单总价' => $v->total_price,
                '未付金额' => $v->debt_price,
                '订单状态' => $v->order_status,
                '付款方式' => $v->pay_way,
                '客户姓名' => $v->buy_name,
                '客户电话' => $v->buy_tel,
                '客户地址' => $v->buy_addr,
                '订单创建人' => $v->ad_name,
                '创建时间' => date('Y-m-d H:i',$v->create_time),

            );
        }

        Excel::create('订单信息',function($excel) use ($cellData){
            $excel->sheet('订单信息', function($sheet) use ($cellData){
                $sheet->fromArray($cellData);
                $sheet->setWidth(array(
                    'A'=>20,
                    'B'=>20,
                    'C'=>10,
                    'D'=>10,
                    'E'=>10,
                    'F'=>10,
                    'G'=>10,
                    'H'=>10,
                    'I'=>10,
                    'J'=>20,
                    'K'=>20,
                    'L'=>15,
                    'M'=>20
                ));

                /*$sheet->cells('', function($cells) {


                    $cells->setAlignment('center');

                });
                $sheet->setAutoSize(true);
                $sheet->setAllBorders('thin');*/
                $sheet->freezeFirstRow();

            });
        })->export('xls');
    }

    /*抵账*/
    public function repay(){
        $wineorder = new WineOrder();
        $input = Input::all();
        $wineorder->repayDebt($input['id'],$input['repaydebt']);

    }

    /*日志列表*/
    public function getActionLog(){
        $actionlog = new AdminLog();
        $list = $actionlog->GetLogList();
        return view('redWine.loglist',compact('list'));

    }

    /*销售走势*/
    public function Charts(){
        $wineorder = new WineOrder();
        $redwine = new RedWine();
        $date['years'] = date('Y');
        $date['months'] = '';
        $result = $wineorder->yearCount($date);
        $sales = $result['sales'];
        $resu = $wineorder->money($date);
        $money = $resu['sales'];
        $resu = json_encode($resu['res']);
        $result = json_encode($result['res']);
        $list = $redwine->getAlllist();
        return view('redWine.charts',compact('result','sales','list','money','resu'));
    }
    /*销售走势*/
    public function Counts(){
        $wineorder = new WineOrder();
        $input = Input::all();
        $input['months'] = isset($input['months'])?$input['months']:'';
        $input['goods'] = isset($input['goods'])?$input['goods']:'';
        $result = $wineorder->yearCount($input);
        trueAjax('',$result);
    }
    /*销售额*/
    public function salemoney(){
        $wineorder = new WineOrder();
        $input = Input::all();
        $input['months'] = isset($input['months'])?$input['months']:'';
        $input['goods'] = isset($input['goods'])?$input['goods']:'';
        $result = $wineorder->money($input);
        trueAjax('',$result);
    }

}