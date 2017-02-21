<!DOCTYPE html>
<html>
<head>
    <title>《男人街》极简潮流生活馆</title>
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
@include('manstreet.top')
<!-- //header -->
<!-- breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li class="active">登陆页面</li>
        </ol>
    </div>
</div>
<!-- //breadcrumbs -->
<!-- login -->
<div class="login">
    <div class="container">
        <h3 class="animated wow zoomIn" data-wow-delay=".5s">欢迎登陆!</h3>
        <p class="est animated wow zoomIn" data-wow-delay=".5s">
            登录之后精彩更多等你！
        </p>
        <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
            <form method="post" action="check_login">
                <input type="text" name="user" id="user" placeholder="请输入邮箱地址或手机号码" required=" " >
                <span id="user_msg" style="font-size: 12px;color: red;"></span>
                <input type="password" name="password" id="pwd" placeholder="请输入您的密码" required=" " >
                <span id="pwd_msg"></span>
                <div class="forgot">
                    <a href="#">忘记密码?</a>
                </div>
                <input type="submit" value="立即登陆">
            </form>
        </div>
        <h4 class="animated wow slideInUp" data-wow-delay=".5s">新人须知</h4>
        <p class="animated wow slideInUp" data-wow-delay=".5s"><a href="register">立即注册</a> 或者返回到 <a href="index">主页<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
    </div>
</div>
<!-- //login -->
<!-- footer -->
@include('manstreet.footer');
<!-- //footer -->
</body>
</html>
<script>
    $(function(){
        //验证用户信息
        $(document).on('blur','#user',function() {
            var user = $(this).val();
            var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
            var reg1 = /^1[34578]\d{9}$/;
            if (reg.test(user)) {
                $('#user_msg').html('');
                return true;
            } else if (reg1.test(user)) {
                $('#user_msg').html('');
                return true;
            }else{
                $('#user_msg').html('请输入正确用户信息');
                return false;
            }
        })
    })
</script>