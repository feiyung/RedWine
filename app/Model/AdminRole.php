<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/10
 * Time: 9:20
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    protected $table = 'admin_role';
    protected $primaryKey = 'id';
    public $timestamps = false;
    const STATE_NORMAL = 1;//正常
    const STATE_HIDE = 0;//不正常


    /*添加权限*/
    public function AddRole($data){
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
    /*获取所有分组列表*/

    public function getRoleList(){
        $result = $this->orderBy('id','asc')->get();
        return $result;
    }
    /*获取单条权限*/
    public function getOne($id){
        $result = $this->where(['id'=>$id])->first();
        return $result;
    }
    /*更新权限*/
    public function updateAcsess($id,$data){
        $result = $this->where(['id'=>$id])->update($data);
        return $result;
    }
    /*
     * 禁用分组*/
    public function disabledRole($id){
        return $this->where(['id'=>$id])->update(['status'=>self::STATE_HIDE]);
    }
    /*
     * 启用分组*/
    public function enabledRole($id){
        return $this->where(['id'=>$id])->update(['status'=>self::STATE_NORMAL]);
    }
}