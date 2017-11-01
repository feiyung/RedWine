@extends('layouts.master')
@section('title')
    销售订单
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-head">
            <h2>销售订单</h2>
            <ol class="breadcrumb">
                <li><a href="#">首页</a></li>
                <li><a href="#">订单管理</a></li>
                <li class="active">销售订单</li>
            </ol>
        </div>
        <div class="cl-mcont" style="padding: 0">
            <div class="row">


                <div class="col-sm-6 col-md-6 column col-md-offset-3">


                    <div class="block-flat">

                        <!--startprint1-->
                        <div class="content">

                            <table>
                                <thead class="no-border">
                                <tr>
                                    <th colspan="5" class="text-center">销售订单</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>订单编号：</td>
                                        <td colspan="2">{{$res->order_num}}</td>
                                        <td>创建时间：</td>
                                        <td>{{$res->create_time}}</td>
                                    </tr>
                                    <tr>
                                        <td>客户姓名</td>
                                        <td>客户电话</td>
                                        <td>客户地址</td>
                                        <td>订单状态</td>
                                        <td>付款方式</td>
                                    </tr>
                                    <tr>
                                        <td>{{$res->buy_name}}</td>
                                        <td>{{$res->buy_tel}}</td>
                                        <td>{{$res->buy_addr}}</td>
                                        <td>{{$res->order_status}}</td>
                                        <td>{{$res->pay_way}}</td>
                                    </tr>
                                    <tr>
                                        <td>红酒名称</td>
                                        <td>红酒数量(瓶)</td>
                                        <td>红酒单价(RMB)</td>
                                        <td>订单总价(RMB)</td>
                                        <td>未付金额(RMB)</td>
                                    </tr>
                                    <tr>
                                        <td>{{$res->wine_name}}</td>
                                        <td>{{$res->wine_num}}</td>
                                        <td>&yen;{{number_format($res->price)}}</td>
                                        <td>&yen;{{number_format($res->price * $res->wine_num)}}</td>
                                        <td>&yen;{{number_format($res->debt_price)}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">备注：</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"><br/></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">记账：</td>
                                        <td colspan="2">发货：</td>
                                        <td>制单：{{$res->ad_name}}</td>
                                    </tr>






                                </tbody>
                            </table>
                        </div>
                        <!--endprint1-->
                        <div class="row"><div class="pull-right" style="padding-right: 20px;">
                        <button type="button" class="btn btn-primary btn-rad"  onclick="preview(1)" style="margin-top: 20px;">打印</button>
                                </div></div>
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



        function preview(oper)
        {
            if (oper != 0){
                bdhtml=window.document.body.innerHTML;//获取当前页的html代码
                sprnstr="<!--startprint"+oper+"-->";//设置打印开始区域
                eprnstr="<!--endprint"+oper+"-->";//设置打印结束区域
                prnhtml=bdhtml.substring(bdhtml.indexOf(sprnstr)+18); //从开始代码向后取html
                prnhtml=prnhtml.substring(0,prnhtml.indexOf(eprnstr));//从结束代码向前取html
                window.document.body.innerHTML=prnhtml;
                window.print();
                window.document.body.innerHTML=bdhtml;
            } else {
                window.print();
            }
        }
    </script>
@endsection