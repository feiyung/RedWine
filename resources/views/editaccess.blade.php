@extends('layouts.master')
@section('title')
    权限编辑
@endsection
@section('content')
    <div class="container">
        <div class="page-head">
            <h2>权限编辑</h2>
            <ol class="breadcrumb">
                <li><a href="#">首页</a></li>
                <li><a href="#">权限管理</a></li>
                <li class="active">权限编辑</li>
            </ol>
        </div>
        <div class="cl-mcont" style="padding: 0">
            <div class="row">


                        <div class="col-sm-6 col-md-6">
                            <div class="block-flat">
                                <div class="header">
                                    <h3>编辑权限</h3>
                                </div>
                                <div class="content">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-2 control-label">权限名称</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputEmail3" value="{{$getone->p_name}}" name="p_name">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-2 control-label">权限链接</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputPassword3" value="{{$getone->url}}" name="url">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">权限归属</label>
                                            <div class="col-sm-10">
                                                <select class="form-control" name="pid">

                                                        <option value="0" @if($getone->pid==0) selected @endif>顶级权限</option>

                                                    @foreach($toplist as $v)
                                                    <option value="{{$v->id}}" @if($getone->pid==$v->id)selected @endif>{{$v->p_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="button" class="btn btn-success pull-right" id="submit">保存</button>
                                                <a href="{{url('/admin/accesslist')}}"><button class="btn btn-default pull-right" type="button">返回</button></a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script>

        $('#submit').click(function () {
            var uname = $("input[name='p_name']").val();
            var pwd = $("input[name='url']").val();
            var repwd = $("select[name='pid']").val();
            var id = {{$getone->id}};
            if(!uname.length){
                alertfail('权限名称不能为空！');
                return false;
            }
            $.post('{{url('/admin/editAccess')}}', {
                p_name: uname,
                url: pwd,
                pid: repwd,
                id:id,
                _token: "{{csrf_token()}}"
            }, function (data) {
                if (data.flag) {
                    alertsuccess(data.msg);
                } else {
                    alertfail(data.msg);
                }
            }, 'json')

        })


    </script>
@endsection