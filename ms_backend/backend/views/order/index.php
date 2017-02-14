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
          <a class="button border-main" href="#add"><span class="icon-edit"></span>增加</a>
          <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button>
          <button type="submit" class="button border-red"><span class="icon-trash-o"></span> 批量删除</button>
        </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="5%">选择</th>
        <th>ID</th>       
        <th width="10%">订单号</th>
        <th>收货人</th>
        <th>支付状态</th>
        <th width="25%">配送方式</th>
         <th width="120">支付方式</th>
         <th>用户名</th>
        <th>下单时间</th>
        <th>操作</th>       
      </tr>  
      <?php foreach($result as $key =>$val) { ?>    
        <tr id="twotr">
          <td><input type="checkbox" name="id[]" value="<?php echo $val['order_id']?>" /></td>
          <td class="orderId"><?php echo $val['order_id']?></td>
          <td><?php echo $val['order_sn']?></td>
          <td><?php echo $val['consignee']?></td>  
           <td payStatus='1'>
            <?php if($val['pay_status'] == 1){ ?>
            以支付
            <?php }else if($val['pay_status'] ==0){ ?>
            未支付
            <?php } ?>
           </td>         
          <td><?php echo $val['shipping_name']?></td>
          <td><?php echo $val['pay_id']?></td>
          <td><?php echo $val['pay_name']?></td>
          <td><?php echo $val['pay_time']?></td>
          <td>
            <a class="button border-red" href="javascript:void(0)" id="del" delid="<?php echo $val['order_id']?>"><span class="icon-trash-o"></span>删除</a>
              <a class="button border-main" id="updateStatus" delid="<?php echo $val['order_id'];?>" href="javascript:void(0);"><span class="icon-edit"></span>修改支付状态</a>
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

</script>
<script>
  $(document).on('click','#del',function(){
    
    var t=confirm('您确定要删除此订单吗？');
    if(t==true)
    {
      var id = $(this).attr('delid');
      var _this = $(this);
      $.ajax({
      url:"<?php echo Url::toRoute(['order/delorder']);?>",
      data:"id="+id,
      success:function(msg)
      {
        if(msg==1){
          _this.parents('tr').remove();
        }else{
          alert('删除失败');
        }
      }
    });
    }else{
      return false;
    }
  });
  $(document).on('click','#updateStatus',function(){
    var id = $(this).attr('delid');
    var u = confirm('确定修改为支付成功状态？');
     var _this = $(this);
    if(u==true)
    {
      $.ajax({
        url:"?r=order/updateorder",
        data:"id="+id,
        success:function(msg)
        {
          if(msg=='successupdate'){
              _this.parents('tr').children().eq(4).text('以支付');
          }else{
            alert('修改状态失败');
          }
        }
      })
    }else{
      return false;
    }
  });
</script>
</body>
</html>