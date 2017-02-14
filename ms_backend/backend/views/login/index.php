<?php

use yii\helpers\Html;
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>『豪情』后台管理</title>
    <link href="css/admin_login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="admin_login_wrap">
    <h1>后台管理</h1>
    <form action="?r=login/add" method="post" onsubmit="return sub()">
    <div class="adming_login_border">
        <div class="admin_input">
            <form action="index.html" method="post" id="myform">
                <ul class="admin_items">
                    <li>
                        <label for="user">用户名：</label>
                        <input type="text" name="username" id="user" size="40" class="admin_input_style" onblur="u1()"/>
                        <p id="user_s" style="color: red"></p>
                    </li>
                    <li>
                        <label for="pwd">密码：</label>
                        <input type="password" name="password" id="pwd" size="40" class="admin_input_style" onblur="p2()"/>
                        <p id="pwd_s" style="color: red"></p>
                    </li>
                    <li>
                        <input type="submit" tabindex="3" value="提交" class="btn btn-primary" />
                    </li>
                </ul>
            </form>
        </div>
    </div>
    </form>
    <p class="admin_copyright"><a tabindex="5" href="#">返回首页</a> &copy; 2014 Powered by <a href="http://jscss.me" target="_blank">有主机上线</a></p>
</div>
</body>
<script src="js/jquery.js"></script>
<script>
    function u1()
    {
        var user = $("#user").val();
        if(user=="")
        {
            $("#user_s").html('用户名不能为空');
            return false;
        }else
        {
            $("#user_s").html("√");
            return true;
        }
    }

    function p2()
    {
        var pwd = $("#pwd").val();
        if(pwd =="")
        {
            $("#pwd_s").html('密码不能为空');
            return false;
        }else
        {
            $("#pwd_s").html("√");
            return true;
        }
    }
    function sub()
    {
        if(u1() && p2())
        {
            return true;
        }else
        {
            return false;
        }
    }

</script>
</html>