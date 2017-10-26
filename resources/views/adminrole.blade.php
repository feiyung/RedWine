@extends('layouts.master')
@section('title')
    分组列表
@endsection

@section('content')
    <div class="container">
        <div class="page-head">
            <h2>分组列表</h2>
            <ol class="breadcrumb">
                <li><a href="#">首页</a></li>
                <li><a href="#">分组管理</a></li>
                <li class="active">分组列表</li>
            </ol>
        </div>
        <div class="cl-mcont" style="padding: 0">
            <div class="row">


                <div class="col-sm-12 col-md-12 column">

                    <div class="block-flat">
                        <div class="header">
                            {{--<h3>Full-Borders Table</h3>--}}

                            <button class="btn btn-success btn-flat md-trigger btn-rad btn-lg"
                                    data-modal="colored-success">添加新分组
                            </button>

                        </div>
                        <div class="md-modal colored-header success md-effect-3" id="colored-success">
                            <div class="md-content">
                                <div class="modal-header">
                                    <h3>分组填写</h3>
                                    <button type="button" class="close md-close" data-dismiss="modal"
                                            aria-hidden="true">×
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" role="form"  novalidate=""
                                          method="post" action="" id="addForm">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">分组名称</label>
                                            <div class="col-sm-7">
                                                <input type="email" required=""
                                                       class="form-control" id="inputEmail3"
                                                       placeholder="长度1~10" name="p_name"
                                                       data-parsley-id="5250" maxlength="10" minlength="3">

                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-flat md-close"
                                            data-dismiss="modal">取消
                                    </button>
                                    <button type="button" class="btn btn-success btn-flat md-close"
                                            data-dismiss="modal" id="submit">提交
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
                                    <th>分组名称</th>
                                    <th>更新时间</th>
                                    <th class="text-right">分组操作</th>
                                </tr>
                                </thead>
                                <tbody class="no-border-y">
                                @foreach($list as $n)
                                    <tr>
                                        <td style="vertical-align: middle">{{$n->id}}</td>
                                        <td style="vertical-align: middle">{{$n->role_name}}</td>
                                        <td style="vertical-align: middle">{{date('Y-m-d H:i:s',$n->update_time)}}</td>
                                        <td style="vertical-align: middle" class="text-right">
                                            @if($n->status)

                                                <button type="button" class="disable btn btn-warning btn-rad" data-id="{{$n->id}}" onclick="disable(this)">禁用</button>
                                            @else
                                                <button type="button" class="enable btn btn-success btn-rad" data-id="{{$n->id}}" onclick="enable(this)">启用</button>
                                            @endif
                                            <a href="{{url("admin/editAccess/$n->id")}}">
                                                <button type="button" class="btn btn-info btn-rad"
                                                >编辑
                                                </button></a>
                                                <button type="button" class="btn btn-info btn-rad"
                                                >分配权限
                                                </button>
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
    <div class="md-modal md-effect-1" id="md-scale">
        <div class="md-content" style="box-shadow: 3px 5px 10px 2px #aaa;width: 350px;height: 200px">
            <div class="modal-header">
                {{--<button type="button" class="close md-close" data-dismiss="modal" aria-hidden="true">×</button>--}}
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div class="i-circle success"><i class="fa fa-check" id="tips"></i></div>
                    <h4 id="msg">Awesome!</h4>
                </div>
            </div>
            <div class="modal-footer" style="border: none">

            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>

        $('#submit').click(function () {
            var uname = $("input[name='p_name']").val();
            if(!uname.length){
                alertfail('权限名称不能为空！');
                return false;
            }
            $.post('{{url('/admin/addrole')}}', {
                role_name: uname,
                _token: "{{csrf_token()}}"
            }, function (data) {
                if (data.flag) {
                    alertsuccess(data.msg);
                } else {
                    alertfail(data.msg);
                }
            }, 'json')

        })
        function disable(t) {

            var id = $(t).attr('data-id');
            $.post('{{url('admin/disablerole')}}',{id:id,_token: "{{csrf_token()}}"},function(data){
                if(!data.flag){
                    return false;
                }
            },'json')
            $(t).parent().prepend('<button type="enable button" class="btn btn-success btn-rad" data-id="'+id+'" onclick="enable(this)">启用</button>');
            $(t).remove();



        }

        function enable(t){

            var id = $(t).attr('data-id');
            $.post('{{url('admin/enablerole')}}',{id:id,_token: "{{csrf_token()}}"},function(data){
                if(!data.flag){
                    return false;
                }
            },'json')
            $(t).parent().prepend('<button type="button" class="disable btn btn-warning btn-rad" data-id="'+id+'" onclick="disable(this)">禁用</button>');
            $(t).remove();


        }

    </script>
@endsection