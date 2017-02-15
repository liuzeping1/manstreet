<?php

use yii\helpers\Html;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<div class="panel admin-panel margin-top" id="add">
    <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 增加内容</strong></div>
    <div class="body-content">
        <form method="post" class="form-x" action="?r=activity/add">
            <div class="form-group">
                <div class="label">
                    <label>活动名称：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" name="act_name" data-validate="required:请输入名称" />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>时间：</label>
                </div>
                <div class="field">
                    <!-- 时间插件 -->
                    <input type="text" class="sang_Calender" style="height:30px;" name="status_time" data-validate="required:请选择开始时间"/>-
                    <input type="text" class="sang_Calender" style="height:30px;" name="die_time" data-validate="required:请选择结束时间"/>
                    <!-- end时间插件 -->
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
                    <label>活动简介：</label>
                </div>
                <div class="field">
                    <textarea type="text" class="input" name="content" style="height:100px;width: 250px;"></textarea>
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
                    <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
</html>
<script type="text/javascript" src="./time/datetime.js"></script>