<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/18
 * Time: 14:24
 */

namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class AdminLog extends Model
{
    protected $table = 'adminlog';
    protected $primaryKey = 'id';
    public $timestamps = false;
    /*创建日志*/
    public function CreateLog($db)
    {
        $db['id'] = $this->insertGetId($db);
        if ($db) {
            return $db;
        } else {
            return false;
        }
    }

    /*获取日志列表*/
    public function GetLogList()
    {
        $data = $this->orderBy('create_time', 'desc')
            ->paginate(20);
        return $data;
    }
}