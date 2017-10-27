<?php

namespace App\Http\Middleware;

use App\Model\Admin;
use App\Model\AdminAccess;
use Closure;
use Illuminate\Http\Request;

class CheckAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $admin = new Admin();
        $adminaccess = new AdminAccess();
        $info = json_decode(session('info'),true);
        if(!$info['is_super']){
            $user = $admin->getInfo(['ad_id'=>$info['ad_id']]);
            $parent_id = json_decode($user['parent_access'],true)?json_decode($user['parent_access'],true):[];
            $son_id = json_decode($user['son_access'],true)?json_decode($user['son_access'],true):[];
            $path = $request->path();
            $id = $request->route('id');
            if($id){
                $path = str_replace('/'.$id,'',$path);
            }
            $res = $adminaccess->getOne(['url'=>$path]);
            if(!in_array($res['id'],$parent_id) and !in_array($res['id'],$son_id)){
                $prev_path = url()->previous();

                if($request->isMethod('post')){
                    falseAjax('你没有操作权限！');
                }else{
                    echo "<script>
                    alert('你没有操作权限！');
                    location.href='".$prev_path."';
                </script>";
                }

                exit();
            }
        }


        return $next($request);
    }
}
