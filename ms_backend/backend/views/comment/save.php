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
<form action="?r=comment/update" method="post">
<div class="panel admin-panel">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>评论修改页面</strong></div>
    <div class="body-content">
        <input type="hidden" name="comment_id" value="<?= $re['comment_id'] ?>">
        <div class="form-x">
            <!--        <form method="post" class="form-x" action="?r=bowen/b_add" enctype="multipart/form-data">-->
            <div class="form-group">
                <div class="label">
                    <label>用户邮箱：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="<?= $re['email']; ?>" disabled name="email" data-validate="required:用户邮箱" />
                    <div class="tips"></div>

                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>商品名称：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="<?= $re['goods_name']; ?>" disabled name="goods_name" data-validate="required:商品名称" />
                    <div class="tips"></div>

                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>评论星级：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="<?= $re['comment_rank']; ?>" name="comment_rank" data-validate="required:必须为数字1~5" />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>审核状态：</label>
                </div>
                <div class="field">
                            <input name="status" value="1" type="radio" <?php if($re['status']==1){ echo "checked"; } ?>>通过
                            <input name="status" value="0"  type="radio" <?php if($re['status']==0){ echo "checked"; } ?>>不通过
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>评论内容：</label>
                </div>
                <div class="field">
                    <div class="tips" id="is_promote">
                        <textarea name="content" class="input w50" cols="30" rows="10"><?= $re['content']; ?></textarea>
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
</body></html>
