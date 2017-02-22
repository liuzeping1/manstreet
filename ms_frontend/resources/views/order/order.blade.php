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
									<td><span id="clearing" class="label label-success">去支付</span></td>
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
		var address_id  = $("input[name='address_id']").val();
		var message = $("#message").val();
		var zfb= $("#zfb").val();
		var goods_amount = $(".PriceResult").attr('value');
		//alert(goods_amount);die;
		$.ajax({
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