<?php
$re = DB::table('man_friend_link')->get();
$article = DB::table('man_article')->where('is_show','1')->get();
?>
<div class="footer">
    <div class="container">
        <div class="footer-grids">
            <div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".5s">
                <h3>关于我们</h3>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;究其一生，我需要的那么少，一个懂我的女人,
                    给我温润柔韧的力量，在充满挑战的事业
                    给我绵软细腻的温柔，在专注钻研的深夜
                    给我一如既往的信任，在人来人往的都市
                    生活原本简单，少一点选择，多一点时间享受生命
                    《男人街》，让生活简单一点 </p>
                {{--<p>Duis aute irure dolor in reprehenderit in voluptate velit esse.<span>Excepteur sint occaecat cupidatat--}}
						{{--non proident, sunt in culpa qui officia deserunt mollit.</span></p>--}}
            </div>
            <div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".6s">
                <h3>联系我们</h3>
                <ul>
                    <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>China BeiJing<span>Hai Dian.</span></li>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="javascript:void (0)">1534088173@qq.com</a></li>
                    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+86 152 3544 2300</li>
                </ul>
            </div>
            <div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".7s">
                <h3>友情链接</h3>
                <div class="footer-grid-left">
                    <?php foreach($re as $key => $val): ?>
                    <a href="<?php echo $val['link_url'] ?>" target="_blank"><img src="<?php echo $val['link_img'] ?>" alt="<?php echo $val['link_name'] ?>" class="img-responsive" /></a>
                    <?php endforeach; ?>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".8s">
                <h3>品牌故事</h3>
                <div class="footer-grid-left">
                    <?php foreach($article as $key => $val): ?>
                        <a href="article?art_id=<?php echo $val['art_id'] ?>"><?php echo $val['title'] ?></a>
                    <?php endforeach; ?>
                </div>
                <div class="clearfix"> </div>
            </div>
            <!--<div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".8s">-->
            <!--<h3>Blog Posts<
            /h3>-->
            <!--<div class="footer-grid-sub-grids">-->
            <!--<div class="footer-grid-sub-grid-left">-->
            <!--<a href="single.html"><img src="images/9.jpg" alt=" " class="img-responsive" /></a>-->
            <!--</div>-->
            <!--<div class="footer-grid-sub-grid-right">-->
            <!--<h4><a href="single.html">culpa qui officia deserunt</a></h4>-->
            <!--<p>Posted On 25/3/2016</p>-->
            <!--</div>-->
            <!--<div class="clearfix"> </div>-->
            <!--</div>-->
            <!--<div class="footer-grid-sub-grids">-->
            <!--<div class="footer-grid-sub-grid-left">-->
            <!--<a href="single.html"><img src="images/10.jpg" alt=" " class="img-responsive" /></a>-->
            <!--</div>-->
            <!--<div class="footer-grid-sub-grid-right">-->
            <!--<h4><a href="single.html">Quis autem vel eum iure</a></h4>-->
            <!--<p>Posted On 25/3/2016</p>-->
            <!--</div>-->
            <!--<div class="clearfix"> </div>-->
            <!--</div>-->
            <!--</div>-->
            <div class="clearfix"> </div>
        </div>
        <div class="footer-logo animated wow slideInUp" data-wow-delay=".5s">
            <h2><a href="index.html">男人街 <span>Man Street</span></a></h2>
        </div>
        <div class="copy-right animated wow slideInUp" data-wow-delay=".5s">
            <p>Copyright &copy; 2016.Company name All rights reserved.</p>
        </div>
    </div>
</div>