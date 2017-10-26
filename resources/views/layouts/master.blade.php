<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from condorthemes.com/cleanzone/pages-blank.html by HTTrack Website Copier/3.x [XR&CO'2013], Mon, 31 Mar 2014 14:37:32 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">

    <title> @yield('title')</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('js/bootstrap/dist/css/bootstrap.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('js/jquery.gritter/css/jquery.gritter.css')}}" />

    <link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{asset('assets/js/html5shiv.js')}}'"></script>
    <script src="{{asset('assets/js/respond.min.js')}}'"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="{{asset('js/jquery.nanoscroller/nanoscroller.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('js/jquery.easypiechart/jquery.easy-pie-chart.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('js/bootstrap.switch/bootstrap-switch.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('js/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('js/jquery.select2/select2.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('js/bootstrap.slider/css/slider.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('js/jquery.niftymodals/css/component.css')}}" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('js/jquery.icheck/skins/square/blue.css')}}" rel="stylesheet" />

    {{--kkk--}}

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('js/bootstrap.switch/bootstrap-switch.min.css')}}" />

    <!-- Select2 -->
    <link rel="stylesheet" type="text/css" href="{{asset('js/jquery.select2/select2.css')}}" />



    <!-- DateRange -->
    <link rel="stylesheet" type="text/css" href="{{asset('js/bootstrap.daterangepicker/daterangepicker-bs3.css')}}" />

    <!-- Custom styles for this template -->


    <link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">
    <link rel="stylesheet" href="{{asset('css/pygments.css')}}">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <![endif]-->
</head>
<body>


