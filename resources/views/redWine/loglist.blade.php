@extends('layouts.master')
@section('title')
    日志列表
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-head">
            <h2>日志列表</h2>
            <ol class="breadcrumb">
                <li><a href="#">首页</a></li>
                <li><a href="#">日志管理</a></li>
                <li class="active">日志列表</li>
            </ol>
        </div>
        <div class="cl-mcont" style="padding: 0">
            <div class="row">


                <div class="col-sm-12 col-md-12 column">

                    <div class="block-flat">
                        <div class="header">
                            {{--<h3>Full-Borders Table</h3>--}}

                            {{--<button class="btn btn-primary btn-flat md-trigger btn-rad"
                                    data-modal="colored-success">添加新客户
                            </button>--}}


                        </div>
                        {{--<div class="md-modal colored-header primary md-effect-3" id="colored-success">
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

                                        --}}{{--                                        <div class="form-group">
                                                                                    <div class="col-sm-offset-2 col-sm-10">
                                                                                        <button type="submit" class="btn btn-primary">Registrer</button>
                                                                                        <button class="btn btn-default">Cancel</button>
                                                                                    </div>
                                                                                </div>--}}{{--
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
                        </div>--}}
                        <div class="md-overlay"></div>
                        <div class="content">
                            <table class="table no-border hover">
                                <thead class="no-border">
                                <tr>
                                    <th>编号</th>
                                    <th>操作内容</th>
                                    <th class="">操作人</th>
                                    <th class="">操作IP</th>
                                    <th class="text-right">操作时间</th>
                                </tr>
                                </thead>
                                <tbody class="no-border-y">

                                @foreach($list as $v)
                                    <tr>
                                        <td style="vertical-align: middle">{{$v->id}}</td>
                                        <td style="vertical-align: middle">{{$v->act_name}}</td>
                                        <td style="vertical-align: middle">{{$v->ad_name}}</td>
                                        <td style="vertical-align: middle">{{$v->act_ip}}</td>
                                        <td style="vertical-align: middle" class="text-right">
                                            {{date('Y-m-d H:i',$v->create_time)}}
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

