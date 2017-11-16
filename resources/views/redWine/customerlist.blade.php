@extends('layouts.master')
@section('title')
    客户列表
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-head">
            <h2>客户列表</h2>
            <ol class="breadcrumb">
                <li><a href="#">首页</a></li>
                <li><a href="#">客户管理</a></li>
                <li class="active">客户列表</li>
            </ol>
        </div>
        <div class="cl-mcont" style="padding: 0">
            <div class="row">


                <div class="col-sm-12 col-md-12 column">

                    <div class="block-flat">
                        <div class="header">
                            {{--<h3>Full-Borders Table</h3>--}}

                                <button class="btn btn-primary btn-flat md-trigger btn-rad"
                                        data-modal="colored-success">添加新客户
                                </button>


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
                                    <form class="form-horizontal" role="form"  novalidate="" method="post" action="{{url('admin/add')}}" id="addForm">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">客户姓名</label>
                                            <div class="col-sm-7">
                                                <input type="email" required=""
                                                       class="form-control" id="inputEmail3"
                                                       placeholder="长度不超过10位" name="uname"
                                                       data-parsley-id="5250" maxlength="10" minlength="3">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-3 control-label">客户电话</label>
                                            <div class="col-sm-7">
                                                <input type="text" required="" class="form-control"
                                                       id="inputPassword3" placeholder="" name="pwd"
                                                       data-parsley-id="2907" maxlength="11" minlength="6">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-3 control-label">客户地址</label>
                                            <div class="col-sm-7">
                                                <input type="text" required="" class="form-control"
                                                       id="inputPassword3" placeholder="" name="addr"
                                                       data-parsley-id="2907" maxlength="80" minlength="6">

                                            </div>
                                        </div>

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
                                    <h3>编辑客户信息</h3>
                                    <button type="button" class="close md-close" data-dismiss="modal"
                                            aria-hidden="true">×
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" role="form"  novalidate="" method="post" action="{{url('admin/add')}}" id="addForm">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">客户姓名</label>
                                            <div class="col-sm-7">
                                                <input type="email" required=""
                                                       class="form-control" id="inputEmail3"
                                                       placeholder="长度不超过10位" name="uname_e"
                                                       data-parsley-id="5250" maxlength="10" minlength="3">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-3 control-label">客户电话</label>
                                            <div class="col-sm-7">
                                                <input type="text" required="" class="form-control"
                                                       id="inputPassword3" placeholder="长度6~20" name="pwd_e"
                                                       data-parsley-id="2907" maxlength="20" minlength="6">

                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-3 control-label">客户地址</label>
                                            <div class="col-sm-7">
                                                <input type="text" required="" class="form-control"
                                                       id="inputPassword3" placeholder="" name="addr_e"
                                                       data-parsley-id="2907" maxlength="80" minlength="6">

                                            </div>
                                        </div>
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
                                    <th>客户姓名</th>
                                    <th class="">客户电话</th>
                                    <th class="">客户地址</th>
                                    <th class="text-right">操作</th>
                                </tr>
                                </thead>
                                <tbody class="no-border-y">

                                @foreach($list as $v)
                                    <tr>
                                        <td style="vertical-align: middle">{{$v->id}}</td>
                                        <td style="vertical-align: middle">{{$v->cus_name}}</td>
                                        <td style="vertical-align: middle">{{$v->cus_tel}}</td>
                                        <td style="vertical-align: middle">{{$v->cus_addr}}</td>
                                        <td style="vertical-align: middle" class="text-right">
                                           {{-- @if($super)
                                                @if($v->is_normal)
                                                    <button type="button" class="btn btn-warning btn-rad btn-sm" data-id="{{$v->ad_id}}" onclick="disable(this)">禁用</button>
                                                @else
                                                    <button type="button" class="btn btn-success btn-rad btn-sm" data-id="{{$v->ad_id}}" onclick="enable(this)">启用</button>
                                                @endif


                                            @else
                                                <button type="button" class="btn btn-info btn-rad disabled btn-sm">无操作</button>
                                            @endif--}}
                                            <a href="{{url("/admin/cusorderList/$v->id")}}"><button type="button" class="btn btn-primary btn-rad  btn-sm">订单查看</button></a>
                                            <button type="button" class="btn btn-info btn-rad md-trigger edit btn-sm" data-modal="edit" data-id="{{$v->id}}">编辑</button>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="row"><div class="pull-right" style="padding-right: 20px;">{{$list->links()}}</div></div>
                    </div>


                </div>
            </div>


        </div>
    </div>
    {{--<button class="btn btn-primary btn-flat md-trigger" data-modal="md-scale"> Fade in &amp; Scale</button>--}}

@endsection
@section('javascript')
    <script>
        /*添加客户*/
        $('#submit').click(function(){
            var buy_name = $("input[name='uname']").val();
            var buy_tel = $("input[name='pwd']").val();
            var buy_addr = $("input[name='addr']").val();
            if(!buy_name.length){
                alertfail('客户姓名不能为空！');
                return false;
            }
            re = /^1[34578][0-9]{9}$/
            /*if (!re.test(buy_tel)) {

                alertfail("请输入合法手机号！");
                return false;
            }
            if(!buy_addr.length){
                alertfail('客户地址不能为空！');
                return false;
            }*/
            $.post('{{url('/admin/addcustomer')}}',{buy_name:buy_name,buy_tel:buy_tel,buy_addr:buy_addr,_token:"{{csrf_token()}}"},function(data){
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




        /*编辑*/
        $(".edit").click(function(){
            var id = $(this).attr('data-id');
            $.post("{{url('/admin/editcustomer')}}",{cus_id:id,
                _token: "{{csrf_token()}}"},function(data){
                if(data.flag){
                    $("input[name='uname_e']").val(data.data.cus_name);
                    $("input[name='pwd_e']").val(data.data.cus_tel);
                    $("input[name='addr_e']").val(data.data.cus_addr);


                    $("#submit_e").attr('data-id',data.data.id);

                }
            },'json')
        })

        $('#submit_e').click(function(){
            var buy_name = $("input[name='uname_e']").val();
            var buy_tel = $("input[name='pwd_e']").val();
            var buy_addr = $("input[name='addr_e']").val();

            var id = $(this).attr('data-id');
            if(!buy_name.length){
                alertfail('客户姓名不能为空！');
                return false;
            }
            re = /^1[34578][0-9]{9}$/
            if (!re.test(buy_tel)) {

                alertfail("请输入合法手机号！");
                return false;
            }
            if(!buy_addr.length){
                alertfail('客户地址不能为空！');
                return false;
            }
            $.post('{{url('/admin/saveedit')}}',{cus_id:id,buy_name:buy_name,buy_tel:buy_tel,buy_addr:buy_addr,_token:"{{csrf_token()}}"},function(data){
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