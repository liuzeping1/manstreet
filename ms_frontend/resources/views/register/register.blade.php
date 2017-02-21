<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Best Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //for-mobile-apps -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- js -->
    <script src="js/jquery.min.js"></script>
    <!-- //js -->
    <!-- cart -->
    <script src="js/simpleCart.min.js"> </script>
    <!-- cart -->
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <!-- for bootstrap working -->
    <script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
    <!-- //for bootstrap working -->
    <!--<link href='http://fonts.useso.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>-->
    <!--<link href='http://fonts.useso.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>-->
    <!-- animation-effect -->
    <link href="css/animate.min.css" rel="stylesheet">
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!-- //animation-effect -->
</head>
<body>
<!-- header -->
@include('manstreet/top')
<!-- //header -->
<!-- breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="index"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>主页</a></li>
            <li class="active">注册</li>
        </ol>
    </div>
</div>
<!-- //breadcrumbs -->
<!-- register -->
<div class="register">
    <div class="container">
        <h3 class="animated wow zoomIn" data-wow-delay=".5s">Welcome me！</h3>
        <p class="est animated wow zoomIn" data-wow-delay=".5s">Welcome to register for men's street, thanks for our support.</p>
        <div class="login-form-grids">
            <h5 class="animated wow slideInUp" data-wow-delay=".5s">注册信息</h5>
            <form class="animated wow slideInUp" data-wow-delay=".5s" method="post" action="into" onsubmit="return check()">
                <input type="text" placeholder="请输入用户名..." id="user_name" required=" " name="user_name" ><span style="font-size: 12px;color: red;" id="user_msg"></span>
            <h6 class="animated wow slideInUp" data-wow-delay=".5s">个人信息</h6>
                <input type="email" placeholder="请输入邮箱..." id="email" name="email" required=" " ><span style="font-size: 12px;color: red;" id="email_msg"></span>
                <input type="password" placeholder="请输入密码..." id="password" name="password" required=" " ><span style="font-size: 12px;color: red;" id="pwd_msg"></span>
                <input type="text" placeholder="请输入手机号..." id="phone" name="phone" required=" " ><span style="font-size: 12px;color: red;" id="phone_msg"></span>
                <input type="button" id="btn"  value="免费获取验证码" class="clicktalcode" style="margin-left: 190px" >
                <input type="text" placeholder="请输入验证码" id="code" name="code" required=" " ><span style="font-size: 12px;color: red;" id="code_msg"></span>
                <input type="submit" value="注册">
            </form>
        </div>
        <div class="register-home animated wow slideInUp" data-wow-delay=".5s">
            <a href="index">主页</a>
        </div>
    </div>
</div>
<!-- //register -->
<!-- footer -->
@include('manstreet/footer');
</body>
</html>
<script>
    var wait=60;
    function time(o) {
        if (wait == 0) {
            o.removeAttribute("disabled");
            o.value="免费获取验证码";
            wait = 60;
        } else {
            o.setAttribute("disabled", true);
            o.value="重新发送(" + wait + ")";
            wait--;
            setTimeout(function() {
                        time(o)
                    },
                    1000)
        }
    }
    $(".clicktalcode").click(function(){
        time(this);
        var phone=$("#phone").val();
        $.ajax({
            url:"send_msg",
            type:"post",
            data:'phone='+phone,
            /* dataType:"json",*/
            success:function(data){
					alert(data);
//                if(data=='发送失败1'){
//                    alert("验证码发送失败！");
//                }else{
//                    alert("短信发送成功，请注意接收！");
//                }
            }
        })
    });
    $(function(){
        //验证用户名
        $(document).on('blur','#user_name',function(){
            var user_name = $(this).val();
            var reg = /^[\u4e00-\u9fff\w]{3,20}$/;
            if(!reg.test(user_name)){
                $('#user_msg').html('用户名必须为3~20个字符');
                return false;
            }else{
                $('#user_msg').html('');
                return true;
            }
        })
        //验证邮箱
        $(document).on('blur','#email',function(){
            var email = $(this).val();
            var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
            if(!reg.test(email)){
                $('#email_msg').html('请输入正确邮箱格式');
                return false;
            }else{
                $('#email_msg').html('');
                return true;
            }
        })

        //验证密码
        $(document).on('blur','#password',function(){
            var password = $(this).val();
            var reg = /^(\w){6,20}$/;
            if(!reg.test(password)){
                $('#pwd_msg').html('密码长度为6~20位数字、字母、下划线');
                return false;
            }else{
                $('#pwd_msg').html('');
                return true;
            }
        })

        //验证手机号码
        $(document).on('blur','#phone',function(){
            var phone = $(this).val();
            var reg = /^1[34578]\d{9}$/;
            if(!reg.test(phone)){
                $('#phone_msg').html('请输入正确11位手机号码');
                return false;
            }else{
                $('#phone_msg').html('');
                return true;
            }
        })

        //验证手机验证码
        $(document).on('blur','#code',function(){
            var code = $(this).val();
            var reg = /^\d{4}$/;
            if(!reg.test(code)){
                $('#code_msg').html('请输入正确验证码');
                return false;
            }else{
                $('#code_msg').html('');
                return true;
            }
        })

        function check(){
            var user_name = $('#user_name').val();
            var email = $('#email').val();
            var pwd = $('#password').val();
            var phone = $('#phone').val();
            var code = $('#code').val();
            if(user_name!='' && email!='' && pwd!='' && phone!='' && code!=''){
                return true;
            }else{
                return false;
            }
        }
    })
</script>