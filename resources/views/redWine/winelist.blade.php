@extends('layouts.master')
@section('title')
    红酒列表
@endsection

@section('content')
    <div class="container-fluid">
        <div class="page-head">
            <h2>红酒列表</h2>
            <ol class="breadcrumb">
                <li><a href="#">首页</a></li>
                <li><a href="#">红酒管理</a></li>
                <li class="active">红酒列表</li>
            </ol>
        </div>
        <div class="cl-mcont" style="padding: 0">
            <div class="row">


                <div class="col-sm-12 col-md-12 column">

                    <div class="block-flat">
                        <div class="header">
                            {{--<h3>Full-Borders Table</h3>--}}

                            <button class="btn btn-primary btn-flat md-trigger btn-rad"
                                    data-modal="colored-success">添加红酒
                            </button>

                        </div>
                        <div class="md-modal colored-header primary md-effect-3" id="colored-success">
                            <div class="md-content">
                                <div class="modal-header">
                                    <h3>红酒信息</h3>
                                    <button type="button" class="close md-close" data-dismiss="modal"
                                            aria-hidden="true">×
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" role="form"  novalidate=""
                                          method="post" action="" id="addForm">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">红酒名称</label>
                                            <div class="col-sm-7">
                                                <input type="text" required=""
                                                       class="form-control" id="inputEmail3"
                                                       placeholder="长度不超过30" name="wine_name"
                                                       data-parsley-id="5250" maxlength="30" minlength="3">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-3 control-label">内部单价</label>
                                            <div class="col-sm-7">
                                                <input type="text" required="" class="form-control"
                                                       id="inputPassword3" placeholder="长度0~10" name="price_in"
                                                       data-parsley-id="2907" maxlength="10" minlength="0">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-3 control-label">线上单价</label>
                                            <div class="col-sm-7">
                                                <input type="text" required="" class="form-control"
                                                       id="inputPassword3" placeholder="长度0~10" name="price_line"
                                                       data-parsley-id="2907" maxlength="10" minlength="0">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-3 control-label">经销商单价</label>
                                            <div class="col-sm-7">
                                                <input type="text" required="" class="form-control"
                                                       id="inputPassword3" placeholder="长度0~10" name="price_c"
                                                       data-parsley-id="2907" maxlength="10" minlength="0">

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
                                    <button type="button" class="btn btn-primary btn-flat md-close"
                                            data-dismiss="modal" id="submit">提交
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="md-modal colored-header info md-effect-3" id="edit">
                            <div class="md-content">
                                <div class="modal-header">
                                    <h3>编辑红酒信息</h3>
                                    <button type="button" class="close md-close" data-dismiss="modal"
                                            aria-hidden="true">×
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" role="form"  novalidate=""
                                          method="post" action="" id="addForm">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">红酒名称</label>
                                            <div class="col-sm-7">
                                                <input type="text" required=""
                                                       class="form-control" id="inputEmail3"
                                                       placeholder="长度不超过30" name="wine_name_e"
                                                       data-parsley-id="5250" maxlength="30" minlength="3">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-3 control-label">内部单价</label>
                                            <div class="col-sm-7">
                                                <input type="text" required="" class="form-control"
                                                       id="inputPassword3" placeholder="长度0~10" name="price_in_e"
                                                       data-parsley-id="2907" maxlength="10" minlength="0">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-3 control-label">线上单价</label>
                                            <div class="col-sm-7">
                                                <input type="text" required="" class="form-control"
                                                       id="inputPassword3" placeholder="长度0~10" name="price_line_e"
                                                       data-parsley-id="2907" maxlength="10" minlength="0">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-3 control-label">经销商单价</label>
                                            <div class="col-sm-7">
                                                <input type="text" required="" class="form-control"
                                                       id="inputPassword3" placeholder="长度0~10" name="price_c_e"
                                                       data-parsley-id="2907" maxlength="10" minlength="0">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">库存</label>
                                            <div class="col-sm-7">
                                                <input type="text" required="" class="form-control"
                                                       id="inputPassword3" placeholder="长度0~10" name="sku_num_e"
                                                       data-parsley-id="2907" maxlength="10" minlength="0">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">描述</label>
                                            <div class="col-sm-7">
                                                <textarea class="form-control" maxlength="255" placeholder="不超过255" name="desc_e"></textarea>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-flat md-close"
                                            data-dismiss="modal">取消
                                    </button>
                                    <button type="button" class="btn btn-info btn-flat md-close"
                                            data-dismiss="modal" id="submit_e" data-id="">提交
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="md-modal colored-header warning md-effect-3" id="create_order">
                            <div class="md-content">
                                <div class="modal-header">
                                    <h3>创建订单</h3>
                                    <button type="button" class="close md-close" data-dismiss="modal"
                                            aria-hidden="true">×
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form class="form-horizontal" role="form"  novalidate=""
                                          method="post" action="" id="addForm">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">红酒名称</label>
                                            <div class="col-sm-7">
                                                <input type="text" readonly
                                                       class="form-control" id="inputEmail3"
                                                       placeholder="长度不超过30" name="wine_name_o"
                                                       data-parsley-id="5250" maxlength="30" minlength="3">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-3 control-label">单价</label>
                                            <div class="col-sm-7">
                                                <select class="form-control" name="price_o">
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                    <option value=""></option>
                                                    </select>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">红酒数量(瓶)</label>
                                            <div class="col-sm-7">
                                                <input type="text" required="" class="form-control"
                                                       id="inputPassword3" placeholder="长度不超过10位" name="wine_num"
                                                       data-parsley-id="2907" maxlength="10" minlength="0">
                                            </div>
                                        </div>
                                        {{--<div class="form-group">
                                            <label class="col-sm-3 control-label">客户姓名</label>
                                            <div class="col-sm-7">
                                                <input type="text" required="" class="form-control"
                                                       id="inputPassword3" placeholder="长度不超过10位" name="buy_name"
                                                       data-parsley-id="2907" maxlength="10" minlength="0">
                                            </div>
                                        </div>--}}
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label">选择客户</label>
                                            <input type="hidden" required="" class="form-control"
                                                   id="inputPassword3" placeholder="长度不超过10位" name="buy_name"
                                                   data-parsley-id="2907" maxlength="10" minlength="0">

                                                <input type="hidden" required="" class="form-control"
                                                       id="inputPassword3" placeholder="长度不超过11位" name="buy_tel"
                                                       data-parsley-id="2907" maxlength="11" minlength="0">

                                            <div class="col-sm-7">
                                                <select class="form-control" name="customer">
                                                    <option value=""></option>
                                                    @foreach($customerlist as $c)
                                                        <option value="{{$c->id}}" data-tel="{{$c->cus_tel}}" data-name="{{$c->cus_name}}">{{$c->cus_name}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <input type="hidden" value="" name="cus_id">
                                        </div>


                                        {{--<div class="form-group">
                                            <label class="col-sm-3 control-label">已有客户</label>
                                            <div class="col-sm-7">
                                                <div class="panel-group accordion" id="accordion">

                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" style="padding: 7px 16px">
                                                                    <i class="fa fa-angle-right"></i> 选择
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div id="collapseThree" class="panel-collapse collapse">
                                                            <div class="panel-body">
                                                                <div class="form-group">


                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>--}}
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-flat md-close"
                                            data-dismiss="modal">取消
                                    </button>
                                    <button type="button" class="btn btn-warning btn-flat md-close"
                                            data-dismiss="modal" id="submit_o" data-id="">提交
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
                                    <th>红酒名称</th>
                                    <th >内部单价(RMB)</th>
                                    <th >线上单价(RMB)</th>
                                    <th >经销商单价(RMB)</th>
                                    <th>销量(瓶)</th>
                                    <th>库存(瓶)</th>
                                    <th>描述</th>
                                    <th class="text-right">操作</th>
                                </tr>
                                </thead>
                                <tbody class="no-border-y">
                                @foreach($alllist as $n)
                                    <tr>
                                        <td style="vertical-align: middle">{{$n->id}}</td>
                                        <td style="vertical-align: middle">{{$n->wine_name}}</td>
                                        <td style="vertical-align: middle">&yen;{{number_format($n->price)}}</td>
                                        <td style="vertical-align: middle">&yen;{{number_format($n->price_line)}}</td>
                                        <td style="vertical-align: middle">&yen;{{number_format($n->price_c)}}</td>
                                        <td style="vertical-align: middle">{{$n->sales_num}}</td>
                                        <td style="vertical-align: middle">{{$n->sku_num}}</td>
                                        <td style="vertical-align: middle">{{$n->description}}</td>
                                        <td style="vertical-align: middle" class="text-right">
                                            {{--@if($n->status)

                                                <button type="button" class="disable btn btn-warning btn-rad" data-id="{{$n->id}}" onclick="disable(this)">禁用</button>
                                            @else
                                                <button type="button" class="enable btn btn-success btn-rad" data-id="{{$n->id}}" onclick="enable(this)">启用</button>
                                            @endif--}}

                                                <button type="button" class="editw btn btn-info btn-rad md-trigger btn-sm" data-modal="edit" data-id="{{$n->id}}">编辑</button>
                                            <button type="button" class="btn btn-warning btn-rad md-trigger createw btn-sm" data-modal="create_order" data-id="{{$n->id}}">创建订单</button>
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
            var price_in = $("input[name='price_in']").val();//内部价
            var price_line = $("input[name='price_line']").val();//线上价
            var price_c = $("input[name='price_c']").val();//经销商价
            var sku_num = $("input[name='sku_num']").val();
            var desc = $("textarea[name='desc']").val();
            if(!wine_name.length){
                alertfail('红酒名称不能为空！');
                return false;
            }
            var reg_price = /^[1-9]\d*\.?\d{0,2}$/;
            if(!reg_price.test(price_in)){
                alertfail('请输入有效数字价格！');
                return false;
            }
            if(!reg_price.test(price_line)){
                alertfail('请输入有效数字价格！');
                return false;
            }
            if(!reg_price.test(price_c)){
                alertfail('请输入有效数字价格！');
                return false;
            }
            var reg_sku = /^[1-9]\d*$/;
            if(!reg_sku.test(sku_num)){
                alertfail('请输入有效库存！');
                return false;
            }

            $.post('{{url('/admin/addwine')}}', {
                wine_name: wine_name,
                price_c: price_c,
                price_in:price_in,
                price_line:price_line,
                sku_num: sku_num,
                desc:desc,
                _token: "{{csrf_token()}}"
            }, function (data) {
                if (data.flag) {
                    alertsuccess(data.msg);
                    setTimeout(function () {
                        location.href="{{url('/admin/winelist')}}";
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
                        $("input[name='price_c_e']").val(data.data.price_c);
                        $("input[name='price_line_e']").val(data.data.price_line);
                        $("input[name='price_in_e']").val(data.data.price);
                        $("input[name='sku_num_e']").val(data.data.sku_num);
                        $("textarea[name='desc_e']").val(data.data.description);
                        $("#submit_e").attr('data-id',data.data.id);

                    }
            },'json')
        })

        $('#submit_e').click(function () {
            var wine_name = $("input[name='wine_name_e']").val();
            var price_in = $("input[name='price_in_e']").val();//内部价
            var price_line = $("input[name='price_line_e']").val();//线上价
            var price_c = $("input[name='price_c_e']").val();//经销商价
            var sku_num = $("input[name='sku_num_e']").val();
            var desc = $("textarea[name='desc_e']").val();
            var id = $(this).attr('data-id');
            if(!wine_name.length){
                alertfail('红酒名称不能为空！');
                return false;
            }
            var reg_price = /^[1-9]\d*\.?\d{0,2}$/;
            if(!reg_price.test(price_in)){
                alertfail('请输入有效数字价格！');
                return false;
            }
            if(!reg_price.test(price_line)){
                alertfail('请输入有效数字价格！');
                return false;
            }
            if(!reg_price.test(price_c)){
                alertfail('请输入有效数字价格！');
                return false;
            }
            var reg_sku = /^[1-9]\d*$/;
            if(!reg_sku.test(sku_num)){
                alertfail('请输入有效库存！');
                return false;
            }
            $.post('{{url('/admin/updwine')}}', {
                wine_name: wine_name,
                price_c: price_c,
                price_in:price_in,
                price_line:price_line,
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
        /*创建订单*/
        $(".createw").click(function(){
            var id = $(this).attr('data-id');
            $.post("{{url('/admin/getoneinfo')}}",{id:id,
                _token: "{{csrf_token()}}"},function(data){
                if(data.flag){
                    $("input[name='wine_name_o']").val(data.data.wine_name);
                    $("select[name='price_o'] option").eq(0).val(data.data.price).html('内部价：&yen;'+data.data.price);
                    $("select[name='price_o'] option").eq(1).val(data.data.price_line).html('线上价：&yen;'+data.data.price_line);
                    $("select[name='price_o'] option").eq(2).val(data.data.price_c).html('经销商价:&yen;'+data.data.price_c);
                    $("#submit_o").attr('data-id',data.data.id);

                }
            },'json')
        });

//        function checkcus(t){alert();
//            $("input[name='buy_name']").val($(t).attr('data-name'));
//            $("input[name='buy_tel']").val($(t).attr('data-tel'));
//        }
        $("select[name='customer']").change(function(){
            $("input[name='buy_name']").val($("select[name='customer'] option:selected").attr('data-name'));
            $("input[name='buy_tel']").val($("select[name='customer'] option:selected").attr('data-tel'));
            $("input[name='cus_id']").val($(this).val())
        })
        $('#submit_o').click(function () {
            var wine_name = $("input[name='wine_name_o']").val();
            var price = $("select[name='price_o']").val();
            var wine_num = $("input[name='wine_num']").val();
            var buy_name = $("input[name='buy_name']").val();
            var buy_tel = $("input[name='buy_tel']").val();
            var id = $(this).attr('data-id');
            var cus_id = $("input[name='cus_id']").val();
            $("input[name='cus_id']").val('');
            if(!wine_name.length){
                alertfail('红酒名称不能为空！');
                return false;
            }

            var reg_price = /^[1-9]\d*\.?\d{0,2}$/;
            if(!reg_price.test(price)){
                alertfail('请输入有效数字价格！');
                return false;
            }
            var reg_sku = /^[1-9]\d*$/;
            if(!reg_sku.test(wine_num)){
                alertfail('请输入不大于库存的数值！');
                return false;
            }

            if(!buy_name.length){
                alertfail('客户姓名不能为空！');
                return false;
            }
            re = /^1[34578][0-9]{9}$/
            if (!re.test(buy_tel)) {

                alertfail("请输入合法手机号！");
                return false;
            }



            $.post('{{url('/admin/createorder')}}', {
                wine_name: wine_name,
                price: price,
                wine_num:wine_num,
                buy_name:buy_name,
                buy_tel:buy_tel,
                id:id,
                cus_id:cus_id,
                _token: "{{csrf_token()}}"
            }, function (data) {
                if (data.flag) {
                    alertsuccess(data.msg);
                    setTimeout(function () {
                        location.href="{{url('/admin/orderlist')}}";
                    }, 1000);

                } else {
                    alertfail(data.msg);
                }
            }, 'json')

        });


    </script>
@endsection