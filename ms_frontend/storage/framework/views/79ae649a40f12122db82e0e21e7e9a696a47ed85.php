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
    <script src="js/simpleCart.min.js"></script>
    <!-- cart -->
    <!-- for bootstrap working -->
    <script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
    <!-- //for bootstrap working -->
    <!--<link href='http://fonts.useso.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>-->
    <!--<link href='http://fonts.useso.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>-->
    <!-- timer -->
    <link rel="stylesheet" href="css/jquery.countdown.css" />
    <!-- //timer -->
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
<?php echo $__env->make('manstreet/top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- //header -->
<!-- banner -->
<div class="banner">
    <div class="container">
        <div class="banner-info animated wow zoomIn" data-wow-delay=".5s">
            <h3>最Man的购物街</h3>
            <h4>折扣 <span>50% <i>+</i></span></h4>
            <div class="wmuSlider example1">
                <div class="wmuSliderWrapper">
                    <article style="position: absolute; width: 100%; opacity: 0;">
                        <div class="banner-wrap">
                            <div class="banner-info1">
                                <p style="color: #000;">衬衫+ 西装+ 正式裤 + 袜子</p>
                            </div>
                        </div>
                    </article>
                    <article style="position: absolute; width: 100%; opacity: 0;">
                        <div class="banner-wrap">
                            <div class="banner-info1">
                                <p style="color: #000;">外套+手表+帽子+鞋子</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <script src="js/jquery.wmuSlider.js"></script>
            <script>
                $('.example1').wmuSlider();
            </script>
        </div>
    </div>
</div>
<!-- //banner -->
<!-- banner-bottom -->
<div class="banner-bottom">
    <div class="container">
        <div class="banner-bottom-grids">
            <div class="banner-bottom-grid-left animated wow slideInLeft" data-wow-delay=".5s">
                <div class="grid">
                    <figure class="effect-julia">
                        <img src="images/4.jpg" alt=" " class="img-responsive" />
                        <figcaption>
                            <h3>男人街 <i>Man <span>Street</span></i></h3>
                            <div>
                                <p><span>服装百搭</span></p>
                                <p><span>时尚热潮</span></p>
                                <p><span>风装来袭</span></p>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <div class="banner-bottom-grid-left1 animated wow slideInUp" data-wow-delay=".5s">
                <div class="banner-bottom-grid-left-grid left1-grid grid-left-grid1">
                    <div class="banner-bottom-grid-left-grid1">
                        <img src="images/1.jpg" alt=" " class="img-responsive" />
                    </div>
                    <div class="banner-bottom-grid-left1-pos">
                        <p>简单舒适</p>
                    </div>
                </div>
                <div class="banner-bottom-grid-left-grid left1-grid grid-left-grid1">
                    <div class="banner-bottom-grid-left-grid1">
                        <img src="images/2.jpg" alt=" " class="img-responsive" />
                    </div>
                    <div class="banner-bottom-grid-left1-position">
                        <div class="banner-bottom-grid-left1-pos1">
                            <p>最新新集合</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-bottom-grid-right animated wow slideInRight" data-wow-delay=".5s">
                <div class="banner-bottom-grid-left-grid grid-left-grid1">
                    <div class="banner-bottom-grid-left-grid1">
                        <img src="images/143.jpg" alt=" " class="img-responsive" />
                    </div>
                    <div class="grid-left-grid1-pos">
                        <p>顶部和经典设计 <span>2017 Collection</span></p>
                    </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //banner-bottom -->
<!-- collections -->
<div class="new-collections">
    <div class="container">
        <h3 class="animated wow zoomIn" data-wow-delay=".5s">新集合</h3>
        <p class="est animated wow zoomIn" data-wow-delay=".5s">下面将是我们今年的最新集合，请大家欣赏.</p>
        <div class="new-collections-grids">
            <div class="col-md-3 new-collections-grid">
                    <?php foreach($goodsList as $k=>$v): ?>
                <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s" style="float: left">
                    <div class="new-collections-grid1-image">
                        <a href="javascript:void (0)" class="product-image"><img src="<?php echo $v['goods_img'] ?>" alt=" " class="img-responsive" /></a>
                        <div class="new-collections-grid1-image-pos">
                            <a href="single?goods_id=<?php echo $v['goods_id'] ?>">查看详情</a>
                        </div>
                        <div class="new-collections-grid1-right">
                            <div class="rating">
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </div>
                    <h4><a href="single?goods_id=<?php echo $v['goods_id'] ?>"><?php echo $v['goods_name'] ?></a></h4>
                    <p><?php echo $v['goods_brief'] ?></p>
                    <div class="new-collections-grid1-left simpleCart_shelfItem">
                        <p><span class="item_price"><?php echo $v['goods_price'] ?>&nbsp;&nbsp;RMB</span><a class="item_add" href="single?goods_id=<?php echo  $v['goods_id'] ?>">查看详情 </a></p>
                    </div>
                </div>
                    <?php endforeach; ?>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //collections -->
<!-- new-timer -->
<!-- //new-timer -->
<!-- collections-bottom -->
<div class="collections-bottom">
    <div class="container">
        <div class="collections-bottom-grids">
            <div class="collections-bottom-grid animated wow slideInLeft" data-wow-delay=".5s">
                <h3>极简生活 <span>其实生活就是这么简单丶</span></h3>
            </div>
        </div>
    </div>
</div>
<!-- //collections-bottom -->
<!-- footer -->
<?php echo $__env->make('manstreet/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- //footer -->
</body>
</html>