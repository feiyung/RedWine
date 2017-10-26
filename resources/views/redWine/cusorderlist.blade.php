@extends('layouts.master')
@section('title')
    {{$info->cus_name}}的订单列表
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-head">
            <h2>{{$info->cus_name}}的订单列表</h2>
            <ol class="breadcrumb">
                <li><a href="#">首页</a></li>
                <li><a href="#">客户管理</a></li>
                <li class="active">{{$info->cus_name}}的订单列表</li>
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

                        <div class="content">
                            <table class="table no-border hover">
                                <thead class="no-border">
                                <tr>
                                    <th>所有订单数</th>
                                    <th>已付款订单数</th>
                                    <th class="">未付款订单数</th>
                                    <th>消费总金额</th>
                                    <th>已付金额</th>
                                    <th>未付金额</th>
                                    <th>退货退款数</th>
                                    <th class="text-right">操作</th>
                                </tr>
                                </thead>
                                <tbody class="no-border-y">

                                <tr>
                                    <td style="vertical-align: middle">{{$countall}}</td>
                                    <td style="vertical-align: middle">{{$countyes}}</td>
                                    <td style="vertical-align: middle">{{$countno}}</td>
                                    <td style="vertical-align: middle">&yen;{{number_format($money['all'])}}</td>
                                    <td style="vertical-align: middle">&yen;{{number_format($money['all']-$money['debt'])}}</td>
                                    <td style="vertical-align: middle;color:red">&yen;{{number_format($money['debt'])}}</td>
                                    <td style="vertical-align: middle;">
                                        {{$countre}}
                                    </td>
                                    <td style="vertical-align: middle" class="text-right">

                                        @if($money['debt'])
                                            <button type="button" class="btn btn-primary btn-rad btn-sm md-trigger pay_way" data-modal="paydebt" data-id="">付款</button>
                                        @endif


                                    </td>
                                </tr>



                                </tbody>
                            </table>
                        </div>

                    </div>


                    <div class="block-flat">
                        <div class="header">
                            {{--<h3>Full-Borders Table</h3>--}}

                            {{--<button class="btn btn-success btn-flat md-trigger btn-rad btn-lg"
                                    data-modal="colored-success">添加红酒
                            </button>--}}

                        </div>
                        <div class="md-modal colored-header  primary md-effect-3" id="payway">
                            <div class="md-content">
                                <div class="modal-header">
                                    <h3>支付方式</h3>
                                    <button type="button" class="close md-close" data-dismiss="modal"
                                            aria-hidden="true">×
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form class="form-horizontal group-border-dashed" action="#" style="border-radius: 0px;">


                                        <div class="form-group">
                                            {{--<label class="col-sm-3 control-label">Inline Radio</label>--}}
                                            <div class="col-sm-12">

                                                <div class="radio">
                                                    <label> <input type="radio" checked name="payway" class="icheck" value="1"> 支付宝</label>
                                                </div>
                                                <div class="radio">
                                                    <label> <input type="radio" name="payway" class="icheck" value="2"> 现金<input type="text" placeholder="输入金额" maxlength="10" name="pay_price"></label>
                                                </div>
                                                <div class="radio">
                                                    <label> <input type="radio" name="payway" class="icheck" value="3"> 赊账</label>
                                                </div>
                                            </div>
                                        </div>

                                    </form>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-flat md-close"
                                            data-dismiss="modal">取消
                                    </button>
                                    <button type="button" class="btn btn-primary btn-flat md-close"
                                            data-dismiss="modal" id="submit">确定
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="md-modal colored-header  primary md-effect-3" id="paydebt">
                            <div class="md-content">
                                <div class="modal-header">
                                    <h3>支付</h3>
                                    <button type="button" class="close md-close" data-dismiss="modal"
                                            aria-hidden="true">×
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form class="form-horizontal group-border-dashed" action="#" style="border-radius: 0px;">


                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">支付金额</label>
                                            <div class="col-sm-7">


                                                    <input type="email" required="" class="form-control" id="inputEmail3" placeholder="未付金额{{number_format($money['debt'])}}" name="repaydebt" data-parsley-id="5250" maxlength="10" >


                                            </div>
                                        </div>

                                    </form>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-flat md-close"
                                            data-dismiss="modal">取消
                                    </button>
                                    <button type="button" class="btn btn-primary btn-flat md-close"
                                            data-dismiss="modal" id="submit_debt" data-id="{{$id}}">确定
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
                                    <th class="">单价(RMB)</th>
                                    <th>数量(瓶)</th>
                                    <th>订单总价</th>
                                    <th>未付金额</th>
                                    <th>买家姓名</th>
                                    <th>订单状态</th>
                                    <th class="text-right">操作</th>
                                </tr>
                                </thead>
                                <tbody class="no-border-y">
                                @foreach($list as $n)
                                    <tr>
                                        <td style="vertical-align: middle">{{$n->order_num}}</td>
                                        <td style="vertical-align: middle">{{$n->wine_name}}</td>
                                        <td style="vertical-align: middle">&yen;{{number_format($n->price)}}</td>
                                        <td style="vertical-align: middle">{{$n->wine_num}}</td>
                                        <td style="vertical-align: middle">&yen;{{number_format($n->price * $n->wine_num)}}</td>
                                        <td style="vertical-align: middle;color:red">&yen;{{number_format($n->debt_price)}}</td>
                                        <td style="vertical-align: middle">{{$n->buy_name}}</td>
                                        <td style="vertical-align: middle;color:red;">
                                            @if($n->order_status==0)
                                                未付款
                                            @elseif($n->order_status==1)
                                                <span style="color: #555">已付款</span>
                                            @elseif($n->order_status==2)
                                                退货退款
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
                                                <button type="button" class="btn btn-primary btn-rad btn-sm md-trigger pay_way" data-modal="payway" data-id="{{$n->id}}">付款方式</button>
                                                {{--            @elseif($n->order_status==0 && $n->pay_way==3)
                                                                <button type="button" class="btn btn-danger btn-rad btn-sm">确认收款</button>--}}
                                            @elseif($n->order_status==1)
                                                <button type="button" class="btn btn-warning btn-rad btn-sm reject" data-id="{{$n->id}}">退货退款</button>
                                            @endif
                                            <button type="button" class="btn btn-info btn-rad md-trigger detail btn-sm"
                                                    data-modal="detail" data-id="{{$n->id}}">详情</button>
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

        /*付款方式*/
        /*$(".pay_way").click(function(){
            var id = $(this).attr('data-id');
            $("#submit").attr('data-id',id);
        })*/
        /*$(".radio-inline").click(function(){
         var payway = $(this).children().children('input').val();
         if(payway==2){
         price = prompt("输入付款金额","");
         }
         })*/

        $('#submit').click(function () {
            var payway = $("input[name='payway']:checked").val();
            var pay_price = $("input[name='pay_price']").val();
            if(payway==2){
                var reg_price = /^[1-9]\d*\.?\d{0,2}$/;
                if(!reg_price.test(pay_price)){
                    alertfail('请输入付款金额！');
                    return false;
                }
            }

            var id = $(this).attr('data-id');

            $.post('{{url('/admin/payway')}}', {
                pay_way: payway,
                pay_price:pay_price,
                id:id,
                _token: "{{csrf_token()}}"
            }, function (data) {

                if(data.data.pay_way==1){

                    location.href='/admin/pay/'+data.data.id;
                }else if(data.data.pay_way==2){
                    alertsuccess('成功支付'+data.data.pay_price+'元');
                    setTimeout(function () {
                        location.reload(true);
                    }, 1000);
                }
                if(data.flag==0){
                    alertfail(data.msg);
                }


            }, 'json')

        })
        /*退货退款*/
        $(".reject").click(function(){
            var id = $(this).attr('data-id');
            $.post('{{url("/admin/reject")}}',{id:id,_token:"{{csrf_token()}}"},function(data){
                if(data.flag){
                    alertsuccess(data.msg);
                    setTimeout(function () {
                        location.reload(true);
                    }, 1000);
                }
            },'json')
        })
        /*订单详情*/
        $(".detail").click(function(){
            var id = $(this).attr('data-id');
            var str = '';
            $("#detail_info").empty();
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
                        <td style="width:30%;" class="text-right">红酒数量(瓶)：</td>
                        <td class="text-center">`+data.data.wine_num+`</td>

                    </tr>
                    <tr>
                        <td style="width:30%;" class="text-right">红酒单价(RMB)：</td>
                        <td class="text-center">&yen;`+data.data.price+`</td>

                    </tr>
                    <tr>
                        <td style="width:30%;" class="text-right">订单总价(RMB)：</td>
                        <td class="text-center">&yen;`+data.data.total_price+`</td>

                    </tr>
                    <tr>
                        <td style="width:30%;" class="text-right">未付金额(RMB)：</td>
                        <td class="text-center" style="color:red">&yen;`+data.data.debt_price+`</td>

                    </tr>
                    <tr>
                        <td style="width:30%;" class="text-right">订单状态：</td>
                        <td class="text-center">`+data.data.order_status+`</td>

                    </tr>

                    <tr>
                        <td style="width:30%;" class="text-right">付款方式：</td>
                        <td class="text-center">`+data.data.pay_way+`</td>

                    </tr>
                    <tr>
                        <td style="width:30%;" class="text-right">客户姓名：</td>
                        <td class="text-center">`+data.data.buy_name+`</td>

                    </tr>
                    <tr>
                        <td style="width:30%;" class="text-right">客户电话：</td>
                        <td class="text-center">`+data.data.buy_tel+`</td>

                    </tr>
                    <tr>
                        <td style="width:30%;" class="text-right">客户地址：</td>
                        <td class="text-center">`+data.data.buy_addr+`</td>

                    </tr>
                    <tr>
                        <td style="width:30%;" class="text-right">订单创建人：</td>
                        <td class="text-center">`+data.data.ad_name+`</td>

                    </tr>
                    <tr>
                        <td style="width:30%;" class="text-right">创建时间：</td>
                        <td class="text-center">`+data.data.create_time+`</td>

                    </tr>`;
                $("#detail_info").append(str);


            },'json')
        })


        /*抵账*/
        $("#submit_debt").click(function(){
            var repaydebt = $("input[name='repaydebt']").val();
            var id = $(this).attr('data-id');
            var reg_price = /^[1-9]\d*\.?\d{0,2}$/;
            if(!reg_price.test(repaydebt)){
                alertfail('请输入付款金额！');
                return false;
            }

            $.post('{{url("/admin/repay")}}',{id:id,repaydebt:repaydebt,_token:"{{csrf_token()}}"},function(data){
                if(data.flag==1){
                    alertsuccess('成功支付'+data.data.debt+'元');
                    setTimeout(function () {
                        location.reload(true);
                    }, 2000);
                }else if(data.flag==0){
                    alertfail(data.msg);
                }
            },'json')
        })

    </script>
@endsection