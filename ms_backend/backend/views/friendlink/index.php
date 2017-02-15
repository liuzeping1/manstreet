<?php
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\base;
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
<form method="post" action="">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 订单管理</strong></div>
    <div class="padding border-bottom">
      <ul class="search">
        <li>
          <a class="button border-main" href="?r=friendlink/addlist"><span class="icon-edit"></span>增加</a>
          <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
          <button type="submit" class="button border-red"><span class="icon-trash-o"></span> 批量删除</button>
        </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
          <tr>
            <th width="5%">choose</th>
            <th>ID</th>
            <th width="10%">name</th>
            <th>link</th>
            <th>photo</th>
            <th width="25%">操作</th>
          </tr>
          <?php foreach($result as $k =>$val) { ?>
          <tr>
            <th width="5%"><input type="checkbox" name="id[]" value="<?php echo $val['link_id']?>"></th>
            <th><?php echo $val['link_id']?></th>
            <th width="10%"><?php echo $val['link_name']?></th>
            <th><a href="<?php echo $val['link_url']?>"><?php echo $val['link_url']?></a></th>
            <th><img width="200px" height="100px" src="<?php echo $val['link_img']?>" alt=""></th>
            <th width="25%">
              <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 修改</button>
              <a class="button border-main" href="?r=friendlink/adddel&id=<?php echo $val['link_id']?>"><span class="icon-edit"></span>删除</a>
            </th>
          </tr>
          <?php } ?>
          <tr>
            <td colspan="8"> <?php echo LinkPager::widget(['pagination'=>$pages]);?></td>
          </tr>
    </table>
  </div>
</form>
<script type="text/javascript">

$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
      if (this.checked) {
          this.checked = false;
      }
      else {
          this.checked = true;
      }
  });
})

/*function DelSelect(){
    var Checkbox=false;
     $("input[name='id[]']").each(function(){
      if (this.checked==true) {     
        Checkbox=true;  
      }
    });
    if (Checkbox){
        var t=confirm("您确认要删除选中的内容吗？");
        if (t==false) return false;         
    }
    else{
        alert("请选择您要删除的内容!");
        return false;
    }
}*/
</script>
</body>
</html>