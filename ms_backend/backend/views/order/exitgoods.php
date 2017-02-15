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
          <input id="mpass" class="input w50" name="orderSn" size="50" placeholder="请输入订单号码" data-validate="required:请输入订单号码" type="text">
          <button class="button bg-main icon-check-square-o" type="button" id="searchResult"> 查询</button>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
          <button type="button" class="button border-red" id="allDel"><span class="icon-trash-o"></span> 批量删除</button>
        </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="5%">选择</th>
        <th>ID</th>       
        <th width="10%">订单号</th>
        <th>商品名称</th>
        <th>退货时间</th>
        <th>操作</th>   
      </tr>  
      <?php foreach($result as $key =>$val) { ?>    
        <tr id="twotr">
          <td><input type="checkbox" name="id[]" value="<?php echo $val['exit_id']?>" /></td>
          <td class="orderId"><?php echo $val['exit_id']?></td>
          <td><?php echo $val['order_sn']?></td>
          <td><?php echo $val['goods_name']?></td>  
          <td><?php echo $val['apply_time']?></td>
          <td>
              <div class="field"> 
                <select class="input w50" if()   obt="<?php echo $val['exit_id']?>" name="cid" id="exitresult">
                  <option value="">请审核此退货</option>
                  <option value="1" <?php if($val['exit_status']==1){ echo "selected"; } ?>>审核通过</option>
                  <option value="2" <?php if($val['exit_status']==2){ echo "selected"; } ?>>产品有损耗，不通过</option>
                  <option value="3" <?php if($val['exit_status']==3){ echo "selected"; } ?>>产品信息与实际不符合</option>
                </select>
                <button type="button" class="buttons border-red" name="delOne" btn="<?php echo $val['exit_id']?>"><span class="icon-trash-o"></span>删除</button>
                <div class="tips" title=""></div>
              </div>
          </td>
        </tr>
      <?php } ?>
      <tr>
        <td colspan="8">
          <?php echo LinkPager::widget(['pagination'=>$pages]);?>
        </td>
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
$("#allDel").click(function(){
  var str = new string();
  $("input[name='id[]']").each(function(){

  })
})

$(".input").change(function(){
  var t = confirm('确定修改状态?');
  if(t==true)
  {
    var v = $(this).val();
    var id = $(this).attr('obt');
    $.ajax({
      url:"?r=order/updatestatus",
      data:"v="+v+'&id='+id,
      success:function(msg){
        if(msg=='successupdate'){
          alert('修改状态成功');
        }else{
          alert('修改状态失败');
        }
      }
    })
  }else{
    return false;
  }
})
  $(".buttons").click(function(){
    var id = $(this).attr('btn');
    
    $.ajax({
      var _this = $(this);
      url:"?r=order/exitdelete",
      data:"id="+id,
      success:function(msg)
      {
        if(msg==successdelgoods)
        { 
          _this.parents('tr').remove();
        }else{
          alert('删除失败');
        }
      }
    })
  });
</script>
<script>
    
</script>
</body>
</html>