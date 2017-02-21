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
@include('manstreet/top');
<!-- //header -->
<!-- breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="index"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>首页</a></li>
            <li class="active">列表页</li>
        </ol>
    </div>
</div>
<div class="products">
    <div class="container">
        <div class="col-md-4 products-left">
            <div class="categories animated wow slideInUp" data-wow-delay=".5s">
                <h3>男人街商品分类</h3>
                <ul class="cate">
                    @foreach($categoryList as $key)
                    <li><a href="javascript:void(0);" class="UpdateCate" value="<?php echo $key['cat_id'] ?>"><?php echo $key['cat_name'] ?></a> <span></span></li>
                    @endforeach
                </ul>
            </div>
            <div class="new-products animated wow slideInUp" data-wow-delay=".5s">
                <h3>男人街热卖商品</h3>

                <div class="new-products-grids">
                    @foreach($hotGoods as $hotkey)
                    <div class="new-products-grid">
                        <div class="new-products-grid-left">
                            <a href="cate_order?goods_id=<?php echo $hotkey['goods_id'] ?>"><img src="<?php echo $hotkey['goods_img'] ?>" alt=" " class="img-responsive" /></a>
                        </div>
                        <div class="new-products-grid-right">
                            <h4><a href="single?goods_id=<?php echo $hotkey['goods_id'] ?>"><?php echo $hotkey['goods_name'] ?></a></h4>
                            <div class="rating">
                                <div class="rating-left">
                                    <img src="<?php echo $hotkey['goods_img'] ?>" alt=" " class="img-responsive">
                                </div>
                                <div class="clearfix">
                                </div>
                            </div>
                            <div class="simpleCart_shelfItem new-products-grid-right-add-cart">
                                <p><span class="item_price"><?php echo $hotkey['goods_price'] ?>&nbsp;&nbsp;RMB</span><a class="item_add0" value="<?php echo $hotkey['goods_id'] ?>" href="single?goods_id=<?php echo $hotkey['goods_id'] ?>">产品详情 </a></p>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                @endforeach

                </div>
            </div>
        </div>
        <div class="box">
        <div class="col-md-8 products-right">
            <div class="products-right-grid">
                <div class="products-right-grids animated wow slideInRight" data-wow-delay=".5s">
                    <div class="clearfix"> </div>
                </div>
                <div class="products-right-grids-position animated wow slideInRight" data-wow-delay=".5s">
                    <img src="images/18.jpg" alt=" " class="img-responsive" />
                    <div class="products-right-grids-position1">
                        <h4>2017 最新产品</h4>
                        <p>Temporibus autem quibusdam et aut officiis debitis aut rerum
                            necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae
                            non recusandae.</p>
                    </div>
                </div>
            </div>
            <div class="products-right-grids-bottom">
                @foreach($goodsList as $goodskey)
                <div class="col-md-4 products-right-grids-bottom-grid">
                    <div class="new-collections-grid1 products-right-grid1 animated wow slideInUp" data-wow-delay=".5s">
                        <div class="new-collections-grid1-image">
                            <a href="single?goods_id=<?php echo $goodskey['goods_id'] ?>" class="product-image"><img src="<?php echo $goodskey['goods_img'] ?>" width="190px" height="190px" alt=" " class="img-responsive"></a>
                            <div class="new-collections-grid1-image-pos products-right-grids-pos">
                                <a href="single?goods_id=<?php echo $goodskey['goods_id'] ?>">产品详情</a>
                            </div>
                            <div class="new-collections-grid1-right products-right-grids-pos-right">
                                <div class="rating">

                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                        </div>
                        <h4><a href="single?goods_id=<?php echo $goodskey['goods_id'] ?>"><?php echo $goodskey['goods_name'] ?></a></h4>
                        <p><?php echo $goodskey['goods_brief'] ?></p>
                        <div class="simpleCart_shelfItem products-right-grid1-add-cart">
                            <p> <span class="item_price"><?php echo $goodskey['goods_price'] ?>&nbsp;&nbsp;RMB</span><a class="item_add0" value="<?php echo $goodskey['goods_id'] ?>">产品详情 </a></p>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="clearfix"> </div>
            </div>
            <nav class="" data-wow-delay=".5s">
                <ul class="pagination paging" style="margin-left:65px;margin-bottom:65px; " >

                    <li>{!! $goodsList->render() !!}</li>

                </ul>
            </nav>
        </div>
        <div class="clearfix"> </div>
    </div>
    </div>
</div>
<!--//breadcrumbs -->
<!--footer -->
@include('manstreet/footer')
//footer
</body>
<script>
    $(".UpdateCate").click(function(){
        var _this = $(this);
        var cat_id = _this.attr('value');
        $.ajax({
            url:"updatelook",
            data:"cat_id="+cat_id,
            success:function(msg)
            {
                $(".box").html(msg);
            }
        })
    });
    $(".item_add0").click(function(){
        var _this = $(this);
        var goods_id = _this.attr('value');
        $.ajax({
            url:"addcart",
            data:"goods_id="+goods_id,
            success:function(msg)
            {
                if(msg==1)
                {
                    alert('加入购物车成功');
                }else if(msg==2){
                    alert('您以加入购物车,请勿重复购买');
                }else if(msg==0){
                    alert('加入购物车失败');
                }else{
                    alert('没网，没接收到信息');
                }
            }
        })
    });
</script>
</html>