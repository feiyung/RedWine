<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/15
 * Time: 16:05
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class OrderOnline extends Model
{
    protected $table = 'order_online';
    public $timestamps = false;

    public function Import($data){
       return $this->insert($data);
    }
    /*获取订单列表*/
    public function getOrderOnList()
    {
        $result = $this->orderBy('order_cretime', 'desc')->paginate(80);;
        return $result;
    }
}