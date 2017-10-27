<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/9
 * Time: 12:51
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class AdminAccess extends Model
{
    protected $table = 'admin_access';
    protected $primaryKey = 'id';
    public $timestamps = false;
    const STATE_NORMAL = 1;//正常
    const STATE_HIDE = 0;//不正常

    /*添加权限*/
    public function AddAccess($data){
        $id = $this->insertGetId($data);
        if($id){
            return true;
        }else{
            return false;
        }

    }

    /*获取顶级权限*/
    public function getAccesslist(){
        $result = $this->where(['pid'=>0])->get();
        return $result;

    }
    /*获取所有权限列表*/

    public function getAlllist(){
        $result = $this->orderBy('id','asc')->get();
        return $result;
    }
    /*获取所有权限排列*/
    public function getallAccess(){
        $top = $this->getAccesslist();
        foreach($top as &$v){
            $v->sonlist = $this->where(['pid'=>$v->id])->get(['id','p_name']);
        }
        return $top;
    }

    /*获取单条权限*/
    public function getOne($id){
        $result = $this->where($id)->first();
        return $result;
    }
    /*更新权限*/
    public function updateAcsess($id,$data){
        $result = $this->where(['id'=>$id])->update($data);
        return $result;
    }
    /*
     * 禁用权限*/
    public function disabled($id){
         return $this->where(['id'=>$id])->update(['status'=>self::STATE_HIDE]);
    }
    /*
     * 启用权限*/
    public function enabled($id){
        return $this->where(['id'=>$id])->update(['status'=>self::STATE_NORMAL]);
    }
}