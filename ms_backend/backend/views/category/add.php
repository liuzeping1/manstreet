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
    <title>完整demo</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <script type="text/javascript" charset="utf-8" src="utf8-php/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="utf8-php/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="lang/zh-cn/zh-cn.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>
</head>
<body>
<form action="?r=category/insert" method="post">
<div class="panel admin-panel">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加分类</strong></div>
    <div class="body-content">
        <div class="form-x">
            <!--        <form method="post" class="form-x" action="?r=bowen/b_add" enctype="multipart/form-data">-->
            <div class="form-group">
                <div class="label">
                    <label>分类名称：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="" name="cat_name" data-validate="required:请输入分类名称" />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>排序：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="" name="sort" data-validate="required:请输入排序" />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>是否显示：</label>
                </div>·
                <div class="field">
                    <div class="tips" id="is_promote">

                        <input type="radio"  value="1" name="is_show" id="is_show" />是
                        <input type="radio"  value="0" name="is_show" id="is_show" checked="checked" />否</div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <input type="submit" class="button bg-main icon-check-square-o" value="提交">
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
