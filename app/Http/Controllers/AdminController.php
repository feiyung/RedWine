<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/9/30
 * Time: 10:11
 */

namespace App\Http\Controllers;


use App\Model\Admin;
use App\Model\AdminAccess;
use App\Model\AdminRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /*
     * 添加用户
     */
    public function Add_user(){

        $admin = new Admin();
        $input = Input::all();
        $data['ad_name'] = $input['uname'];
        $data['ad_password'] = md5($input['pwd']);
        $data['is_super'] = isset($input['issuper']) ? $input['issuper'] : 0;
        $data['add_time'] = time();
        $data['is_normal'] = $admin::STATE_NORMAL;
        if($input['pwd']!=$input['repwd']){
            falseAjax('两次密码不一致，请重新输入！');
        }
        $result = $admin->AddAdmin($data);
        if($result){
            trueAjax('添加用户成功！');
        }else{
            falseAjax('添加用户失败');
        }



    }

    /*获取用户信息*/
    public function getAdminInfo(){
        $admin = new Admin();
        $input = Input::all();
        $result = $admin->getInfo(['ad_id'=>$input['id']]);
        trueAjax('', $result);
    }

    /*编辑用户*/
    public function editAdmin(){
        $admin = new Admin();
        $input = Input::all();
        $data['ad_name'] = $input['uname'];
        $data['ad_password'] = md5($input['pwd']);
        $data['is_super'] = isset($input['issuper']) ? $input['issuper'] : 0;
        if($input['pwd']!=$input['repwd']){
            falseAjax('两次密码不一致，请重新输入！');
        }
        $result = $admin->updateInfo($input['id'],$data);
        if($result){
            trueAjax('更新用户成功！');
        }else{
            falseAjax('更新用户失败');
        }

    }
    /*登录页面*/
    public function login_page(){
        return view('login');
    }
    /*
     * 用户登录
     */
    public function login(){
        $admin = new Admin();
        $input = Input::all();
        if(!strlen($input['name'])){
            falseAjax('用户名不能为空');
        }
        if(!strlen($input['pwd'])){
            falseAjax('密码不能为空');
        }
        $condition['ad_name'] = $input['name'];
        $condition['ad_password'] = md5($input['pwd']);
        $info = $admin->getInfo($condition);
        if (empty($info)) {
            falseAjax('登录失败,请检查账号密码是否正确');
        }

        if (!$info['is_normal']) {
            falseAjax('该用户处于不可登录状态,详情请联系管理员');
        }
        session(['info'=>json_encode($info),'ad_name'=>$info->ad_name]);
        Session::save();
        $admin->loginTime($info->ad_id);
        trueAjax('');
    }

    /*用户退出*/
    public function loginout(){
        session(['info' => null]);
        Session::save();
        return redirect('/');
    }

    /*
     * 用户列表
     */
    public function adminList(){
        $admin = new Admin();
        $list = $admin->getAdminList();
        $info = json_decode(session('info'),true);
        $super =  $info['is_super'];

        dd(session('alipay'));
        //dd($list);
        //dd(empty($list->toArray()));
        return view('userlist',compact('list','super'));
    }

    /*用户禁用*/
    public  function disableAdmin(){
        $admin = new Admin();
        $input = Input::all();
        $result = $admin->disabled($input['id']);
        if($result){
            trueAjax('');
        }else{
            falseAjax('');
        }
    }
    /*用户启用*/
    public  function enableAdmin(){
        $admin = new Admin();
        $input = Input::all();
        $result = $admin->enabled($input['id']);
        if($result){
            trueAjax('');
        }else{
            falseAjax('');
        }
    }

    /*
 * 分组列表
 */
    public function roleList(){
        $adminRole = new AdminRole();
        $list = $adminRole->getRoleList();
        //dd($list);
        return view('adminrole',compact('list'));
    }

    /*添加分组*/

    public function addroles(){
        $adminRole = new AdminRole();
        $input = Input::all();
        $data['role_name'] = $input['role_name'];
        $data['create_time'] = time();
        $data['update_time'] = $data['create_time'];
        $data['status'] = $adminRole::STATE_NORMAL;
        $result = $adminRole->AddRole($data);
        if($result){
            trueAjax('添加用户成功！');
        }else{
            falseAjax('添加用户失败');
        }
    }

    /*分组禁用*/
    public  function disableRole(){
        $adminRole = new AdminRole();
        $input = Input::all();
        $result = $adminRole->disabledRole($input['id']);
        if($result){
            trueAjax('');
        }else{
            falseAjax('');
        }
    }
    /*分组启用*/
    public  function enableRole(){
        $adminRole = new AdminRole();
        $input = Input::all();
        $result = $adminRole->enabledRole($input['id']);
        if($result){
            trueAjax('');
        }else{
            falseAjax('');
        }
    }


    /*
     * 给分组分配权限
     */

    public function allotAccess(){

    }

    /*
     * 权限列表
     */
    public function accessList(){
        $adminAccess = new AdminAccess();
        $toplist = $adminAccess->getAccesslist();
        $alllist = $adminAccess->getAlllist();
        return view('accesslist',compact('toplist','alllist'));
    }


    /*添加权限*/

    public function addAccess(){
        $adminAccess = new AdminAccess();
        $input = Input::all();
        $data['p_name'] = $input['p_name'];
        $data['url'] = $input['url'];
        $data['pid'] = $input['pid'];
        $data['create_time'] = time();
        $data['update_time'] = $data['create_time'];
        $data['status'] = $adminAccess::STATE_NORMAL;
        $result = $adminAccess->AddAccess($data);
        if($result){
            trueAjax('添加用户成功！');
        }else{
            falseAjax('添加用户失败');
        }
    }

    /*编辑权限*/

    public function editAccess(Request $request){
        $adminAccess = new AdminAccess();
        if($request->isMethod('post')){
            $input = Input::all();
            $data['p_name'] = $input['p_name'];
            $data['url'] = $input['url'];
            $data['pid'] = $input['pid'];
            $data['update_time'] = time();
            $result = $adminAccess->updateAcsess($input['id'],$data);
            if($result){
                trueAjax('修改成功！');
            }else{
                falseAjax('修改失败！');
            }
        }else{
            $getone = $adminAccess->getOne($request->id);
            $toplist = $adminAccess->getAccesslist();
            return view('editaccess',compact('getone','toplist'));
        }

    }
    /*权限禁用*/
    public  function disable(){
        $adminAccess = new AdminAccess();
        $input = Input::all();
        $result = $adminAccess->disabled($input['id']);
        if($result){
            trueAjax('');
        }else{
            falseAjax('');
        }
    }
    /*权限启用*/
    public  function enable(){
        $adminAccess = new AdminAccess();
        $input = Input::all();
        $result = $adminAccess->enabled($input['id']);
        if($result){
            trueAjax('');
        }else{
            falseAjax('');
        }
    }
}