@extends('layouts.master')
@section('title')
    线下订单列表
@endsection
@section('offline')
    active
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-head">
            <h2>线下订单列表</h2>
            <ol class="breadcrumb">
                <li><a href="#">首页</a></li>
                <li><a href="#">订单管理</a></li>
                <li class="active">线下订单列表</li>
            </ol>
        </div>
        <div class="cl-mcont" style="padding: 0">
            <div class="row">


                <div class="col-sm-12 col-md-12 column">


                    <div class="block-flat">
                        <div class="header">
                            {{--<h3>Full-Borders Table</h3>--}}
                            <button type="button" class="btn btn-info btn-rad btn-sm md-trigger " data-modal="excel">导出到excel</button>
                            <button type="button" class="btn btn-info btn-rad btn-sm md-trigger " data-modal="time_range">分时查看</button>



                        </div>
                        <div class="md-modal colored-header  info md-effect-3" id="excel">
                            <div class="md-content">
                                <div class="modal-header">
                                    <h3>选择时间范围</h3>
                                    <button type="button" class="close md-close" data-dismiss="modal"
                                            aria-hidden="true">×
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form class="form-horizontal group-border-dashed" action="{{url('/admin/excel')}}" style="border-radius: 0px;" id="getexcel" method="get">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">
                                                时间范围
                                            </label>
                                            <div class="col-sm-6">
                                                <fieldset>
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <div class="input-prepend input-group">
                                                                <span class="add-on input-group-addon primary"><span class="glyphicon glyphicon-th"></span></span><input type="text" style="width: 200px" name="timerange" id="reservation" class="form-control" value="2017/10/01 - 2017/10/31" readonly/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </form>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-flat md-close"
                                            data-dismiss="modal">取消
                                    </button>
                                    <button type="submit" class="btn btn-primary btn-flat md-close"
                                            data-dismiss="modal" id="downexcel">确定
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="md-modal colored-header  info md-effect-3" id="time_range">
                            <div class="md-content">
                                <div class="modal-header">
                                    <h3>选择时间</h3>
                                    <button type="button" class="close md-close" data-dismiss="modal"
                                            aria-hidden="true">×
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form class="form-horizontal" action="{{url('/admin/scan/range')}}" style="border-radius: 0px;" id="scan" method="get">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">
                                                时间范围
                                            </label>
                                            <div class="col-sm-6">
                                                <fieldset>
                                                    <div class="control-group">
                                                        <div class="controls">
                                                            <div class="input-prepend input-group">
                                                                <span class="add-on input-group-addon primary"><span class="glyphicon glyphicon-th"></span></span><input type="text" style="width: 200px" name="timerange" id="reservationss" class="form-control" value="" readonly/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                        {{--<div class="form-group">
                                            <label class="col-sm-3 control-label">
                                                快捷筛选
                                            </label>
                                            <div class="col-sm-6">
                                                <a href="{{url('admin/orderlist')}}"><button type="button" class="btn btn-info btn-rad btn-sm ">全部</button></a>
                                                <a href="{{url('admin/scan/today')}}"><button type="button" class="btn btn-info btn-rad btn-sm ">今天</button></a>
                                                    <a href="{{url('admin/scan/month')}}"><button type="button" class="btn btn-info btn-rad btn-sm ">本月</button></a>
                                                        <a href="{{url('admin/scan/year')}}"><button type="button" class="btn btn-info btn-rad btn-sm ">本年</button></a>
                                            </div>
                                        </div>--}}
                                    </form>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-flat md-close"
                                            data-dismiss="modal">取消
                                    </button>
                                    <button type="submit" class="btn btn-primary btn-flat md-close"
                                            data-dismiss="modal" id="goscan">确定
                                    </button>
                                </div>
                            </div>
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
                                <div class="modal-footer" id="print">

                                </div>
                            </div>
                        </div>
                        <div class="md-overlay"></div>
                        {{--<div class="tab-container">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#">Home</a></li>
                                <li><a href="#" style="color: #555">Profile</a></li>
                                <li><a href="#" style="color: #555">Messages</a></li>
                            </ul>
                        </div>--}}
                        <div class="content">
                            <div class="table-responsive">
                            <table class="table no-border hover" id="datatable-icons">
                                <thead class="no-border">
                                <tr>
                                    <th>订单号</th>
                                    <th>三联单号</th>
                                    <th>红酒名称</th>
                                    <th class="">单价(RMB)</th>
                                    <th>数量(瓶)</th>
                                    <th>订单总价</th>
                                    <th>未付金额</th>
                                    <th>买家姓名</th>
                                    <th>订单状态</th>
                                    <th>创建时间</th>

                                    <th class="text-right">操作</th>
                                </tr>
                                </thead>
                                <tbody class="no-border-y">
                                @foreach($alllist as $n)
                                    <tr>
                                        <td style="vertical-align: middle">{{$n->order_num}}</td>
                                        <td style="vertical-align: middle">{{$n->san_num}}</td>
                                        <td style="vertical-align: middle">{{$n->wine_name}}</td>
                                        <td style="vertical-align: middle">&yen;{{number_format($n->price)}}</td>
                                        <td style="vertical-align: middle">{{$n->wine_num}}</td>
                                        <td style="vertical-align: middle">&yen;{{number_format($n->price * $n->wine_num)}}</td>
                                        <td style="vertical-align: middle;color:red">&yen;{{number_format($n->debt_price )}}</td>
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
                                        <td style="vertical-align: middle">{{date('Y-m-d H:i',$n->create_time)}}</td>
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
                            <div class="row"><div class="pull-right" style="padding-right: 20px;">{{$alllist->links()}}</div></div>
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

        $(function(){
            //Horizontal Icons dataTable
            var config = {
                "oLanguage": {
                    "sLengthMenu": "每页显示 _MENU_ 条记录",
                    "sZeroRecords": "抱歉， 没有找到",
                    "sInfo": "从 _START_ 到 _END_ /共 _TOTAL_ 条数据",
                    "sInfoEmpty": "没有数据",
                    "sInfoFiltered": "(从 _MAX_ 条数据中检索)",
                    "oPaginate": {
                        "sFirst": "首页",
                        "sPrevious": "前一页",
                        "sNext": "后一页",
                        "sLast": "尾页"
                    }},
                "bPaginate" : false,
                "bInfo":false,
                "iDisplayLength":50,
                "aaSorting" : [[9, "desc"]],
            };
            $('#datatable-icons').dataTable(config);
            $('.dataTables_filter input').addClass('form-control').attr('placeholder','本页搜索');
            $('.dataTables_length select').addClass('form-control');
        })

        /*付款方式*/
        $(".pay_way").click(function(){
            var id = $(this).attr('data-id');
            $("#submit").attr('data-id',id);
        })
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
            if(!confirm('你确定确定退货吗？操作后不可逆')){
                return false;
            }
            var id = $(this).attr('data-id');
            $.post('{{url("/admin/reject")}}',{id:id,_token:"{{csrf_token()}}"},function(data){
                    if(data){
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
       var print = '';

       $("#detail_info").empty();
       $("#print").empty();
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
           print = '<a href="/admin/orderdetail/'+data.data.id+'"><button type="button" class="btn btn-info btn-rad btn-sm">打印订单</button></a>';
           $("#detail_info").append(str);
           $("#print").append(print);


       },'json')
   })

        $("#downexcel").click(function(){
            $("#getexcel").submit();
        })
        $("#goscan").click(function(){
            $("#scan").submit();

        })

