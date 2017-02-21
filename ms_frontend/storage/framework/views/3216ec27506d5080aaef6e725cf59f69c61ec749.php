<!DOCTYPE html>
<html>
<head>
    <title>确认订单页面</title>
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
<?php echo $__env->make('manstreet.top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<!-- //header -->
<!-- breadcrumbs -->

<div class="register" style="margin-top: -50px">
    <div class="container">

        <div class="checkout">
            <div class="container">
                <h3 class="animated wow slideInLeft" data-wow-delay=".5s" > <span class="active">确认订单商品信息</span></h3>
                <div class="checkout-right animated wow slideInUp" data-wow-delay=".5s">
                    <table class="timetable_sub">

                        <tr class="rem1">
                            <td class="invert"  >
                                <div class="rem">
                                    <div class="close1" style="padding-left: 160px;"> </div>
                                </div>
                                <script>$(document).ready(function(c) {
                                        $('.close1').on('click', function(c){
                                            $('.rem1').fadeOut('slow', function(c){
                                                $('.rem1').remove();
                                            });
                                        });
                                    });
                                </script>
                            </td>
                            <td class="invert-image"><a href="single.html"><img src="images/22.jpg" alt=" " class="img-responsive" /></a></td>
                            <td class="invert" style="color:#d8703f">
                                <div class="quantity">
                                    <div class="quantity-select">
                                        数量：3
                                    </div>
                                </div>
                            </td>
                            <td style="color:#d8703f">商品名称</td>
                            <td style="color:#d8703f">$290.00</td>

                        </tr>
                        <script>
                            $('.value-plus').on('click', function(){
                                var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
                                divUpd.text(newVal);
                            });

                            $('.value-minus').on('click', function(){
                                var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
                                if(newVal>=1) divUpd.text(newVal);
                            });
                        </script>
                        <!--quantity-->
                    </table>
                </div>

            </div>
        </div>

        <div class="add-review">
            <!--<h3 class="animated wow slideInUp" data-wow-delay=".5s">收货人信息</h3>-->
            <h3 class="bars animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">收货人信息</h3>
            <div class="input-group animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
                <input type="text" class="form-control" size="200" placeholder="请输入收货人姓名" aria-describedby="basic-addon1">
            </div>
            <div class="input-group animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
                <input type="text" class="form-control" size="200" placeholder="请输入手机号码" aria-describedby="basic-addon2">
            </div>
            <div class="input-group animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
                <input type="text" class="form-control" size="200" placeholder="请输入电子邮箱" aria-describedby="basic-addon2">
            </div>
            <div class="input-group animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
                <input type="text" class="form-control" size="200" placeholder="请输入详细地址" aria-describedby="basic-addon2">
            </div>
        </div>
        <div class="checkout-left">
            <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">

                <ul>
                    <li>商品名称 <i></i> <span>$250.00 </span></li>
                    <li>运费 <i></i> <span>$0.00</span></li>
                    <li>合计 <i></i> <span>$250.00</span></li>
                    <li>支付方式 <i></i> <span>支付宝</span></li>
                </ul>
            </div>

            <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                <a href="single.html">确认订单并支付</a>
            </div>
            <div class="clearfix"> </div>

        </div>

    </div>
</div>




<!-- //breadcrumbs -->
<!-- checkout -->

<!-- //checkout -->
<!-- footer -->
<?php echo $__env->make('manstreet.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
</body>
</html>