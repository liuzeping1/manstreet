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
<?php echo $__env->make('manstreet/top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<!-- //header -->
<!-- breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>主页</a></li>
            <li class="active">注册页</li>
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
            <form class="animated wow slideInUp" data-wow-delay=".5s">
                <input type="text" placeholder="姓名..." required=" " >
            </form>
            <h6 class="animated wow slideInUp" data-wow-delay=".5s">个人信息</h6>
            <form class="animated wow slideInUp" data-wow-delay=".5s">
                <input type="email" placeholder="输入邮箱..." required=" " >
                <input type="password" placeholder="输入密码..." required=" " >
                <input type="text" placeholder="输入手机号..." required=" " >
                <input type="submit" value="注册">
            </form>
        </div>
        <div class="register-home animated wow slideInUp" data-wow-delay=".5s">
            <a href="index.html">主页</a>
        </div>
    </div>
</div>
<!-- //register -->
<!-- footer -->
<?php echo $__env->make('manstreet/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
</body>
</html>