$(function(){
    $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        format: 'MM/DD/YYYY h:mm A'
    });
    var cb = function(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + "]");
    }

    var optionSet1 = {
        startDate: moment().subtract('days', 29),
        endDate: moment(),
        minDate: '2017/01/01',
        maxDate: '2050/12/31',
        dateLimit: { days: 365*10 },
        showDropdowns: true,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
            '今天': [moment(), moment()],
            '昨天': [moment().subtract('days', 1), moment().subtract('days', 1)],
            '最近七天': [moment().subtract('days', 6), moment()],
            '最近30天': [moment().subtract('days', 29), moment()],
            '本月': [moment().startOf('month'), moment().endOf('month')],
            '上月': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
        },
        opens: 'left',
        buttonClasses: ['btn'],
        applyClass: 'btn-small btn-primary',
        cancelClass: 'btn-small',
        format: 'YYYY/MM/DD',
        separator: ' - ',
        locale: {
            applyLabel: '确定',
            cancelLabel: '取消',
            fromLabel: '开始日期',
            toLabel: '结束日期',
            customRangeLabel: '自定义',
            daysOfWeek: ['日', '一', '二', '三', '四', '五','六'],
            monthNames: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
            firstDay: 1
        }
    };

    var optionSet2 = {
        startDate: moment().subtract('days', 7),
        endDate: moment(),
        opens: 'left',
        ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
            'Last 7 Days': [moment().subtract('days', 6), moment()],
            'Last 30 Days': [moment().subtract('days', 29), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
        }
    };

    $('#reportrange span').html(moment().subtract('days', 29).format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));

    $('#reportrange').daterangepicker(optionSet1, cb);
    $('#reservation').daterangepicker(optionSet1);
    $('#reservationss').daterangepicker(optionSet1);


})
    </script>
@endsection