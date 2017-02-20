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
        <form method="post" class="form-x" action="?r=goodsattr/nature_add">
            <div class="form-group">
                <div class="label">
                    <label>商品属性名称：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" value="" name="goods_attr_name" data-validate="required:请输入商品属性名称" />
                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>所属商品类型：</label>
                </div>
                <div class="field">

                    <select name="cat_goods_id" style="width:130px;height: 40px;">
                        <?php foreach ($name as $k=>$v){?>
                            <option value="<?php echo $v['cat_goods_id']?>"><?php echo $v['cat_name']?></option>
                        <?php }?>
                    </select>

                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>属性类型：</label>
                </div>
                <div class="field">

                    <select name="attr_index" style="width:130px;height: 40px;">
                            <option value="0">参数</option>
                            <option value="1">规格</option>
                    </select>

                    <div class="tips"></div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>该属性值的录入方式：</label>
                </div>
                <div class="field">
                    <div class="tips">
                        <input type="radio"  value="1" name="attr_input_type" checked="checked"/>手工录入
                        <input type="radio"  value="0" name="attr_input_type"  />从下面的列表中选择(一行代表一个可选值)
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label>可选值列表：</label>
                </div>
                <div class="field">
                    <div class="tips">
                        <textarea id="textarea" readonly="readonly" style="background:#ccc;"  name="attr_values" ></textarea>
                    </div>
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

<script>
    $('input[type=radio]').click(function(){
        var val = $(this).val();
        if(val == '1'){
            $('#textarea').attr('readonly','readonly').css('background','#ccc');
        }else{
            $('#textarea').attr('readonly',false).css('background','#fff');
            $('#add').validate({
                rules:{
                    attr_values:"required"
                },
                messages:{
                    attr_values:"<font style='margin-left:30px;' color='red' >请选择待选值</font>"
                }
            })
        }
    })
</script>
</body></html>