<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/10
 * Time: 15:29
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class WineOrder extends Model
{
    protected $table = 'wineorder';
    protected $primaryKey = 'id';
    public $timestamps = false;
    const ORDER_STATE_NO = 0;//未支付
    const ORDER_STATE_YES = 1;//已支付
    const ORDER_STATE_REJECT = 2;//退货退款
    const PAY_BY_ALIPAY = 1;//支付宝支付
    const PAY_BY_CASH = 2;//现金支付
    const PAY_BY_CREDIT = 3;//赊账

    /*
     * 获取所有订单列表
     */

    public function getOrderList()
    {
        $result = $this->orderBy('create_time', 'desc')->paginate(20);;
        return $result;
    }

    /*
 * 创建订单
 */
    public function addWineOrder($data)
    {

        $ad_id = $this->insertGetId($data);
        if ($ad_id) {
            return true;
        } else {
            return false;
        }

    }

    /*通过id获取一条订单*/

    public function getOneorder($id)
    {
        $result = $this->where(['id' => $id])->first();
        return $result;
    }

    /*通过订单号获取一条订单*/

    public function getorder($order_num)
    {
        $result = $this->where(['order_num' => $order_num])->first();
        return $result;
    }

    /*获取订单数量*/
    public function getOrderCount($con)
    {
        $result = $this->where(['order_num' => $con])->count();
        return $result;
    }

    /*获取单个客户订单*/
    public function getcusOrderList($id)
    {
        $result = $this->where(['buy_id' => $id])->orderBy('create_time', 'desc')->paginate(20);
        return $result;
    }

    /*根据订单号更新订单状态*/
    public function updateOrder($id)
    {

        $one = $this->getorder($id);
        $nowprice = 0;
        $result = $this->where(['order_num' => $id])->update(['order_status' => self::ORDER_STATE_YES, 'debt_price' => $nowprice]);
        return $result;
    }

    /*根据id更新订单状态*/
    public function updatesOrder($id)
    {


        $result = $this->where(['id' => $id])->update(['order_status' => self::ORDER_STATE_REJECT]);
        return $result;
    }

    /*根据订单状态获取数量*/

    public function getCount($id,$con=[]){
        $count = $this->where($con)->where(['buy_id'=>$id])->count();
        return $count;
    }
    /*获取客户相关金额*/
    public function getMoney($id){
        $all = $this->where(['buy_id'=>$id])->where('order_status','<>',self::ORDER_STATE_REJECT)->get()->sum('total_price');
        $debt = $this->where(['buy_id'=>$id])->where('order_status','<>',self::ORDER_STATE_REJECT)->get()->sum('debt_price');
        return ['all'=>$all,'debt'=>$debt];
    }

    /*订单支付方式*/
    public function payWaySave($id, $pay_way)
    {
        $one = $this->getOneorder($id);
        $nowprice = $one['debt_price'] - $pay_way['pay_price'];
        if ($nowprice < 0) {
            falseAjax('输入金额超过了未支付金额！');
        }
        if ($pay_way['pay_way'] == self::PAY_BY_CASH) {
            if ($nowprice <= 0) {
                $result = $this->where(['id' => $id])->update(['debt_price' => $nowprice, 'order_status' => self::ORDER_STATE_YES, 'pay_way' => $pay_way['pay_way']]);
                actionLog('订单号：' . $one['order_num'] . '，现金收款：' . $pay_way['pay_price'] . '元，已付完所有金额！');
            } else {
                $result = $this->where(['id' => $id])->update(['debt_price' => $nowprice, 'pay_way' => $pay_way['pay_way']]);
                actionLog('订单号：' . $one['order_num'] . '，现金收款：' . $pay_way['pay_price'] . '元，未付金额：' . $nowprice . '元');
            }

        } else {
            $result = $this->where(['id' => $id])->update(['pay_way' => $pay_way['pay_way']]);
            if ($pay_way['pay_way'] == self::PAY_BY_CREDIT) {
                actionLog('订单号：' . $one['order_num'] . '，赊账，未付金额：' . $nowprice . '元');
            }
        }

        return $result;
    }

    /*抵账*/
    public function repayDebt($id,$debt){
        $debts = $debt;
        $ids = $this->where(['buy_id'=>$id,'order_status'=>self::ORDER_STATE_NO])->get(['id']);//获取未支付id
        $num = $this->getCount($id,['order_status'=>self::ORDER_STATE_NO]);
        $money = $this->getMoney($id);
        if ($money['debt'] < $debt) {
            falseAjax('输入金额超过了未支付金额！');
        }
        $idarr = array();
        foreach ($ids as $v){
            $idarr[] = $v->id;
        }

            for($i=0;$i<$num;$i++){
                $debt_price = $this->where(['id' => $idarr[$i]])->first(['debt_price','order_num']);
                if($debt>=$debt_price['debt_price']){
                    $debt = $debt-$debt_price['debt_price'];
                    $this->where(['id' => $idarr[$i]])->update(['debt_price' => 0, 'order_status' => self::ORDER_STATE_YES, 'pay_way' => self::PAY_BY_CASH]);
                    actionLog('订单号：' . $debt_price['order_num'] . '，现金收款：' . $debt_price['debt_price'] . '元，已付完所有金额！');

                }else{
                    $debt = -$debt+$debt_price['debt_price'];
                    $this->where(['id' => $idarr[$i]])->update(['debt_price' => $debt, 'pay_way' => self::PAY_BY_CASH]);
                    actionLog('订单号：' . $debt_price['order_num'] . '，现金收款：' . ($debt_price['debt_price']-$debt) . '元，未付金额：' . $debt . '元');

                    break;
                }
            }

            trueAjax('',['debt'=>$debts]);




    }


    /*销量统计*/
    public function yearCount($dates)
    {
        $data = array();
        $sum = 0;
        if (!empty($dates['months'])) {
            $dated = $dates['years'] . '-' . $dates['months'];
            $dated = strtotime($dated);
            $days = date('t', $dated);//该月天数
            $day = date('d', $dated);
            for ($i = 1; $i <= $days; $i++) {
                $day_start = mktime(0, 0, 0, date('m', $dated), date('d', $dated) - ($day - $i), date('Y', $dated));
                $day_end = mktime(0, 0, 0, date('m', $dated), date('d', $dated) - ($day - $i - 1), date('Y', $dated)) - 1;
                if (!empty($dates['goods'])) {
                    $num = $this->whereBetween('create_time', [$day_start, $day_end])->where('order_status', '<>', 2)->where(['wine_id' => $dates['goods']])->get()->sum('wine_num');
                } else {
                    $num = $this->whereBetween('create_time', [$day_start, $day_end])->where('order_status', '<>', 2)->get()->sum('wine_num');
                }

                $data[] = [$i, $num];
                $sum = $sum + $num;
            }
            $time = '月销量(瓶)';
            $time_y = '日销量(瓶)';
        } else {
            $day = 12;
            for ($i = 1; $i <= $day; $i++) {
                $dated = $dates['years'] . '-' . $i;
                $dated = strtotime($dated);
                $days = date('t', $dated);//该月天数
                $day_start = mktime(0, 0, 0, $i, 1, date('Y', $dated));
                $day_end = mktime(23, 59, 59, $i, $days, date('Y', $dated));
//                echo $day_start.'<br/>';
                if (!empty($dates['goods'])) {
                    $num = $this->whereBetween('create_time', [$day_start, $day_end])->where('order_status', '<>', 2)->where(['wine_id' => $dates['goods']])->get()->sum('wine_num');
                } else {
                    $num = $this->whereBetween('create_time', [$day_start, $day_end])->where('order_status', '<>', 2)->get()->sum('wine_num');
                }

                $data[] = [$i, $num];
                $sum = $sum + $num;
            }
            $time = '年销量(瓶)';
            $time_y = '月销量(瓶)';
        }

        //exit();
        return ['res' => $data, 'sales' => number_format($sum), 'time' => $time, 'time_y' => $time_y];
    }

    /*销售额统计*/
    public function money($dates)
    {
        $data = array();
        $sum = 0;
        if (!empty($dates['months'])) {
            $dated = $dates['years'] . '-' . $dates['months'];
            $dated = strtotime($dated);
            $days = date('t', $dated);//该月天数
            $day = date('d', $dated);
            for ($i = 1; $i <= $days; $i++) {
                $day_start = mktime(0, 0, 0, date('m', $dated), date('d', $dated) - ($day - $i), date('Y', $dated));
                $day_end = mktime(0, 0, 0, date('m', $dated), date('d', $dated) - ($day - $i - 1), date('Y', $dated)) - 1;
                if (!empty($dates['goods'])) {
                    $num = $this->whereBetween('create_time', [$day_start, $day_end])->where('order_status', '<>', 2)->where(['wine_id' => $dates['goods']])->get()->sum('total_price');
                } else {
                    $num = $this->whereBetween('create_time', [$day_start, $day_end])->where('order_status', '<>', 2)->get()->sum('total_price');
                }

                $data[] = [$i, $num];
                $sum = $sum + $num;
            }
            $time = '月销售额';
            $time_y = '日销售额';
        } else {
            $day = 12;
            for ($i = 1; $i <= $day; $i++) {
                $dated = $dates['years'] . '-' . $i;
                $dated = strtotime($dated);
                $days = date('t', $dated);//该月天数
                $day_start = mktime(0, 0, 0, $i, 1, date('Y', $dated));
                $day_end = mktime(23, 59, 59, $i, $days, date('Y', $dated));
//                echo $day_start.'<br/>';
                if (!empty($dates['goods'])) {
                    $num = $this->whereBetween('create_time', [$day_start, $day_end])->where('order_status', '<>', 2)->where(['wine_id' => $dates['goods']])->get()->sum('total_price');
                } else {
                    $num = $this->whereBetween('create_time', [$day_start, $day_end])->where('order_status', '<>', 2)->get()->sum('total_price');
                }

                $data[] = [$i, $num];
                $sum = $sum + $num;
            }
            $time = '年销售额';
            $time_y = '月销售额';
        }

        //exit();
        return ['res' => $data, 'sales' => number_format($sum,2), 'time' => $time, 'time_y' => $time_y];
    }

}