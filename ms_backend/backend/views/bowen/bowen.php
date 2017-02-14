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
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加内容</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="?r=bowen/addfrom">

            <div class="form-group">
                <div class="label">
                    <label>文章标题：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="" name="title" data-validate="required:请输入标题" />
                    <div class="tips"></div>
                </div>
            </div>


            <div class="form-group">
                <div class="label">
                    <label>文章作者：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="" name="author" data-validate="required:请输入作者" />
                    <div class="tips"></div>
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>是否显示：</label>
                </div>
                <div class="field">
                    <input type="radio"   name="is_show"  value="1"/>是
                    <input type="radio"  name="is_show"  value="0"/>否
                </div>
            </div>

            <div class="form-group">
                <div class="label">
                    <label>文章描述：</label>
                </div>
                <div class="field">
                    <textarea class="input" name="description" style=" height:50px;"></textarea>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>文章内容：</label>
                </div>
                <div class="field">
                    <textarea name="content" class="input" style="height:450px; border:1px solid #ddd;"></textarea>
                    <div class="tips"></div>
                </div>
            </div>

                <div class="field">
                    <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
                </div>
            </div>
        </form>
    </div>
</div>

</body></html>