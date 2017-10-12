<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/10
 * Time: 11:42
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class RedWine extends Model

{
    protected $table = 'redwine';
    protected $primaryKey = 'id';
    public $timestamps = false;
    const STATE_NORMAL = 1;//正常
    const STATE_HIDE = 0;//不正常

    /*
     * 添加
     */
    public function addWine($data){

            $ad_id = $this->insertGetId($data);
            if($ad_id){
                return true;
            }else{
                return false;
            }

    }

    /*获取列表*/

    public function getAlllist(){
        $result = $this->orderBy('id','asc')->get();
        return $result;
    }

    /*获取一条*/

    public function getOne($id){
        $result = $this->where(['id'=>$id])->first();
        return $result;
    }
    /*编辑保存*/

    public function updateWine($id,$data){
        $result = $this->where(['id'=>$id])->update($data);
        return $result;
    }
}