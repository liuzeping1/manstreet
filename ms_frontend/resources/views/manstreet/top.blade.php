<?php
use Symfony\Component\HttpFoundation\Session\Session;

$session = new Session();
$users = $session->get('users');
//查询购物车及计算购物车总价
$re = DB::table('man_cart')->where('user_id',$users['user_id'])->get();
$count = DB::table('man_cart')->where('user_id',$users['user_id'])->count();
        $num = '';
        foreach($re as $key => $val ){
            $num += $val['goods_price']*$val['buy_number'];
        }
//查询所有分类
        $category = DB::table('man_category')->orderBy('sort')->get();
?>
<div class="header">
    <div class="container">
        <div class="header-grid">
            <div class="header-grid-left animated wow slideInLeft" data-wow-delay=".5s">
                <ul>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="javascript:void (0)">1534088173@qq.com</a></li>
                    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+86 <span>152</span> 35442300</li>
                    <?php if($users['user_name']){ ?>
                    <li><i class="glyphicon glyphicon-book" aria-hidden="true"></i>你好 <a href="center"><?php echo $users['user_name'] ?></a></li>
                    <li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="unset">退出</a></li>
                    <?php }else{ ?>
                    <li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="login">登录</a></li>
                    <li><i class="glyphicon glyphicon-book" aria-hidden="true"></i><a href="register">注册</a></li>
                    <?php } ?>

                </ul>
            </div>
            <div class="header-grid-right animated wow slideInRight" data-wow-delay=".5s">
                <ul class="social-icons">
                    <li><a href="javascript:void (0)" class="facebook"></a></li>
                    <li><a href="javascript:void (0)" class="twitter"></a></li>
                    <li><a href="javascript:void (0)" class="g"></a></li>
                    <li><a href="javascript:void (0)" class="instagram"></a></li>
                </ul>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="logo-nav">
            <div class="logo-nav-left animated wow zoomIn" data-wow-delay=".5s">
                <h1><a href="index"><img src="images/logo3.jpg" alt=""><span></span></a></h1>
            </div>
            <div class="logo-nav-left1">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header nav_2">
                        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                        <ul class="nav navbar-nav">
                            <li><a href="index">首页</a></li>
                            <li><a href="product">所有商品</a></li>
                            <li><a href="article?art_id=29">型男蜕变</a></li>
                            <li><a href="article?art_id=28">关于我们</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="logo-nav-right">
                <div class="search-box">
                    <div id="sb-search" class="sb-search">
                        <form>
                            <input class="sb-search-input" placeholder="请输入商品名称" name="search" type="search" id="search">
                            <input class="sb-search-submit" type="submit" value="">
                            <span class="sb-icon-search"> </span>
                        </form>
                    </div>
                </div>
                <!-- search-scripts -->
                <script src="js/classie.js"></script>
                <script src="js/uisearch.js"></script>
                <script>
                    new UISearch( document.getElementById( 'sb-search' ) )
                </script>
                <!-- //search-scripts -->
            </div>
            <div class="header-right">
                <div class="cart box_1">
                    <a href="cart">
                        <h3> <div class="total">
                                <span ><?php if($num==''){ echo '0.00'; }else{ echo $num; } ?> RMB</span> (<?php echo $count ?> 件)</div>
                            <img src="images/bag.png" alt="" />
                        </h3>
                    </a>
                    {{--<p><a href="javascript:void (0)" class="simpleCart_empty">购物车</a></p>--}}
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>