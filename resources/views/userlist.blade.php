@extends('layouts.master')
@section('title')
    用户列表
@endsection

@section('content')
    <div class="container">
        <div class="page-head">
            <h2>用户列表</h2>
            <ol class="breadcrumb">
                <li><a href="#">首页</a></li>
                <li><a href="#">用户管理</a></li>
                <li class="active">用户列表</li>
            </ol>
        </div>
        <div class="cl-mcont" style="padding: 0">
            <div class="row">


                <div class="col-sm-12 col-md-12 column">

                    <div class="block-flat">
                        <div class="header">
                            {{--<h3>Full-Borders Table</h3>--}}
                            @if($super)
                            <button class="btn btn-primary btn-flat md-trigger btn-rad"
                                    data-modal="colored-success">添加新用户
                            </button>
                                @endif

                        </div>
                        <div class="md-modal colored-header primary md-effect-3" id="colored-success">
                            <div class="md-content">
                                <div class="modal-header">
                                    <h3>信息填写</h3>
                                    <button type="button" class="close md-close" data-dismiss="modal"
                                            aria-hidden="true">×
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" role="form" data-parsley-validate="" novalidate="" method="post" action="{{url('admin/add')}}" id="addForm">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">用户名</label>
                                            <div class="col-sm-7">
                                                <input type="email" required=""
                                                       class="form-control" id="inputEmail3"
                                                       placeholder="长度不超过10位" name="uname"
                                                       data-parsley-id="5250" maxlength="10" minlength="3">
                                                <ul class="parsley-errors-list" id="parsley-id-5250"></ul>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-3 control-label">登录密码</label>
                                            <div class="col-sm-7">
                                                <input type="password" required="" class="form-control"
                                                       id="inputPassword3" placeholder="长度6~20" name="pwd"
                                                       data-parsley-id="2907" maxlength="20" minlength="6">
                                                <ul class="parsley-errors-list" id="parsley-id-2907"></ul>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword" class="col-sm-3 control-label">确认密码</label>
                                            <div class="col-sm-7">
                                                <input type="password" required="" class="form-control"
                                                       id="inputPassword" placeholder="长度6~20" name="repwd"
                                                       data-parsley-id="2907" maxlength="20" minlength="6">
                                                <ul class="parsley-errors-list" id="parsley-id-2907"></ul>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-7">
                                                <div class="checkbox">
                                                    <label style="font-size: 12px;color: #cc0e24;">
                                                        <input type="checkbox" name="super" value="1"
                                                               data-parsley-multiple="remember_the_fallen">
                                                        设为超级管理员
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
{{--                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary">Registrer</button>
                                                <button class="btn btn-default">Cancel</button>
                                            </div>
                                        </div>--}}
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-flat md-close"
                                            data-dismiss="modal">取消
                                    </button>
                                    <button type="button" class="btn btn-primary btn-flat md-close"
                                            data-dismiss="modal" id="submit">提交
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="md-modal colored-header info md-effect-3" id="edit">
                            <div class="md-content">
                                <div class="modal-header">
                                    <h3>编辑用户信息</h3>
                                    <button type="button" class="close md-close" data-dismiss="modal"
                                            aria-hidden="true">×
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" role="form" data-parsley-validate="" novalidate="" method="post" action="{{url('admin/add')}}" id="addForm">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">用户名</label>
                                            <div class="col-sm-7">
                                                <input type="email" required=""
                                                       class="form-control" id="inputEmail3"
                                                       placeholder="长度不超过10位" name="uname_e"
                                                       data-parsley-id="5250" maxlength="10" minlength="3">
                                                <ul class="parsley-errors-list" id="parsley-id-5250"></ul>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-3 control-label">登录密码</label>
                                            <div class="col-sm-7">
                                                <input type="password" required="" class="form-control"
                                                       id="inputPassword3" placeholder="长度6~20" name="pwd_e"
                                                       data-parsley-id="2907" maxlength="20" minlength="6">
                                                <ul class="parsley-errors-list" id="parsley-id-2907"></ul>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword" class="col-sm-3 control-label">确认密码</label>
                                            <div class="col-sm-7">
                                                <input type="password" required="" class="form-control"
                                                       id="inputPassword" placeholder="长度6~20" name="repwd_e"
                                                       data-parsley-id="2907" maxlength="20" minlength="6">
                                                <ul class="parsley-errors-list" id="parsley-id-2907"></ul>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-3 col-sm-7">
                                                <div class="checkbox">
                                                    <label style="font-size: 12px;color: #cc0e24;">
                                                        <input type="checkbox" name="super_e" value="1"
                                                               data-parsley-multiple="remember_the_fallen">
                                                        设为超级管理员
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        {{--                                        <div class="form-group">
                                                                                    <div class="col-sm-offset-2 col-sm-10">
                                                                                        <button type="submit" class="btn btn-primary">Registrer</button>
                                                                                        <button class="btn btn-default">Cancel</button>
                                                                                    </div>
                                                                                </div>--}}
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-flat md-close"
                                            data-dismiss="modal">取消
                                    </button>
                                    <button type="button" class="btn btn-primary btn-flat md-close"
                                            data-dismiss="modal" id="submit_e">提交
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="md-overlay"></div>
                        <div class="content">
                            <table class="table no-border hover">
                                <thead class="no-border">
                                <tr>
                                    <th>编号</th>
                                    <th>用户名称</th>
                                    <th class="">登录次数</th>
                                    <th>最近登录时间</th>
                                    <th class="text-right">用户操作</th>
                                </tr>
                                </thead>
                                <tbody class="no-border-y">

                                @foreach($list as $v)
                                <tr>
                                    <td style="vertical-align: middle">{{$v->ad_id}}</td>
                                    <td style="vertical-align: middle">{{$v->ad_name}}</td>
                                    <td style="vertical-align: middle">{{$v->login_num}}</td>
                                    <td style="vertical-align: middle">
                                        @if($v->login_num)
                                        {{date('Y-m-d H:i',$v->login_time)}}
                                        @else
                                        暂未登录
                                        @endif
                                    </td>
                                    <td style="vertical-align: middle" class="text-right">
                                        @if($super)
                                        @if($v->is_normal)
                                            <button type="button" class="btn btn-warning btn-rad btn-sm" data-id="{{$v->ad_id}}" onclick="disable(this)">禁用</button>
                                        @else
                                            <button type="button" class="btn btn-success btn-rad btn-sm" data-id="{{$v->ad_id}}" onclick="enable(this)">启用</button>
                                        @endif
                                        <button type="button" class="btn btn-info btn-rad md-trigger edit btn-sm" data-modal="edit" data-id="{{$v->ad_id}}">编辑</button>
                                        {{--<button type="button" class="btn btn-primary btn-rad">权限分组</button>--}}
                                        {{--<button type="button" class="btn btn-danger btn-rad">删除</button>--}}
                                            @else
                                            <button type="button" class="btn btn-info btn-rad disabled btn-sm">无操作</button>
                                            @endif

                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>


        </div>
    </div>
    {{--<button class="btn btn-primary btn-flat md-trigger" data-modal="md-scale"> Fade in &amp; Scale</button>--}}

