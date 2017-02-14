<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title></title>
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <title>会员添加</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <script language="javascript" type="text/javascript" src="Time/WdatePicker.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
</head>
<body>
<form action="?r=users/update" method="post">
<div class="panel admin-panel">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加会员</strong></div>
    <div class="body-content">
        <input type="hidden" name="user_id" value="<?= $re['user_id'] ?>">
        <div class="form-x">
            <!--        <form method="post" class="form-x" action="?r=bowen/b_add" enctype="multipart/form-data">-->
            <div class="form-group">
                <div class="label">
                    <label>用户名：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="<?= $re['user_name']; ?>" name="user_name" data-validate="required:请输入会员名称" />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>邮箱：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="<?= $re['email']; ?>" name="email" data-validate="required:请输入邮箱" />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>性别：</label>
                </div>
                <div class="field">
                    <input type="radio"  value="1" name="sex" id="is_show" <?php if($re['sex']==1){ echo 'checked'; } ?>/>男
                    <input type="radio"  value="0" name="sex" id="is_show" <?php if($re['sex']==0){ echo 'checked'; } ?>/>女</div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>出生日期：</label>
                </div>
                <div class="field">
                    <div class="tips" id="is_promote">
                        <input type="text"  class="input w50" onClick="WdatePicker()" value="<?= $re['birthday']; ?>" name="birthday" data-validate="required:请输入出生日期" />
                        </div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <input type="submit" class="button bg-main icon-check-square-o" value="确认修改">&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="button" class="button bg-main icon-check-square-o" onclick="history.go(-1)" value="返回">
                </div>
            </div>
        </div>
    </div>
</div>
</form>
<script type="text/javascript">

    $('#is_show').click(function(){

        var is_show=$("[name='is_show']:checked").val();
        if(is_show==1)
        {
            $('#form-group').show();

        }else
        {

            $('#form-group').hide();
        }
    })
</script>
</body></html>
