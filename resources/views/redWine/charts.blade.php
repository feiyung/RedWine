@extends('layouts.master')
@section('title')
    销量统计
@endsection

@section('content')
    <div class="container">
        <div class="cl-mcont">



            <div class="row dash-cols">

                <div class="col-sm-12 col-md-12">
                    <div class="block">
                        <div class="header no-border">
                            <h2 class="sales">月销量(瓶)</h2>
                        </div>
                        <div class="content blue-chart"  data-step="3" data-intro="<strong>Unique Styled Plugins</strong> <br/> We put love in every detail to give a great user experience!.">
                            <div id="site_statistics" style="height:180px;"></div>
                        </div>
                        <div class="content">
                            <div class="stat-data">
                                <div class="stat-blue">
                                    <h2 class="total_sales">{{$sales}}</h2>
                                    <span class="des_sales">年销量(瓶)</span>
                                </div>
                            </div>
                            <div class="stat-data">
                                <div class="stat-number">
                                    <div class="col-sm-12">
                                        <select  name="years">
                                            <option>2017</option>
                                            <option>2018</option>
                                            <option>2019</option>
                                            <option>2020</option>
                                            <option>2021</option>
                                        </select>年
                                        <select  name="months">
                                            <option value="">全年</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                            <option>11</option>
                                            <option>12</option>
                                        </select>月
                                        <select  name="goods">
                                            <option value="">所有产品</option>
                                            @foreach($list as $v)
                                            <option value="{{$v->id}}">{{$v->wine_name}}</option>
                                            @endforeach
                                        </select>选择产品
                                        <br/><br/>
                                        {{--<input type="text" class="form-control" name="dates">--}}

                    <button class="btn btn-primary" type="button" style="margin-left: 0" id="submit">查询</button>
                                    </div>
                                </div>
                                {{--<div class="stat-number">
                                    <div><h2>57</h2></div>
                                    <div>Views<br /><span>(Daily)</span></div>
                                </div>--}}
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12">
                    <div class="block">
                        <div class="header no-border">
                            <h2 class="money">月销售额</h2>
                        </div>
                        <div class="content blue-chart"  data-step="3" data-intro="<strong>Unique Styled Plugins</strong> <br/> We put love in every detail to give a great user experience!.">
                            <div id="money" style="height:180px;"></div>
                        </div>
                        <div class="content">
                            <div class="stat-data">
                                <div class="stat-blue">
                                    <h2 class="total_money">&yen;{{$money}}</h2>
                                    <span class="des_money">年销售额</span>
                                </div>
                            </div>
                            <div class="stat-data">
                                <div class="stat-number">
                                    <div class="col-sm-12">
                                        <select  name="years_m">
                                            <option>2017</option>
                                            <option>2018</option>
                                            <option>2019</option>
                                            <option>2020</option>
                                            <option>2021</option>
                                        </select>年
                                        <select  name="months_m">
                                            <option value="">全年</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                            <option>11</option>
                                            <option>12</option>
                                        </select>月
                                        <select  name="goods_m">
                                            <option value="">所有产品</option>
                                            @foreach($list as $v)
                                                <option value="{{$v->id}}">{{$v->wine_name}}</option>
                                            @endforeach
                                        </select>选择产品
                                        <br/><br/>
                                        {{--<input type="text" class="form-control" name="dates">--}}

                                        <button class="btn btn-primary" type="button" style="margin-left: 0" id="submit_m">查询</button>
                                    </div>
                                </div>
                                {{--<div class="stat-number">
                                    <div><h2>57</h2></div>
                                    <div>Views<br /><span>(Daily)</span></div>
                                </div>--}}
                            </div>
                            <div class="clear"></div>
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

            pageviews = {{$result}};
            dashboard(pageviews);
            res = {{$resu}}
            dashboard_m(res);
        })
        /*DASHBOARD*/
        function dashboard(pageviews){


            /*Dashboard Charts*/
            if (!jQuery.plot) {
                return;
            }
            var data = [];
            var totalPoints = 250;
            // random data generator for plot charts

            function getRandomData() {
                if (data.length > 0) data = data.slice(1);
                // do a random walk
                while (data.length < totalPoints) {
                    var prev = data.length > 0 ? data[data.length - 1] : 50;
                    var y = prev + Math.random() * 10 - 5;
                    if (y < 0) y = 0;
                    if (y > 100) y = 100;
                    data.push(y);
                }
                // zip the generated y values with the x values
                var res = [];
                for (var i = 0; i < data.length; ++i) res.push([i, data[i]])
                return res;
            }

            function showTooltip(x, y, contents) {
                $("<div id='tooltip'>" + contents + "</div>").css({
                    position: "absolute",
                    display: "none",
                    top: y + 5,
                    left: x + 5,
                    border: "1px solid #000",
                    padding: "5px",
                    'color':'#fff',
                    'border-radius':'2px',
                    'font-size':'11px',
                    "background-color": "#000",
                    opacity: 0.80
                }).appendTo("body").fadeIn(200);
            }

            function randValue() {
                return (Math.floor(Math.random() * (1 + 50 - 20))) + 10;
            }

            /*pageviews = [
             [1, randValue()],
             [2, randValue()],
             [3, 2 + randValue()],
             [4, 3 + randValue()],
             [5, 5 + randValue()],
             [6, 10 + randValue()],
             [7, 15 + randValue()],
             [8, 20 + randValue()],
             [9, 25 + randValue()],
             [10, 30 + randValue()],
             [11, 35 + randValue()],
             [12, 25 + randValue()],
             [13, 15 + randValue()],
             [14, 20 + randValue()],
             [15, 45 + randValue()],
             [16, 50 + randValue()],
             [17, 65 + randValue()],
             [18, 70 + randValue()],
             [19, 85 + randValue()],
             [20, 80 + randValue()],
             [21, 75 + randValue()],
             [22, 80 + randValue()],
             [23, 75 + randValue()]
             ];*/
//            console.log(pageviews);


            if ($('#site_statistics').size() != 0) {
                $('#site_statistics_loading').hide();
                $('#site_statistics_content').show();
                var plot_statistics = $.plot($("#site_statistics"), [{
                    data: pageviews,
                    label: "销量"
                }
                ], {
                    series: {
                        lines: {
                            show: true,//是否连成折线图
                            lineWidth: 2,//折线宽度
                            fill: true,//是否填充折线下边区域
                            fillColor: {
                                colors: [{//填充区域从下到上渐变透明度
                                    opacity: 0.2
                                }, {
                                    opacity: 0.01
                                }
                                ]
                            }
                        },
                        points: {
                            show: true//拐点是否显示
                        },
                        shadowSize: 2//折线阴影大小
                    },
                    legend:{
                        show: false
                    },
                    grid: {
                        labelMargin: 10,
                        axisMargin: 500,
                        hoverable: true,
                        clickable: true,
                        tickColor: "rgba(255,255,255,0.2)",//网格颜色
                        borderWidth: 0//边框宽度
                    },
                    colors: ["#F00", "#4A8CF7", "#52e136"],
                    xaxis: {
                        ticks: 11,
                        tickDecimals: 0//x轴保留小数点位数
                    },
                    yaxis: {
                        ticks: 5,
                        tickDecimals: 0//y轴保留小数点位数
                    }
                });








                var previousPoint = null;
                $("#site_statistics").bind("plothover", function (event, pos, item) {

                    var str = "(" + pos.x.toFixed(2) + ", " + pos.y.toFixed(2) + ")";

                    if (item) {
                        if (previousPoint != item.dataIndex) {
                            previousPoint = item.dataIndex;
                            $("#tooltip").remove();
                            var x = item.datapoint[0],
                                    y = item.datapoint[1];
                            showTooltip(item.pageX, item.pageY,
                                    item.series.label + y);
                        }
                    } else {
                        $("#tooltip").remove();
                        previousPoint = null;
                    }
                });


            }

        };
        /*END OF DASHBOARD*/

        /*DASHBOARD*/
        function dashboard_m(pageviews){


            /*Dashboard Charts*/
            if (!jQuery.plot) {
                return;
            }
            var data = [];
            var totalPoints = 250;
            // random data generator for plot charts

            function getRandomData() {
                if (data.length > 0) data = data.slice(1);
                // do a random walk
                while (data.length < totalPoints) {
                    var prev = data.length > 0 ? data[data.length - 1] : 50;
                    var y = prev + Math.random() * 10 - 5;
                    if (y < 0) y = 0;
                    if (y > 100) y = 100;
                    data.push(y);
                }
                // zip the generated y values with the x values
                var res = [];
                for (var i = 0; i < data.length; ++i) res.push([i, data[i]])
                return res;
            }

            function showTooltip(x, y, contents) {
                $("<div id='tooltip'>" + contents + "</div>").css({
                    position: "absolute",
                    display: "none",
                    top: y + 5,
                    left: x + 5,
                    border: "1px solid #000",
                    padding: "5px",
                    'color':'#fff',
                    'border-radius':'2px',
                    'font-size':'11px',
                    "background-color": "#000",
                    opacity: 0.80
                }).appendTo("body").fadeIn(200);
            }

            function randValue() {
                return (Math.floor(Math.random() * (1 + 50 - 20))) + 10;
            }

            /*pageviews = [
             [1, randValue()],
             [2, randValue()],
             [3, 2 + randValue()],
             [4, 3 + randValue()],
             [5, 5 + randValue()],
             [6, 10 + randValue()],
             [7, 15 + randValue()],
             [8, 20 + randValue()],
             [9, 25 + randValue()],
             [10, 30 + randValue()],
             [11, 35 + randValue()],
             [12, 25 + randValue()],
             [13, 15 + randValue()],
             [14, 20 + randValue()],
             [15, 45 + randValue()],
             [16, 50 + randValue()],
             [17, 65 + randValue()],
             [18, 70 + randValue()],
             [19, 85 + randValue()],
             [20, 80 + randValue()],
             [21, 75 + randValue()],
             [22, 80 + randValue()],
             [23, 75 + randValue()]
             ];*/
//            console.log(pageviews);


            if ($('#money').size() != 0) {
                $('#site_statistics_loading').hide();
                $('#site_statistics_content').show();
                var plot_statistics = $.plot($("#money"), [{
                    data: pageviews,
                    label: "销售额&yen;"
                }
                ], {
                    series: {
                        lines: {
                            show: true,//是否连成折线图
                            lineWidth: 2,//折线宽度
                            fill: true,//是否填充折线下边区域
                            fillColor: {
                                colors: [{//填充区域从下到上渐变透明度
                                    opacity: 0.2
                                }, {
                                    opacity: 0.01
                                }
                                ]
                            }
                        },
                        points: {
                            show: true//拐点是否显示
                        },
                        shadowSize: 2//折线阴影大小
                    },
                    legend:{
                        show: false
                    },
                    grid: {
                        labelMargin: 10,
                        axisMargin: 500,
                        hoverable: true,
                        clickable: true,
                        tickColor: "rgba(255,255,255,0.2)",//网格颜色
                        borderWidth: 0//边框宽度
                    },
                    colors: ["#FA0", "#4A8CF7", "#52e136"],
                    xaxis: {
                        ticks: 11,
                        tickDecimals: 0//x轴保留小数点位数
                    },
                    yaxis: {
                        ticks: 5,
                        tickDecimals: 0//y轴保留小数点位数
                    }
                });








                var previousPoint = null;
                $("#money").bind("plothover", function (event, pos, item) {

                    var str = "(" + pos.x.toFixed(2) + ", " + pos.y.toFixed(2) + ")";

                    if (item) {
                        if (previousPoint != item.dataIndex) {
                            previousPoint = item.dataIndex;
                            $("#tooltip").remove();
                            var x = item.datapoint[0],
                                    y = item.datapoint[1];
                            showTooltip(item.pageX, item.pageY,
                                    item.series.label + y);
                        }
                    } else {
                        $("#tooltip").remove();
                        previousPoint = null;
                    }
                });


            }

        };
        /*END OF DASHBOARD*/
        /*销量*/
        $('#submit').click(function(){
            var years = $("select[name='years']").val();
            var months = $("select[name='months']").val();
            var goods = $("select[name='goods']").val();
//            if(!buy_name.length){
//                alertfail('客户姓名不能为空！');
//                return false;
//            }
//            re = /^1[34578][0-9]{9}$/
//            if (!re.test(buy_tel)) {
//
//                alertfail("请输入合法手机号！");
//                return false;
//            }
//            if(!buy_addr.length){
//                alertfail('客户地址不能为空！');
//                return false;
//            }
            $.post('{{url('/admin/count')}}',{years:years,months:months,goods:goods,_token:"{{csrf_token()}}"},function(data){
                if(data.flag){
                    dashboard(data.data.res);
                    $('.sales').html(data.data.time_y);
                    $('.total_sales').html(data.data.sales);
                    $('.des_sales').html(data.data.time);
                }else{
                    alertfail(data.msg);
                }
            },'json')

        })

        /*销售额*/
        $('#submit_m').click(function(){
            var years = $("select[name='years_m']").val();
            var months = $("select[name='months_m']").val();
            var goods = $("select[name='goods_m']").val();

            $.post('{{url('/admin/salemoney')}}',{years:years,months:months,goods:goods,_token:"{{csrf_token()}}"},function(data){
                if(data.flag){
                    dashboard_m(data.data.res);
                    $('.money').html(data.data.time_y);
                    $('.total_money').html('&yen;'+data.data.sales);
                    $('.des_money').html(data.data.time);
                }else{
                    alertfail(data.msg);
                }
            },'json')

        })




    </script>
@endsection