<!-- Fixed navbar -->
<div id="head-nav" class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="fa fa-gear"></span>
            </button>
            <a class="navbar-brand" href="#"><span>玛丝特红酒管理</span></a>
        </div>
        <div class="navbar-collapse collapse">
            {{--<ul class="nav navbar-nav">--}}
                {{--<li class="active"><a href="#">Home</a></li>--}}
                {{--<li><a href="#about">About</a></li>--}}
                {{--<li class="dropdown">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">Contact <b class="caret"></b></a>--}}
                    {{--<ul class="dropdown-menu">--}}
                        {{--<li><a href="#">Action</a></li>--}}
                        {{--<li><a href="#">Another action</a></li>--}}
                        {{--<li><a href="#">Something else here</a></li>--}}
                        {{--<li class="dropdown-submenu"><a href="#">Sub menu</a>--}}
                            {{--<ul class="dropdown-menu">--}}
                                {{--<li><a href="#">Action</a></li>--}}
                                {{--<li><a href="#">Another action</a></li>--}}
                                {{--<li><a href="#">Something else here</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
                {{--<li class="dropdown">--}}
                    {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">Large menu <b class="caret"></b></a>--}}
                    {{--<ul class="dropdown-menu col-menu-2">--}}
                        {{--<li class="col-sm-6 no-padding">--}}
                            {{--<ul>--}}
                                {{--<li class="dropdown-header"><i class="fa fa-group"></i>Users</li>--}}
                                {{--<li><a href="#">Action</a></li>--}}
                                {{--<li><a href="#">Another action</a></li>--}}
                                {{--<li><a href="#">Something else here</a></li>--}}
                                {{--<li class="dropdown-header"><i class="fa fa-gear"></i>Config</li>--}}
                                {{--<li><a href="#">Action</a></li>--}}
                                {{--<li><a href="#">Another action</a></li>--}}
                                {{--<li><a href="#">Something else here</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                        {{--<li  class="col-sm-6 no-padding">--}}
                            {{--<ul>--}}
                                {{--<li class="dropdown-header"><i class="fa fa-legal"></i>Sales</li>--}}
                                {{--<li><a href="#">New sale</a></li>--}}
                                {{--<li><a href="#">Register a product</a></li>--}}
                                {{--<li><a href="#">Register a client</a></li>--}}
                                {{--<li><a href="#">Month sales</a></li>--}}
                                {{--<li><a href="#">Delivered orders</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                    {{--</ul>--}}
                {{--</li>--}}
            {{--</ul>--}}
            <ul class="nav navbar-nav navbar-right user-nav">
                <li class="dropdown profile_menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{session('ad_name')}}<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        {{--<li><a href="#">My Account</a></li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Messages</a></li>
                        <li class="divider"></li>--}}
                        <li><a href="{{url('/admin/loginout')}}">退出登录</a></li>
                    </ul>
                </li>
            </ul>
           {{-- <ul class="nav navbar-nav navbar-right not-nav">
                <li class="button dropdown">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class=" fa fa-comments"></i></a>
                    <ul class="dropdown-menu messages">
                        <li>
                            <div class="nano nscroller">
                                <div class="content">
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <img src="{{asset('images/avatar2.jpg')}}" alt="avatar" /><span class="date pull-right">13 Sept.</span> <span class="name">Daniel</span> I'm following you, and I want your money!
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="{{asset('images/avatar_50.jpg')}}'" alt="avatar" /><span class="date pull-right">20 Oct.</span><span class="name">Adam</span> is now following you
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="{{asset('images/avatar4_50.jpg')}}" alt="avatar" /><span class="date pull-right">2 Nov.</span><span class="name">Michael</span> is now following you
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <img src="{{asset('images/avatar3_50.jpg')}}" alt="avatar" /><span class="date pull-right">2 Nov.</span><span class="name">Lucy</span> is now following you
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <ul class="foot"><li><a href="#">View all messages </a></li></ul>
                        </li>
                    </ul>
                </li>
                <li class="button dropdown">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe"></i><span class="bubble">2</span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="nano nscroller">
                                <div class="content">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-cloud-upload info"></i><b>Daniel</b> is now following you <span class="date">2 minutes ago.</span></a></li>
                                        <li><a href="#"><i class="fa fa-male success"></i> <b>Michael</b> is now following you <span class="date">15 minutes ago.</span></a></li>
                                        <li><a href="#"><i class="fa fa-bug warning"></i> <b>Mia</b> commented on post <span class="date">30 minutes ago.</span></a></li>
                                        <li><a href="#"><i class="fa fa-credit-card danger"></i> <b>Andrew</b> killed someone <span class="date">1 hour ago.</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <ul class="foot"><li><a href="#">View all activity </a></li></ul>
                        </li>
                    </ul>
                </li>
                <li class="button"><a href="javascript:;" class="speech-button"><i class="fa fa-microphone"></i></a></li>
            </ul>--}}

        </div><!--/.nav-collapse -->
    </div>
</div>

<div id="cl-wrapper">
    <div class="cl-sidebar">
        <div class="cl-toggle"><i class="fa fa-bars"></i></div>
        <div class="cl-navblock">
            <div class="menu-space">
                <div class="content">
                    {{--<div class="side-user">
                        <div class="avatar"><img src="{{asset('images/avatar1_50.jpg')}}" alt="Avatar" /></div>
                        <div class="info">
                            <a href="#">Jeff Hanneman</a>
                            <img src="{{asset('images/state_online.png')}}" alt="Status" /> <span>Online</span>
                        </div>
                    </div>--}}
                    <ul class="cl-vnavigation">
                        <li><a href="{{url('admin/winelist')}}"><i class="fa fa-list-alt"></i><span>红酒管理</span></a>
                        </li>

                        <li><a href="{{url('admin/orderlist')}}"><i class="fa fa-table"></i><span>订单管理</span></a>

                        </li>

                        <li><a href="{{url('admin/customerlist')}}"><i class="fa fa-users"></i><span>客户管理</span></a>
                        <li><a href="{{url('admin/adminlist')}}"><i class="fa fa-user"></i><span>用户管理</span></a>
                            {{--<ul class="sub-menu">
                                <li class="@yield('active')"><a href="{{url('admin/adminlist')}}">用户管理</a></li>
                                <li class="@yield('active')"><a href="{{url('admin/adminrole')}}">分组管理</a></li>
                                <li class="@yield('active')"><a href="{{url('admin/accesslist')}}">权限管理</a></li>
                            </ul>--}}
                        </li>

                        <li><a href="{{url('/admin/charts')}}"><i class="fa fa-bar-chart-o"></i><span>销售统计</span></a>

                        </li>
                        <li><a href="{{url('/admin/loglist')}}"><i class="fa fa-file-text-o"></i><span>日志管理</span></a>

                        </li>

                    </ul>
                </div>
            </div>
            {{--<div class="text-right collapse-button" style="padding:7px 9px;">
                <input type="text" class="form-control search" placeholder="Search..." />
                <button id="sidebar-collapse" class="btn btn-default" style=""><i style="color:#fff;" class="fa fa-angle-left"></i></button>
            </div>--}}
        </div>
    </div>

    <div class="container-fluid" id="pcont">
@section('content')
        <div class="cl-mcont">
            <h3 class="text-center">Content goes here!</h3>
        </div>
@show

    <div class="md-modal md-effect-1" id="md-scale">
        <div class="md-content"  style="box-shadow: 3px 5px 10px 2px #aaa;width: 350px;height: 200px">
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
    </div>

</div>

<script src="{{asset('js/jquery.js')}}"></script>
<script type="text/javascript"
src="{{asset('js/jquery.nanoscroller/jquery.nanoscroller.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.sparkline/jquery.sparkline.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.easypiechart/jquery.easy-pie-chart.js')}}"></script>
<script src="{{asset('js/jquery.ui/jquery-ui.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('js/jquery.nestable/jquery.nestable.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.switch/bootstrap-switch.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
<script src="{{asset('js/jquery.select2/select2.min.js')}}" type="text/javascript"></script>
<script src="{{asset('js/bootstrap.slider/js/bootstrap-slider.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('js/jquery.gritter/js/jquery.gritter.js')}}"></script>
<script type="text/javascript" src="{{asset('js/behaviour/general.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.niftymodals/js/jquery.modalEffects.js')}}"></script>



<script src="{{asset('js/jquery.parsley/dist/parsley.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('js/jquery.icheck/icheck.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.daterangepicker/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.daterangepicker/daterangepicker.js')}}"></script>

{{--<script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>--}}
<script src="{{asset('js/skycons/skycons.js')}}" type="text/javascript"></script>
{{--<script src="{{asset('js/intro.js/intro.js')}}" type="text/javascript"></script>--}}

<script type="text/javascript">
    $(document).ready(function(){
        //initialize the javascript
        App.init();

    });
</script>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset('js/behaviour/voice-commands.js')}}"></script>
<script src="{{asset('js/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.flot/jquery.flot.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.flot/jquery.flot.pie.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.flot/jquery.flot.resize.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.flot/jquery.flot.labels.js')}}"></script>
<script>
    function alertfail(msg){//失败弹窗
        $("#msg").text(msg);
        $("i.fa").removeClass('fa-check').addClass('fa-times');
        $("div.i-circle").removeClass('success').addClass('danger');
        $("#md-scale").addClass('md-show');
        setTimeout(function () {
            $("#md-scale").removeClass('md-show');
        }, 2000);
        return false;
    }
    function alertsuccess(msg){//成功弹窗
        $("#msg").text(msg);
        $("i.fa").removeClass('fa-times').addClass('fa-check');
        $("div.i-circle").removeClass('danger').addClass('success');

        $("#md-scale").addClass('md-show');
        setTimeout(function () {
            $("#md-scale").removeClass('md-show');
        }, 2000)
    }
</script>
@yield('javascript')
</body>

<!-- Mirrored from condorthemes.com/cleanzone/pages-blank.html by HTTrack Website Copier/3.x [XR&CO'2013], Mon, 31 Mar 2014 14:37:32 GMT -->
</html>
