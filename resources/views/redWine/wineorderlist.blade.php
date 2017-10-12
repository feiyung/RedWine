@extends('layouts.master')
@section('title')
    订单列表
@endsection

@section('content')
    <div class="container">
        <div class="page-head">
            <h2>订单列表</h2>
            <ol class="breadcrumb">
                <li><a href="#">首页</a></li>
                <li><a href="#">订单管理</a></li>
                <li class="active">订单列表</li>
            </ol>
        </div>
        <div class="cl-mcont" style="padding: 0">
            <div class="row">


                <div class="col-sm-12 col-md-12 column">

                    <div class="block-flat">
                        <div class="header">
                            {{--<h3>Full-Borders Table</h3>--}}

                            {{--<button class="btn btn-success btn-flat md-trigger btn-rad btn-lg"
                                    data-modal="colored-success">添加红酒
                            </button>--}}

                        </div>
                        <div class="md-modal colored-header  success md-effect-3" id="colored-success">
                            <div class="md-content">
                                <div class="modal-header">
                                    <h3>红酒信息</h3>
                                    <button type="button" class="close md-close" data-dismiss="modal"
                                            aria-hidden="true">×
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" role="form" data-parsley-validate="" novalidate=""
                                          method="post" action="" id="addForm">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">红酒名称</label>
                                            <div class="col-sm-7">
                                                <input type="text" required=""
                                                       class="form-control" id="inputEmail3"
                                                       placeholder="长度不超过30" name="wine_name"
                                                       data-parsley-id="5250" maxlength="30" minlength="3">
                                                <ul class="parsley-errors-list" id="parsley-id-5250"></ul>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-3 control-label">单价</label>
                                            <div class="col-sm-7">
                                                <input type="text" required="" class="form-control"
                                                       id="inputPassword3" placeholder="长度0~10" name="price"
                                                       data-parsley-id="2907" maxlength="10" minlength="0">
                                                <ul class="parsley-errors-list" id="parsley-id-2907"></ul>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">库存</label>
                                            <div class="col-sm-7">
                                                <input type="text" required="" class="form-control"
                                                       id="inputPassword3" placeholder="长度0~10" name="sku_num"
                                                       data-parsley-id="2907" maxlength="10" minlength="0">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">描述</label>
                                            <div class="col-sm-7">
                                                <textarea class="form-control" maxlength="255" placeholder="不超过255" name="desc"></textarea>
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
                        <div class="md-modal colored-header info md-effect-3" id="detail">
                            <div class="md-content">
                                <div class="modal-header">
                                    <h3>订单详情</h3>
                                    <button type="button" class="close md-close" data-dismiss="modal"
                                            aria-hidden="true">×
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="content">
                                        <table class="table-bordered hover">

                                            <tbody id="detail_info">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">

                                </div>
                            </div>
                        </div>
                        <div class="md-overlay"></div>
                        <div class="content">
                            <table class="table no-border hover">
                                <thead class="no-border">
                                <tr>
                                    <th>订单号</th>
                                    <th>红酒名称</th>
                                    <th class="">单价</th>
                                    <th>数量</th>
                                    <th>订单总价</th>
                                    <th>订单状态</th>
                                    <th class="text-right">操作</th>
                                </tr>
                                </thead>
                                <tbody class="no-border-y">
                                @foreach($alllist as $n)
                                    <tr>
                                        <td style="vertical-align: middle">{{$n->order_num}}</td>
                                        <td style="vertical-align: middle">{{$n->wine_name}}</td>
                                        <td style="vertical-align: middle">{{$n->price}}</td>
                                        <td style="vertical-align: middle">{{$n->wine_num}}</td>
                                        <td style="vertical-align: middle">{{$n->price * $n->wine_num}}</td>
                                        <td style="vertical-align: middle;color:red;">
                                            @if($n->order_status==0)
                                                未付款
                                            @elseif($n->order_status==1)
                                                <span style="color: #555">已付款</span>

                                            @endif
                                        </td>
                                        <td style="vertical-align: middle" class="text-right">
                                            {{--@if($n->status)

                                                <button type="button" class="disable btn btn-warning btn-rad" data-id="{{$n->id}}" onclick="disable(this)">禁用</button>
                                            @else
                                                <button type="button" class="enable btn btn-success btn-rad" data-id="{{$n->id}}" onclick="enable(this)">启用</button>
                                            @endif--}}

                                            {{--<button type="button" class="editw btn btn-info btn-rad md-trigger"
                                                    data-modal="edit" data-id="{{$n->id}}">编辑</button>--}}
                                            @if($n->order_status==0)
                                            <a href="{{url("/admin/pay/$n->id")}}"><button type="button" class="btn btn-primary btn-rad"
                                            >去付款</button></a>@endif
                                            <button type="button" class="btn btn-info btn-rad md-trigger detail"
                                                    data-modal="detail" data-id="{{$n->id}}">详情</button>
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
        /*添加*/
        $('#submit').click(function () {
            var wine_name = $("input[name='wine_name']").val();
            var price = $("input[name='price']").val();
            var sku_num = $("input[name='sku_num']").val();
            var desc = $("textarea[name='desc']").val();
            if(!wine_name.length){
                alertfail('红酒名称不能为空！');
                return false;
            }
            if(!price.length){
                alertfail('单价不能为空！');
                return false;
            }
            if(!sku_num.length){
                alertfail('库存不能为空！');
                return false;
            }
            if(isNaN(parseFloat(price))){
                alertfail('单价只能为数字！');
                return false;
            }
            if(isNaN(parseFloat(sku_num))){
                alertfail('库存只能为数字！');
                return false;
            }
            $.post('{{url('/admin/addwine')}}', {
                wine_name: wine_name,
                price: price,
                sku_num: sku_num,
                desc:desc,
                _token: "{{csrf_token()}}"
            }, function (data) {
                if (data.flag) {
                    alertsuccess(data.msg);
                    setTimeout(function () {
                        location.reload(true);
                    }, 1000);

                } else {
                    alertfail(data.msg);
                }
            }, 'json')

        })
        /*编辑*/
        $(".editw").click(function(){
            var id = $(this).attr('data-id');
            $.post("{{url('/admin/getoneinfo')}}",{id:id,
                _token: "{{csrf_token()}}"},function(data){
                if(data.flag){
                    $("input[name='wine_name_e']").val(data.data.wine_name);
                    $("input[name='price_e']").val(data.data.price);
                    $("input[name='sku_num_e']").val(data.data.sku_num);
                    $("textarea[name='desc_e']").val(data.data.description);
                    $("#submit_e").attr('data-id',data.data.id);

                }
            },'json')
        })

        $('#submit_e').click(function () {
            var wine_name = $("input[name='wine_name_e']").val();
            var price = $("input[name='price_e']").val();
            var sku_num = $("input[name='sku_num_e']").val();
            var desc = $("textarea[name='desc_e']").val();
            var id = $(this).attr('data-id');
            if(!wine_name.length){
                alertfail('红酒名称不能为空！');
                return false;
            }
            if(!price.length){
                alertfail('单价不能为空！');
                return false;
            }
            if(!sku_num.length){
                alertfail('库存不能为空！');
                return false;
            }
            if(isNaN(parseFloat(price))){
                alertfail('单价只能为数字！');
                return false;
            }
            if(isNaN(parseFloat(sku_num))){
                alertfail('库存只能为数字！');
                return false;
            }
            $.post('{{url('/admin/updwine')}}', {
                wine_name: wine_name,
                price: price,
                sku_num: sku_num,
                desc:desc,
                id:id,
                _token: "{{csrf_token()}}"
            }, function (data) {
                if (data.flag) {
                    alertsuccess(data.msg);
                    setTimeout(function () {
                        location.reload(true);
                    }, 1000);

                } else {
                    alertfail(data.msg);
                }
            }, 'json')

        })

   $(".detail").click(function(){
       var id = $(this).attr('data-id');
       var str = '';
       $.post("{{url('/admin/orderdetail')}}",{id:id,_token:"{{csrf_token()}}"},function(data){
            str = `<tr>
                        <td style="width:30%;" class="text-right">订单编号：</td>
                        <td class="text-center">`+data.data.order_num+`</td>

                    </tr>
                    <tr>
                        <td style="width:30%;" class="text-right">红酒名称：</td>
                        <td class="text-center">`+data.data.wine_name+`</td>

                    </tr>
                    <tr>
                        <td style="width:30%;" class="text-right">红酒单价(RMB)：</td>
                        <td class="text-center">`+data.data.price+`</td>

                    </tr>
                    <tr>
                        <td style="width:30%;" class="text-right">红酒数量：</td>
                        <td class="text-center">`+data.data.wine_num+`</td>

                    </tr>
                    <tr>
                        <td style="width:30%;" class="text-right">订单总价：</td>
                        <td class="text-center">`+data.data.total_price+`</td>

                    </tr>
                    <tr>
                        <td style="width:30%;" class="text-right">订单状态：</td>
                        <td class="text-center">`+data.data.order_status+`</td>

                    </tr>
                    <tr>
                        <td style="width:30%;" class="text-right">买家姓名：</td>
                        <td class="text-center">`+data.data.buy_name+`</td>

                    </tr>
                    <tr>
                        <td style="width:30%;" class="text-right">买家电话：</td>
                        <td class="text-center">`+data.data.buy_tel+`</td>

                    </tr>
                    <tr>
                        <td style="width:30%;" class="text-right">订单创建人：</td>
                        <td class="text-center">`+data.data.ad_name+`</td>

                    </tr>
                    <tr>
                        <td style="width:30%;" class="text-right">创建时间：</td>
                        <td class="text-center">`+data.data.create_time+`</td>

                    </tr>`;
           $("#detail_info").empty();
           $("#detail_info").append(str);


       },'json')
   })

    </script>
@endsection