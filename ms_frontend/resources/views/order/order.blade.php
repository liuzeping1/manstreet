<!DOCTYPE html>
<html>
<head>
	<title>《男人街》极简潮流生活馆</title>
	<!-- for-mobile-apps -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Best Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //for-mobile-apps -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<script src="js/jquery.min.js"></script>
	<script src="js/simpleCart.min.js"> </script>
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
	<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
	<link href="css/animate.min.css" rel="stylesheet">
	<script src="js/wow.min.js"></script>
	<script>
		new WOW().init();
	</script>
	<!-- //animation-effect -->
</head>

<body>
<!-- header -->
@include('manstreet/top')
<!-- //header -->
<!-- breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
			<li><a href="index"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>首页</a></li>
			<li class="active">确认订单</li>
		</ol>
	</div>
</div>
<!-- //breadcrumbs -->
<!--typography-page -->
<div class="typo">
	<div class="container">
		<div class="typo-grids">
			<h3 class="title animated wow zoomIn" data-wow-delay=".5s">请确认您的订单</h3>
			<p class="est animated wow zoomIn" data-wow-delay=".5s">

			</p>
			<div class="grid_3 grid_4 animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
				<h3 class="hdg">确认收货人信息</h3>
				<div class="bs-example">
					<table class="table">
						<tbody>
						<div class="bs-docs-example animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
							<table class="table">
								<thead>
								<tr>
									<th>操作</th>
									<th>收货人</th>
									<th>收货地址</th>
									<th>电话</th>

								</tr>
								</thead>
								<tbody>
								@foreach($addressList as $addressKey)
									<tr>
										<td><input type="radio" name="address_id" value="<?php echo $addressKey['address_id'] ?>"></td>
										<td><?php echo $addressKey['consignee'] ?></td>
										<td>
											<?php echo $addressKey['province'] ?>
											<?php echo $addressKey['city'] ?>
											<?php echo $addressKey['address'] ?>
										</td>
										<td>
											<?php echo $addressKey['mobile'] ?>
										</td>

									</tr>
								@endforeach
								</tbody>
							</table>
						</div>
						</tbody>
					</table>
				</div>
			</div>
			<!--改动-->
			<div class="grid_3 grid_4 animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
				<h3 class="hdg">添加收货人信息</h3>
				<div class="input-group animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
					<span class="input-group-addon" id="basic-addon1"></span>
					<input type="text" class="form-control" id="consignee" placeholder="收货人姓名" aria-describedby="basic-addon1">
				</div>
				<div class="input-group animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
					<span class="input-group-addon" id="basic-addon1"></span>
					<input type="text" class="form-control" id="province" placeholder="收货人省份" aria-describedby="basic-addon1">
				</div>
				<div class="input-group animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
					<span class="input-group-addon" id="basic-addon1"></span>
					<input type="text" class="form-control" id="city" placeholder="收货人市区" aria-describedby="basic-addon1">
				</div>
				<div class="input-group animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
					<span class="input-group-addon" id="basic-addon1"></span>
					<input type="text" class="form-control" id="address" placeholder="详细地址" aria-describedby="basic-addon1">
				</div>
				<div class="input-group animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
					<span class="input-group-addon" id="basic-addon1"></span>
					<input type="text" class="form-control" id="zipcode" placeholder="邮政编码" aria-describedby="basic-addon1">
				</div>
				<div class="input-group animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
					<span class="input-group-addon" id="basic-addon1"></span>
					<input type="text" class="form-control" id="mobile" placeholder="手机号码" aria-describedby="basic-addon1">
				</div>
				<div class="input-group animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
				<span style="float: left" id="add_into"><a href="javascript:void (0)"><span class="label label-warning">添加收货地址</span></a></span>
				</div>
			</div>
			<script>
				$(function(){
					$(document).on('click','#add_into',function(){
						var consignee = $('#consignee').val();
						var province = $('#province').val();
						var city = $('#city').val();
						var address = $('#address').val();
						var zipcode = $('#zipcode').val();
						var mobile = $('#mobile').val();
						$.ajax({
							type:'post',
							url:'add_into',
							data:'consignee='+consignee+'&province='+province+ '&city='+city
								+'&address='+address+'&zipcode='+zipcode+'&mobile='+mobile,
							success:function(msg){
								if(msg==0){
									location.reload();
								}else if(msg==1){
									location.href='index'
								}else if(msg==2){
									alert('请先登录');
									location.href='login'
								}else{
									alert('收货地址添加失败');
									location.href='login'
								}
							}
						})
					})
				})
			</script>
			<!-- 结束 -->
			<div class="grid_3 grid_4 animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
				<h3 class="hdg">配送方式</h3>
				<div class="bs-example">
					<table class="table">
						<tbody>
						<div class="bs-docs-example animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
							<table class="table">
								<thead>
								<tr>
									<th>选择</th>
									<th>快递名称</th>
								</tr>
								</thead>
								<tbody>
								@foreach($shippingWay as $ship)
								<tr>
									<td><input type="radio" name="way" <?php if($ship['shipping_code']==3){ echo "checked"; } ?> value="<?php echo $ship['shipping_id'] ?>"></td>
									<td ><?php echo $ship['shipping_name'] ?></td>
								</tr>
								@endforeach
								</tbody>
							</table>
						</div>
						</tbody>
					</table>
				</div>
			</div>
			<div class="grid_3 grid_4 animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
				<h3 class="hdg">支付方式</h3>
				<div class="bs-example">
					<table class="table">
						<tbody>
						<div class="bs-docs-example animated wow fadeInUp animated" data-wow-duration="1000ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 500ms; animation-name: fadeInUp;">
							<table class="table table-bordered">
								<thead>
								<tr>
									<th><input type="radio" value="支付宝" id="zfb" checked="checked"></th>
									<th>支付宝</th>
								</tr>
								<tr>
									<th>订单留言</th>
									<th><input type="text" name="message" id="message"></th>
								</tr>
								</thead>
								<tbody>
							</table>
						</tbody>
					</table>
				</div>
			</div>

			<div class="grid_3 grid_4 animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
				<h3 class="hdg">商品信息</h3>
				<div class="bs-example">
					<table class="table">
						<tbody>
						<div class="bs-docs-example animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
							<table class="table">
								<thead>
								<tr>
									<th>商品名称</th>
									<th>规格</th>
									<th>价格</th>
									<th>数量</th>
								</tr>
								@foreach($shopCart as $shop)
								<tr>
									<th class="goods_name"><?php echo $shop['goods_name'] ?></th>
									<th class="goods_sn"><?php echo $shop['attr_value'] ?></th>
									<th class="AllPrice"><?php echo $shop['goods_price'] ?></th>
									<th class="buy_number"><?php echo $shop['buy_number'] ?></th>
								</tr>
								@endforeach
								</thead>
								<tbody>
								<tr>
									<td>&nbsp;</td>
									<td></td>
									<td>应付金额： <span class="PriceResult" value="{{$arr}}">{{$arr}}</span>元</td>
									<td>
										<span id="clearing" class="label label-success">去支付</span>
									</td>
								</tr>
								</tbody>
							</table>
						</div>
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>
</div>
<!-- footer -->
@include('manstreet/footer')
<!-- //footer -->
</body>
<script>
	$("#clearing").click(function(){
		var shippingway = $("input[name='way']:checked").val();
		var address_id  = $("input[name='address_id']:checked").val();
		var message = $("#message").val();
		var zfb= $("#zfb").val();
		var goods_amount = $(".PriceResult").attr('value');
		//alert(goods_amount);die;
		$.ajax({
			type:'post',
			url:"clearing",
			data:"shippingway="+shippingway+"&zfb="+zfb+"&address_id="+address_id+"&message="+message+"&goods_amount="+goods_amount,
			success:function(msg)
			{
				if(msg==0)
				{
					alert('订单生成失败');
				}else{
					alert('订单生成成功');location.href='pay?pay='+msg;
				}
			}
		})



	})
</script>
</html>