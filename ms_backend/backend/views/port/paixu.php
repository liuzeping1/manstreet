<?php
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<!doctype html>
<html lang="en">
<script src="js/jquery.js"></script>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<table>
    <tr>
        <td>选项</td>
        <td>序号</td>
        <td>商品名称</td>

    </tr>
    <?php foreach($name as $k=>$v){?>

    <tr>
        <td><input type="checkbox" value="<?php echo $v['id']?>" name="id[]"><?php echo $v['id']?></td>
        <td><?php echo $v['xuhao']?></td>
        <td><?php echo $v['name']?></td>
    </tr>

    <?php }?>

</table>
<tr><a href="#">对比</a><a href="#" class="pai">排序</a></tr>
<?php

echo LinkPager::widget([
    'pagination' => $pages,
]);
?>
</body>
<script>
    $('.pai').click(function(){
//       var id="";
       var id= $("[name='id[]']:checked").length;
       if(id==2)
       {
           alert(1213);
       }
    })
</script>
</html>