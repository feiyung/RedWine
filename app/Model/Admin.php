<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/30
 * Time: 10:28
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Admin extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'ad_id';
    public $timestamps = false;

    const STATE_NORMAL = 1;//正常
    const STATE_HIDE = 0;//不正常

    public function AddAdmin($data){
       $ad_id = $this->insertGetId($data);
        if($ad_id){
            return true;
        }else{
            return false;
        }
    }

    public function getAdminList(){
        $data = $this->get(['ad_id','ad_name','login_time','login_num','group_id','is_normal']);

        foreach ($data as $v){
            if($v->group_id==0){
                $v->group = '暂无分组';
            }
        }
        return $data;
    }
    /*获取用户信息*/
    public function getInfo($condition){
        $info = $this->where($condition)->first();
        return $info;
    }
    /*
         * 禁用用户*/
    public function disabled($id){
        return $this->where(['ad_id'=>$id])->update(['is_normal'=>self::STATE_HIDE]);
    }
    /*
     * 启用用户*/
    public function enabled($id){
        return $this->where(['ad_id'=>$id])->update(['is_normal'=>self::STATE_NORMAL]);
    }
    /*更新登录时间次数*/

    public function loginTime($id){
        $data = $this->getInfo(['ad_id'=>$id]);
        $d['login_time'] = time();
        $d['login_num'] = $data->login_num + 1;

        return $this->where(['ad_id'=>$id])->update($d);
    }

    /*更新用户信息*/
    public function updateInfo($id,$data){
        $result = $this->where(['ad_id'=>$id])->update($data);
        return $result;
    }

}