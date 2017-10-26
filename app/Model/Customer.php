<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/17
 * Time: 16:02
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    public $timestamps = false;

    const ORDER_STATE_NO = 0;//未支付
    const ORDER_STATE_YES = 1;//已支付
    const ORDER_STATE_REJECT = 2;//退货退款

    /*添加客户*/
    public function AddCustomer($data){
        $id = $this->insertGetId($data);
        if($id){
            return true;
        }else{
            return false;
        }
    }

    /*获取所有客户*/
    public function getCustomerList(){
        $list = $this->orderBy('id','asc')->paginate(20);
        return $list;
    }
    /*根据条件获取客户信息*/
    public function getOneInfo($con){
        $result = $this->where($con)->first();
        return $result;
    }
    /*更新客户信息*/
    public function saveInfo($id,$data){
        $result = $this->where(['id'=>$id])->update($data);
        return $result;

    }


}