<?php
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;


?>
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
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
    <div class="padding border-bottom">
        <button type="button" class="button border-yellow" onclick="window.location.href='#add'"><span class="icon-plus-square-o"></span> 添加分类</button>
    </div>
    <table class="table table-hover text-center">
        <tr>
            <th width="5%">ID</th>

            <th width="15%">一级分类</th>
            <th width="10%">排序</th>
            <th width="10%">操作</th>
        </tr>
        <?php foreach($name as $key=>$value){?>
        <tr>
            <?php if($value['is_show']==1){?>
            <?php if($value['that_id']==0){?>
            <th width="10%"><?php echo $value['that_id']?></th>
            <th width="10%"><?php echo $value['cat_name']?></th>
            <td class="f_sort" si="0"  id="<?php echo $value['cat_id']?>"><?php echo $value['sort']?></td>
            <td><div class="button-group"> <a class="button border-main" href="cateedit.html"><span class="icon-edit"></span> 修改</a> <a class="button border-red" href="javascript:void(0)" onclick="return del(<?php echo $value['cat_id']?>)"><span class="icon-trash-o" ></span> 删除</a> </div></td>
            <?php }?>
        </tr>
        <?php }?>
        <?php }?>

    </table>
</div>
<script type="text/javascript">
    function del(id,mid){
        if(confirm("您确定要删除吗?")){
            var url="?r=classification/dle"
            $.get(url,{id:id},function(mms){
                if(mms)
                {
                    location.reload();
                }
            })
        }
    }
</script>
<div class="panel admin-panel margin-top">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>添加内容</strong></div>
    <div class="body-content">
            <div class="form-group">
                <div class="label">
                    <label>上级分类：
                    <div class="field">

                        <select name="s_parent_id" class="input w50" id="fen">
                            <option value="0">置顶分类</option>
                            <?php foreach($name as $k=>$v){?>
                                <option value="<?php echo $v['cat_id']?>" class="s_id"><?php echo $v['cat_name']?></option>
                            <?php }?>
                        </select>
                        <div class="tips">不选择上级分类默认为一级分类</div>
                    </div>
                    </label>
                </div>

            </div>
    </div>
    <div class="body-content">
            <div class="form-group">
                <div class="label">
                    <label>分类标题：</label>
                </div>
                <div class="field">
                    <input type="text" class="input w50" id="s_name"  />

                    <div class="tips"></div>
                </div>
            </div>
    </div>
    <div class="body-content">
        <div class="form-group">
            <div class="label">
                <label>分类排序：</label>
            </div>
            <div class="field">
                <input type="text" class="input w50" id="sort"  />

                <div class="tips"></div>
            </div>
        </div>
    </div>
    <div class="body-content">
            <div class="form-group">
                <div class="label">
                    <label></label>
                </div>
                <div class="field">
<!--                    <input type="button" value="提交" id="fen">-->
                    <button class="button bg-main icon-check-square-o" type="button" id="ti"> 提交</button>
                </div>
            </div>
    </div>

</div>
</body>
<script>
    //    //分类
    var s_id="";
    var s_name="";
    var sort_="";
        $('#fen').change(function(){
            s_id=$(this).val();
            alert(s_id);
        })
        $('#s_name').blur(function(){
            s_name=$(this).val();
        })
        $('#sort').blur(function(){
            sort_=$(this).val();
        })


    $('#ti').click(function(){
            var f_name=s_name;
            var that_id=s_id;
            var sort=sort_;
            var url='?r=classification/map'
            if(f_name=='')
            {
                alert('分类不能为空');
            }
            else
            {
                $.get(url,{'that_id':s_id,'f_name':s_name,'sort':sort_},function(mms){
                    if(mms==1)
                    {
                        location.reload();
                    }
                })
            }

        })
      //及点击改
        $('.f_sort').click(function(){
           if($(this).attr('si')==0)
           {
               $(this).attr('si',1);
               var test='<input type="text" value="'+$(this).html()+'" class="eccsee"/>';
               var sor=$(this).html(test);
           }
        })
        $('table').delegate('.eccsee','blur',function(){
            var f_sort=$(this).val();
            var  id =  $(this).parent().attr('id');
            var _this=$(this).parent();
            var url='?r=classification/upt'
            $.get(url,{'f_sort':f_sort,'id':id},function(mms)
            {
                if(mms)
                {
                    _this.html(f_sort).attr('si',0)
                }
            })
        })
</script>
</html>