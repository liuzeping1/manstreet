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
<script src="./city.min.js"></script>
<script src="./jquery.cityselect.js"></script>
</head>
<body>
<div class="panel admin-panel margin-top" id="add">
  <div class="panel-head"><strong><span class="icon-pencil-square-o"></span> 订单添加</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="?r=order/orderaddmessage">    
      <div class="form-group">
        <div class="label">
          <label>订单号：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" value="" name="order_sn" data-validate="required:请输入订单号" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>购买人：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="consignee" value=""  data-validate="required:请输入买家的姓名" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>邮编：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="zipcode" value=""  data-validate="required:,number:请输入您的邮编" />
          <div class="tips"></div>
        </div>
      </div>
            <div class="form-group">
        <div class="label">
          <label>请选择地区：</label>
        </div>
        <div class="field">
          <div id="city_2">
                    <select class="prov" style="padding:5px 15px; border:1px solid #ddd;" name="province"></select> 
                    <select class="city" style="padding:5px 15px; border:1px solid #ddd;" name="city" disabled="disabled"></select>
                    <select class="dist" style="padding:5px 15px; border:1px solid #ddd;" disabled="disabled"></select>
          </div>
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>详细地址：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="address" value=""  data-validate="required:请您输入详细地址" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>电话：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="mobile" value=""  data-validate="required:请输入您的电话" />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>配送方式：</label>
        </div>
        <div class="field">
            <select name="shipping_name" style="padding:5px 15px; border:1px solid #ddd;" onchange="changeisvouch(this)">
            <?php foreach($shippingResult as $key =>$shippingVal) { ?>
            <option value="<?php echo $shippingVal['shipping_name']?>"><?php echo $shippingVal['shipping_name']?></option>
            <?php } ?>
            </select> 
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>支付方式：</label>
        </div>
        <div class="field">
            <select name="pay_name" style="padding:5px 15px; border:1px solid #ddd;" onchange="changeisvouch(this)">
            <option value="支付宝">支付宝</option>
            </select> 
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>订单状态：</label>
        </div>
        <div class="field">
            <select name="pay_status" style="padding:5px 15px; border:1px solid #ddd;" onchange="changeisvouch(this)">
            <option value="0">未处理</option>
            <option value="1">以处理</option>
            </select> 
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>发货状态：</label>
        </div>
        <div class="field">
            <select name="shipping_status" style="padding:5px 15px; border:1px solid #ddd;" onchange="changeisvouch(this)">
            <option value="1">以发货</option>
            <option value="0">未发货</option>
            </select> 
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
<script>
  $("#city_2").citySelect({prov:"南京",nodata:"none"});
</script>
</html>