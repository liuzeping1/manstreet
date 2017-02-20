<!DOCTYPE html>
<html>
<head>
    <title>Mail Us</title>
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
            <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>主页</a></li>
            <li class="active">个人中心</li>
        </ol>
    </div>
</div>
<!-- //breadcrumbs -->
<!-- mail -->
<div class="mail animated wow zoomIn" data-wow-delay=".5s">
    <div class="container">
        <h3>个人中心</h3>
        <p class="est">希望给您带来更多的方便，谢谢你的关注...</p>
        <div class="col-md-4 mail-grid-right animated wow slideInRight" data-wow-delay=".5s">
            @foreach($list as $k=>$v)
            <div class="mail-grid-right1">
                <img src="images/banner1.jpg" alt=" " class="img-responsive" />
                <h4><?php echo $v['user_name'] ?><span></span></h4>
                <ul class="phone-mail">
                    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i><?php echo $v['phone'] ?></li>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>Email: <a href="mailto:info@example.com"><?php echo $v['email'] ?></a></li>
                </ul>
            </div>
                @endforeach
        </div>
        <div class="mail-grids">
            <div class="grid_3 grid_5 animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
                <h3 class="bars">功能展示</h3>
                <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">个人资料</a></li>
                        <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">我的订单</a></li>
                        <li role="presentation" class="dropdown">
                            <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown" aria-controls="myTabDrop1-contents">其他功能<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="myTabDrop1" id="myTabDrop1-contents">
                                <li><a href="#dropdown1" tabindex="-1" role="tab" id="dropdown1-tab" data-toggle="tab" aria-controls="dropdown1">修改密码</a></li>
                                <li><a href="#dropdown2" tabindex="-1" role="tab" id="dropdown2-tab" data-toggle="tab" aria-controls="dropdown2">收货地址</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div id="myTabContent" class="tab-content">
                        @foreach($centerShow as $k=>$v)
                        <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">

                            昵称：<?php echo $v['user_name'] ?>
                            <hr/>
                            性别：
                            <?php
                            if($v['sex']==1)
                            {
                                echo "男";
                            }else
                            {
                                echo "女";
                            }
                            ?>
                            <hr/>
                            注册时间：<?php echo $v['reg_time'] ?>
                            <hr/>
                            邮箱:<?php echo $v['email'] ?>
                            <hr/>
                            出生日期:<?php echo $v['birthday'] ?>
                            <hr/>

                        </div>
                        @endforeach
                        <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                            <div class="bs-docs-example animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Mark</td>
                                        <td>Otto</td>
                                        <td>@mdo</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Jacob</td>
                                        <td>Thornton</td>
                                        <td>@fat</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td colspan="2">Larry the Bird</td>
                                        <td>@twitter</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                            @foreach($centerShow as $k=>$v)
                        <div role="tabpanel" class="tab-pane fade" id="dropdown1" aria-labelledby="dropdown1-tab">
                            <form action="pwd" method="post">
                            当前用户：<?php echo $v['user_name'] ?>
                            <hr/>
                            原密码：<input type="password" id="pwd" ids="<?php echo $v['user_id'] ?>"/>
                                <p id="pwd_s" style="color:red;"></p>
                            <hr/>
                            修改密码：<input type="password" name="password" id="pass" ids="<?php echo $v['user_id'] ?>"/>
                                <p id="pass_s" style="color:red;"></p>
                            <hr/>
                            <input type="submit" value="保存修改"/>
                            </form>
                        </div>
                            @endforeach
                            <script>
                                //原密码查询
                                $("#pwd").blur(function(){
                                    var id = $(this).attr('ids');
                                    var pwd = $("#pwd").val();
                                    if(pwd=="")
                                    {
                                        $("#pwd_s").html("密码不能为空");
                                    }else
                                    {
                                        $.ajax({
                                            type: "get",
                                            url: "select",
                                            data: "id="+id+"&pwd="+pwd,
                                            success: function(msg){
                                                if(msg==1)
                                                {
                                                    $("#pwd_s").html('√');
                                                }else
                                                {
                                                    $("#pwd_s").html('密码错误，请修改！');
                                                }
                                            }
                                        });
                                    }

                                })
                                //修改密码查询
                                $("#pass").blur(function(){
                                    var id = $(this).attr('ids');
                                    var pass = $("#pass").val();
                                    if(pass=='')
                                    {
                                        $("#pass_s").html("密码不能为空");
                                    }else
                                    {
                                        $.ajax({
                                            type: "get",
                                            url: "update",
                                            data: "pass="+pass+"&id="+id,
                                            success: function(msg){
                                                if(msg==1)
                                                {
                                                    $("#pass_s").html('密码重复，请修改！');

                                                }else
                                                {
                                                    $("#pass_s").html('√');
                                                }
                                            }
                                        });
                                    }
                                })
                            </script>
                        <div role="tabpanel" class="tab-pane fade" id="dropdown2" aria-labelledby="dropdown2-tab">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>姓名</th>
                                    <th>地址</th>
                                    <th>电话</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($addList as $k=>$v)
                                <tr>
                                    <td><?php echo $v['consignee'] ?></td>
                                    <td><?php echo $v['address'] ?></td>
                                    <td><?php echo $v['mobile'] ?></td>
                                    <td><a href="javascript:void(0)" id="del" ids="<?php echo $v['address_id'] ?>">删除</a></td>
                                </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                            <script>
                                $(document).on("click",'#del',function(){
                                    var confir = confirm("是否需要删除");
                                    if(confir)
                                    {
                                        var id = $(this).attr('ids');
                                        var _this = $(this);
                                        $.ajax({
                                            type: "get",
                                            url: "delete",
                                            data: "id="+id,
                                            success: function(msg){
                                                if(msg==1)
                                                {
                                                    _this.parents("tr").remove();
                                                }else
                                                {
                                                    alert("删除失败");
                                                }
                                            }
                                        });
                                    }
                                })
                            </script>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mail-grid-left animated wow slideInLeft" data-wow-delay=".5s">
                <form action="unset" method="post">
                    <hr style="width: 100px;">
                    <tr>
                        <p><td><input type="submit" value="退出"/></td></p>
                    </tr>
                </form>
            </div>
            <div class="col-md-4 mail-grid-right animated wow slideInRight" data-wow-delay=".5s">
            </div>
            <div class="clearfix"> </div>
        </div>
        <!--<iframe class="animated wow slideInLeft" data-wow-delay=".5s" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3098.7638135888296!2d-77.47669308468912!3d39.04350424592369!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b63eb3bc8da92b%3A0x78c8e09ab1cabc90!2sShopping+Plaza%2C+Ashburn%2C+VA+20147%2C+USA!5e0!3m2!1sen!2sin!4v1457602090579" frameborder="0" style="border:0" allowfullscreen></iframe>-->
    </div>
</div>
<!-- //mail -->
<!-- footer -->
@include('manstreet.footer');
<!-- //footer -->
</body>
</html