@endsection
@section('javascript')
    <script>

        $('#submit').click(function(){
            var uname = $("input[name='uname']").val();
            var pwd = $("input[name='pwd']").val();
            var repwd = $("input[name='repwd']").val();
            var issuper = $("input[name='super']:checked").val();
            if(!uname.length){
                alertfail('用户名称不能为空！');
                return false;
            }
            if(pwd.length<6){
                alertfail('密码长度不小于6位！');
                return false;
            }
            if(!pwd.length){
                alertfail('密码不能为空！');
                return false;
            }
            if(pwd!=repwd){
                alertfail('两次密码不相同！');
                return false;
            }
            $.post('{{url('/admin/adduser')}}',{uname:uname,pwd:pwd,repwd:repwd,issuper:issuper,_token:"{{csrf_token()}}"},function(data){
                    if(data.flag){
                        alertsuccess(data.msg);
                        setTimeout(function () {
                            location.reload(true);
                        }, 1000);
                    }else{
                        alertfail(data.msg);
                    }
            },'json')

        })


        function disable(t) {

            var id = $(t).attr('data-id');
            $.post('{{url('admin/disableadmin')}}',{id:id,_token: "{{csrf_token()}}"},function(data){
                if(!data.flag){
                    return false;
                }
            },'json')
            $(t).parent().prepend('<button type="enable button" class="btn btn-success btn-rad"data-id="'+id+'" onclick="enable(this)">启用</button>');
            $(t).remove();



        }

        function enable(t){

            var id = $(t).attr('data-id');
            $.post('{{url('admin/enableadmin')}}',{id:id,_token: "{{csrf_token()}}"},function(data){
                if(!data.flag){
                    return false;
                }
            },'json')
            $(t).parent().prepend('<button type="button" class="disable btn btn-warning btn-rad" data-id="'+id+'" onclick="disable(this)">禁用</button>');
            $(t).remove();


        }

        /*编辑*/
        $(".edit").click(function(){
            var id = $(this).attr('data-id');
            $.post("{{url('/admin/getadminInfo')}}",{id:id,
                _token: "{{csrf_token()}}"},function(data){
                if(data.flag){
                    $("input[name='uname_e']").val(data.data.ad_name);
                    $("input[name='pwd_e']").val(data.data.price);
                    $("input[name='repwd_e']").val(data.data.sku_num);
                    if(data.data.is_super){
                        $("input[name='super_e']").attr('checked',true);
                    }else{
                        $("input[name='super_e']").attr('checked',false);
                    }


                    $("#submit_e").attr('data-id',data.data.ad_id);

                }
            },'json')
        })

        $('#submit_e').click(function(){
            var uname = $("input[name='uname_e']").val();
            var pwd = $("input[name='pwd_e']").val();
            var repwd = $("input[name='repwd_e']").val();
            var issuper = $("input[name='super_e']:checked").val();
            var id = $(this).attr('data-id');
            if(!uname.length){
                alertfail('用户名称不能为空！');
                return false;
            }
            if(pwd.length<6){
                alertfail('密码长度不小于6位！');
                return false;
            }
            if(!pwd.length){
                alertfail('密码不能为空！');
                return false;
            }
            if(pwd!=repwd){
                alertfail('两次密码不相同！');
                return false;
            }
            $.post('{{url('/admin/editadmin')}}',{id:id,uname:uname,pwd:pwd,repwd:repwd,issuper:issuper,_token:"{{csrf_token()}}"},function(data){
                if(data.flag){
                    alertsuccess(data.msg);
                    setTimeout(function () {
                        location.reload(true);
                    }, 1000);
                }else{
                    alertfail(data.msg);
                }
            },'json')

        })
    </script>
@endsection