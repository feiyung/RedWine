<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from condorthemes.com/cleanzone/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2013], Mon, 31 Mar 2014 14:37:32 GMT -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{asset('public/images/favicon.png')}}">

    <title>红酒管理系统</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('public/js/bootstrap/dist/css/bootstrap.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/font-awesome.4.6.0.css">

    <!-- Custom styles for this template -->
    <link href="{{asset('public/css/style.css')}}" rel="stylesheet" />

</head>

<body class="texture">

<div id="cl-wrapper" class="login-container">

    <div class="middle-login">
        <div class="block-flat">
            <div class="header">
                <h3 class="text-center"><img class="logo-img" src="{{asset('public/images/logo.png')}}" alt="logo"/>红酒管理系统</h3>
            </div>
            <div>
                <form style="margin-bottom: 0px !important;" class="form-horizontal" action="">
                    <div class="content">
                        {{--<h4 class="title">Login Access</h4>--}}
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" placeholder="用户名" id="username" value="" class="form-control" name="username">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                    <input type="password" placeholder="密码" id="password" class="form-control" name="password">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="foot">
                        {{--<button class="btn btn-default" data-dismiss="modal" type="button">Register</button>--}}
                        <button class="btn btn-primary" data-dismiss="modal" type="button" id="submit">登录</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="text-center out-links"><a href="#">&copy; 2017 玛丝特国际贸易</a></div>
    </div>

</div>

<script src="{{asset('public/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{asset('public/js/behaviour/general.js')}}"></script>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset('public/js/behaviour/voice-commands.js')}}"></script>
<script src="{{asset('public/js/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/js/jquery.flot/jquery.flot.js')}}"></script>
<script type="text/javascript" src="{{asset('public/js/jquery.flot/jquery.flot.pie.js')}}"></script>
<script type="text/javascript" src="{{asset('public/js/jquery.flot/jquery.flot.resize.js')}}"></script>
<script type="text/javascript" src="{{asset('public/js/jquery.flot/jquery.flot.labels.js')}}"></script>
<script type="text/javascript" src="{{asset('public/js/jquery.niftymodals/js/jquery.modalEffects.js')}}"></script>
<script>


    $("#submit").click(function(){
        var name = $("input[name='username']").val();
        var pwd = $("input[name='password']").val();
        $.post("{{url('/admin/login')}}",{name:name,pwd:pwd,_token:"{{csrf_token()}}"},function(data){
            if(data.flag){
                location.href="{{url('/admin/winelist')}}"
            }else{
                alert(data.msg);
            }
        },'json')
    })
</script>
</body>

<!-- Mirrored from condorthemes.com/cleanzone/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2013], Mon, 31 Mar 2014 14:37:32 GMT -->
</html>
