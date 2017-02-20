<!DOCTYPE html>
<html>
<head>
    <title>购物车</title>
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
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>首页</a></li>
            <li class="active">购物车</li>
        </ol>
    </div>
</div>
<!-- //breadcrumbs -->
<!-- checkout -->
<div class="checkout">
    <div class="container">
        <h3 class="animated wow slideInLeft" data-wow-delay=".5s" > <span class="active">你购物车有:3 件商品</span></h3>
        <div class="checkout-right animated wow slideInUp" data-wow-delay=".5s">
            <table class="timetable_sub">

                <tr class="rem1">
                    <td class="invert"  >
                        <div class="rem">
                            <div class="close1" style="padding-left: 185px;"> </div>
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
                    <td class="invert">
                        <div class="quantity">
                            <div class="quantity-select">
                                <div class="entry value-minus">&nbsp;</div>
                                <div class="entry value"><span>1</span></div>
                                <div class="entry value-plus active">&nbsp;</div>
                            </div>
                        </div>
                    </td>
                    <td class="invert">商品名称</td>
                    <td class="invert">$290.00</td>

                </tr>
                <!--<tr class="rem2">-->
                <!--<td class="invert-image"><a href="single.html"><img src="images/30.jpg" alt=" " class="img-responsive" /></a></td>-->
                <!--<td class="invert">-->
                <!--<div class="quantity"> -->
                <!--<div class="quantity-select">                           -->
                <!--<div class="entry value-minus">&nbsp;</div>-->
                <!--<div class="entry value"><span>1</span></div>-->
                <!--<div class="entry value-plus active">&nbsp;</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--</td>-->
                <!--<td class="invert">Centre Table</td>-->
                <!--<td class="invert">$250.00</td>-->
                <!--<td class="invert">-->
                <!--<div class="rem">-->
                <!--<div class="close2"> </div>-->
                <!--</div>-->
                <!--<script>$(document).ready(function(c) {-->
                <!--$('.close2').on('click', function(c){-->
                <!--$('.rem2').fadeOut('slow', function(c){-->
                <!--$('.rem2').remove();-->
                <!--});-->
                <!--});	  -->
                <!--});-->
                <!--</script>-->
                <!--</td>-->
                <!--</tr>-->
                <!--<tr class="rem3">-->
                <!--<td class="invert-image"><a href="single.html"><img src="images/11.jpg" alt=" " class="img-responsive" /></a></td>-->
                <!--<td class="invert">-->
                <!--<div class="quantity"> -->
                <!--<div class="quantity-select">                           -->
                <!--<div class="entry value-minus">&nbsp;</div>-->
                <!--<div class="entry value"><span>1</span></div>-->
                <!--<div class="entry value-plus active">&nbsp;</div>-->
                <!--</div>-->
                <!--</div>-->
                <!--</td>-->
                <!--<td class="invert">Stone Bangles</td>-->
                <!--<td class="invert">$299.00</td>-->
                <!--<td class="invert">-->
                <!--<div class="rem">-->
                <!--<div class="close3"> </div>-->
                <!--</div>-->
                <!--<script>$(document).ready(function(c) {-->
                <!--$('.close3').on('click', function(c){-->
                <!--$('.rem3').fadeOut('slow', function(c){-->
                <!--$('.rem3').remove();-->
                <!--});-->
                <!--});	  -->
                <!--});-->
                <!--</script>-->
                <!--</td>-->
                <!--</tr>-->
                <!--quantity-->
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
        <div class="checkout-left">
            <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
                <h4>购物拦</h4>

                <ul>
                    <li>商品名称 <i></i> <span>$250.00 </span></li>
                    <li>运费 <i></i> <span>$0.00</span></li>
                    <li>合计 <i></i> <span>$250.00</span></li>
                </ul>
            </div>
            <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s" style="margin-left: 200px;">
                <a href="single.html">结算 <b>》</b></a>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //checkout -->
<!-- footer -->
<?php echo $__env->make('manstreet.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<!-- //footer -->
</body>
</html>