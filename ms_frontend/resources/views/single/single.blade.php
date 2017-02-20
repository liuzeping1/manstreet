<!DOCTYPE html>
<html>
<head>
    <title>商品详情页面</title>
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
    <style type="text/css">
        .for-div p{
            line-height: 24px;
        }
        .for-div p span{
            font-weight: bold;
        }
        .for-div div b{
            display: inline-block;
            width: 34px;
            height: 34px;
            background: null;
            border: 1px solid #ccc;
            margin-left: 5px;
            text-align: center;
            line-height: 34px;
            font-weight: 900;
            font-size: 14px;
            cursor: pointer;
        }
    </style>
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
            <li class="active">商品详情页</li>
        </ol>
    </div>
</div>
<!-- //breadcrumbs -->
<!-- single -->
<div class="single">
    <div class="container">
        <div class="col-md-4 products-left">
            <div class="men-position animated wow slideInUp" data-wow-delay=".5s">
                <a href="javascript:void(0)"><img src="<?php echo $good['goods_img']?>" alt=" " class="img-responsive" /></a>
                <div class="men-position-pos">
                    <h4>夏季系列</h4>
                    <h5><span>55%</span> 火爆 预售中</h5>
                </div>
            </div>
        </div>
        <div class="col-md-8 single-right">
            <div class="col-md-5 single-right-left animated wow slideInUp" data-wow-delay=".5s">
                <div class="flexslider">
                    <ul class="slides">
                        @foreach($img_path as $v)
                            <li data-thumb="{{$v}} ">
                                <div class="thumb-image"> <img src="{{$v}} " data-imagezoom="true"
                                                               class="img-responsive"> </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <!-- flixslider -->
                <script defer src="js/jquery.flexslider.js"></script>
                <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
                <script>
                    // Can also be used with $(document).ready()
                    $(window).load(function() {
                        $('.flexslider').flexslider({
                            animation: "slide",
                            controlNav: "thumbnails"
                        });
                    });
                </script>
                <!-- flixslider -->
            </div>
            <input type="hidden" name="goods_id" id="goods_id" value="<?php echo $good['goods_id'] ?>">
            <div class="col-md-7 single-right-left simpleCart_shelfItem animated wow slideInRight" data-wow-delay=".5s">
                <h3><?php echo $good['goods_name']?></h3>
                <h4><span class="item_price">$<?php echo $good['goods_price']?></span></h4>
                <div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5" checked>
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" >
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1" >
							<label for="rating1">1</label>
						</span>
                </div>
                <div class="description">
                    <h5><i>简单描述</i></h5>
                    <p><h5><?php echo $good['goods_brief']?></h5></p>
                </div>
                <div class="for-div">
                    <?php foreach($arr as $k=>$v){?>
                    <div>
                        <p class="p-style">
                            <?php echo $k.":"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?>：<span class="attr_name">未选择</span></p>
                        <div class="style-div">
                            <?php foreach($v as $kk=>$vv){?>
                            <b><?php echo $vv?></b>
                            <?php }?>
                        </div>
                    </div>
                        <?php }?>
                </div>
                    <div class="color-quality-right">
                        <h5>数量 :</h5>
                        <div class="quantity">
                            <div class="quantity-select">
                                <div class="entry value-minus">&nbsp;</div>
                                <div class="entry value" id="num">1</div>
                                <div class="entry value-plus active">&nbsp;</div>
                            </div>
                        </div>
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
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="occasional">
                    <h5>分享 :</h5>

                    <div class="colr">
                        <label class="radio"><input type="radio" name="radio"><i></i>免运费</label>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="occasion-cart">
                    <a class="item_add" href="javascript:void(0)" id="into_cart">加入购物车 </a>
                </div>
                <div class="social">
                    <div class="social-left">
                        <p>分享 :</p>
                    </div>
                    <div class="social-right">
                        <ul class="social-icons">
                            <li><a href="#" class="facebook"></a></li>
                            <li><a href="#" class="twitter"></a></li>
                            <li><a href="#" class="g"></a></li>
                            <li><a href="#" class="instagram"></a></li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
<script>
    $(function(){
        $(document).on('click','#into_cart',function(){
            var attr_name = $(".attr_name");
            var goods_id = $('#goods_id').val();
            var num = $('#num').html();
            var ids = [];
            var flag = 0;
            attr_name.each(function(i){
                var attr = attr_name.eq(i).html();
                if(attr=='未选择'){
                    flag = 1;
                    return false;
                }
                ids[i] = attr;
            })
            if(flag==1){
                return false;
            }
            $.ajax({
                type:'post',
                url:'singleCart',
                data:'goods_id='+goods_id+'&num='+num+'&ids='+ids,
                success:function(msg){
                    if(msg==2){
                        alert('请先登录');location.href='login';
                    }else{
                        alert('成功加入购物车');
                    }
                }
            })
        })
    })
