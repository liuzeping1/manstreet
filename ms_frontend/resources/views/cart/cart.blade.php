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
            <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>首页</a></li>
            <li class="active">购物车</li>
        </ol>
    </div>
</div>
<!-- //breadcrumbs -->
<!-- checkout -->
<div class="checkout">
    <div class="container">
        <h3 class="animated wow slideInLeft" data-wow-delay=".5s" > <span class="active">你购物车有:{{$num}} 件商品</span></h3>
        <div class="checkout-right animated wow slideInUp" data-wow-delay=".5s">
            <table class="timetable_sub">
                @foreach($cartShow as $key=>$val)
                <tr class="rem1">
                    <td class="invert"  >
                        <div class="rem">
                            <div class="close1" style="padding-left: 185px;" id="cart_remove" ids="<?php echo $val['cart_id'] ?>"> </div>
                        </div>

                    </td>
                    <td class="invert-image"><a href="single?goods_id=<?php $val['goods_id'] ?>"><img src="<?php echo $val['goods_img'] ?>" alt=" " class="img-responsive" /></a></td>
                    <td class="invert">
                        <div class="quantity">
                            <div class="quantity-select">
                                <!--<div class="entry value-minus">&nbsp;</div>-->
                                <div class="entry value"><span><?php echo $val['buy_number'] ?></span></div>
                                <!-- <div class="entry value-plus active">&nbsp;</div>-->
                            </div>
                        </div>
                    </td>
                    <td class="invert"><?php echo $val['goods_name'] ?></td>
                    <td class="invert" value="<?php echo $val['attr_value'] ?>"><?php echo $val['attr_value'] ?></td>
                    <td class="invert"><?php echo $val['goods_price']*$val['buy_number'] ?>&nbsp;&nbsp;RMB</td>

                </tr>
                @endforeach
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
                <h4>购物栏</h4>

                <ul>
                    <li>合计 <i></i><?php echo $temp?>&nbsp;&nbsp;RMB</li>
                </ul>
            </div>
            <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s" style="margin-left: 200px;">
                <a href="order">去结算 <b>》</b></a>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //checkout -->
<!-- footer -->
@include('manstreet.footer')
<!-- //footer -->
</body>
</html>
<script>
    $(document).on('click','#cart_remove',function(){
        var confir = confirm("确认删除？");
        var _this = $(this);
        if(confir){
            var cart_id = $(this).attr('ids');
            $.ajax({
                type:'post',
                url:'cart_remove',
                data:'cart_id='+cart_id,
                success:function(msg){
                    if(msg==1){
                        _this.parents('.rem1').remove();
                    }else{
                        alert('删除失败');
                    }
                }
            })
        }
    })
</script>