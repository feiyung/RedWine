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

    /*
     * 获取所有订单列表
     */

    public function getOrderList(){
        $result = $this->orderBy('create_time','desc')->paginate(20);;
        return $result;
    }
    /*
 * 创建订单
 */
    public function addWineOrder($data){

        $ad_id = $this->insertGetId($data);
        if($ad_id){
            return true;
        }else{
            return false;
        }

    }

    /*通过id获取一条订单*/

    public function getOneorder($id){
        $result = $this->where(['id'=>$id])->first();
        return $result;
    }
    /*获取订单数量*/
    public function getOrderCount($con){
        $result = $this->where(['order_num'=>$con])->count();
        return $result;
    }

    /*更新订单状态*/
    public function updateOrder($id){
        $result = $this->where(['order_num'=>$id])->update(['order_status'=>self::ORDER_STATE_YES]);
        return $result;
    }

}