</script>
            </div>
            <div class="clearfix"> </div>
            <div class="bootstrap-tab animated wow slideInUp" data-wow-delay=".5s">
                <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">商品描述</a></li>
                        <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">评论(<?php echo $com_num; ?>)</a></li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
                            <h5>商品简介</h5>
                            <p>
                                <span>
                                    <?php echo $good['goods_desc']?>
                                </span>
                            </p>
                        </div>
                        <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile" aria-labelledby="profile-tab">
                            <div class="bootstrap-tab-text-grids">
                                <?php foreach($comment as $v): ?>
                                <div class="bootstrap-tab-text-grid">
                                    <div class="bootstrap-tab-text-grid-left">
                                        <img src="images/4.png" alt=" " class="img-responsive" />
                                    </div>

                                    <div class="bootstrap-tab-text-grid-right">
                                        <ul>
                                            <li><a href="javascript:void (0)"><?php echo $v['user_name'] ?></a></li>
                                        </ul>
                                        <p><?php echo $v['content'] ?></p>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                    <?php endforeach ?>
                                <!--<div class="add-review">
                                    <h4>添加评论</h4>
                                    <form action="single" method="post">

                                        <textarea type="text"  onfocus="this.value = '';" onBlur="if (this.value == '') {this.value = '评论内容...';}" required="" id="comment">Message...</textarea>
                                        <input type="submit" value="提交" id="list">
                                    </form>
                                </div>-->
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="dropdown1" aria-labelledby="dropdown1-tab">
                            <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                        </div>
                        <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="dropdown2" aria-labelledby="dropdown2-tab">
                            <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<!-- //single -->
<!-- single-related-products -->
<div class="single-related-products">
    <div class="container">
        <h3 class="animated wow slideInUp" data-wow-delay=".5s">相关商品</h3>
        <p class="est animated wow slideInUp" data-wow-delay=".5s">化繁为简 · 让生活简单一点再简单一点</p>
        <div class="new-collections-grids">
            <div class="col-md-3 new-collections-grid">
                <?php foreach($data as $key=>$value){?>
                <div class="new-collections-grid1 animated wow slideInLeft" data-wow-delay=".8s">
                    <div class="new-collections-grid1-image">
                        <a href="single.html" class="product-image"><img src="<?php echo $value
                            ['goods_img']?>" alt=" " class="img-responsive"></a>
                        <div class="new-collections-grid1-image-pos">
                            <a href="single.html">查看详情</a>
                        </div>
                        <div class="new-collections-grid1-right">
                            <div class="rating">
                                <div class="rating-left">
                                    <img src="images/2.png" alt=" " class="img-responsive">
                                </div>
                                <div class="rating-left">
                                    <img src="images/2.png" alt=" " class="img-responsive">
                                </div>
                                <div class="rating-left">
                                    <img src="images/2.png" alt=" " class="img-responsive">
                                </div>
                                <div class="rating-left">
                                    <img src="images/2.png" alt=" " class="img-responsive">
                                </div>
                                <div class="rating-left">
                                    <img src="images/1.png" alt=" " class="img-responsive">
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </div>

                    <h4><a href="single.html"><?php echo $value['goods_name']?></a></h4>

                    <p>商品名称</p>
                    <div class="new-collections-grid1-left simpleCart_shelfItem">
                        <p> <span class="item_price"><?php echo $value['goods_price']?></span><a
                                    class="item_add" href="javascript:void (0)" id="into_cart">加入购物车 </a></p>
                    </div>

                </div>
                <?php }?>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!-- //single-related-products -->
<!-- footer -->
@include('manstreet.footer');
<script type="text/javascript">
    //第一个
    $(".for-div>div:first b").click(function(){
        var $list=$(this).html();
        $(".for-div>div:first span").html($list);
    });
    //第二个
    $(".for-div>div:eq(1) b").click(function(){
        var $list=$(this).html();
        $(".for-div>div:eq(1) span").html($list);
    });
    //第三个
    $(".for-div>div:eq(2) b").click(function(){
        var $list=$(this).html();
        $(".for-div>div:eq(2) span").html($list);
    });
    //第四个
    $(".for-div>div:eq(3) b").click(function(){
        var $list=$(this).html();
        $(".for-div>div:eq(3) span").html($list);
    });

</script>
<!-- //footer -->
<!-- zooming-effect -->
<script src="js/imagezoom.js"></script>
<!-- //zooming-effect -->
</body>
</html>