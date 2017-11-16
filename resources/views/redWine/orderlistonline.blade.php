@extends('layouts.master')
@section('title')
    线上订单列表
@endsection
@section('online')
    active
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-head">
            <h2>线上订单列表</h2>
            <ol class="breadcrumb">
                <li><a href="#">首页</a></li>
                <li><a href="#">订单管理</a></li>
                <li class="active">线上订单列表</li>
            </ol>
        </div>
        <div class="cl-mcont" style="padding: 0">
            <div class="row">


                <div class="col-sm-12 col-md-12 column">


                    <div class="block-flat">
                        <div class="header">
                            {{--<h3>Full-Borders Table</h3>--}}
                            <button type="button" class="btn btn-info btn-rad btn-sm md-trigger " data-modal="excel">导入excel</button>




                        </div>
                        <div class="md-modal colored-header  info md-effect-3" id="excel">
                            <div class="md-content">
                                <div class="modal-header">
                                    <h3>选择Excel文件</h3>
                                    <button type="button" class="close md-close" data-dismiss="modal"
                                            aria-hidden="true">×
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="{{url('/admin/importexcel')}}"  enctype="multipart/form-data" method="post" id="import" class="form-horizontal">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">选择</label>
                                            <div class="col-sm-7">
                                                <input type="file"  class="form-control"
                                                        name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                                            </div>
                                        </div>
                                    </form>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-flat md-close"
                                            data-dismiss="modal">取消
                                    </button>
                                    <button type="submit" class="btn btn-primary btn-flat md-close"
                                            data-dismiss="modal" id="importexcel">确定
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
                                        <th>商品名</th>
                                        <th>商品总价</th>
                                        <th>商品数量</th>
                                        <th>实际支付</th>
                                        <th>运费</th>
                                        <th>收货人</th>
                                        <th>联系方式</th>
                                        <th>运送方式</th>
                                        <th>订单创建时间</th>
                                        <th>物流单号</th>
                                        <th>物流公司</th>
                                        {{--<th>操作</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody class="no-border-y">
                                    @foreach($list as $v)
                                        <tr>
                                            <td style="vertical-align: middle">{{$v->order_sn}}</td>
                                            <td style="vertical-align: middle">{{$v->goods_name}}</td>
                                            <td style="vertical-align: middle">{{$v->total_price}}</td>
                                            <td style="vertical-align: middle">{{$v->goods_num}}</td>
                                            <td style="vertical-align: middle">{{$v->real_pay}}</td>
                                            <td style="vertical-align: middle">{{$v->freight}}</td>
                                            <td style="vertical-align: middle;">{{$v->receiver_name}}</td>
                                            <td style="vertical-align: middle;">{{$v->mobile}}</td>
                                            <td style="vertical-align: middle">{{$v->send_way}}</td>
                                            <td style="vertical-align: middle">{{$v->order_cretime}}</td>
                                            <td style="vertical-align: middle">{{$v->logistics_num}}</td>
                                            <td style="vertical-align: middle">{{$v->logistics_company}}</td>
                                            {{--<td style="vertical-align: middle" class="text-right">

                                                <button type="button" class="btn btn-info btn-rad md-trigger detail btn-sm"
                                                        data-modal="detail" data-id="{{$v->id}}">详情</button>
                                            </td>--}}
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
                "aaSorting" : [[9, "desc"]]
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

        $("#importexcel").click(function(){
            var file = $("input[name=file]").val();
            if(!file.length){
                alertfail('请选择excel文件！');
                return false;
            }
            reg = /^.*\.(?:xls|xlsx)$/i;
            if(!reg.test(file)){
                alertfail('请选择.xls,.xlsx文件');
                return false;
            }
            $("#import").ajaxSubmit(function(message) {

                if(message){
                    alertsuccess('导入成功！');
                    location.reload(true);
                }else{
                    alertfail('导入失败！');
                }
            });
        })

    </script>
@endsection