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
	<?php echo $__env->make('manstreet/top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<!-- //header -->
<!-- breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>首页</a></li>
				<li class="active"><?php if($articleList['art_id']==28){ echo '关于我们'; }else{ echo '文章详情'; } ?></li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!--typography-page -->
	<div class="typo">
		<div class="container">
			<div class="typo-grids">
			<h3 class="title animated wow zoomIn" data-wow-delay=".5s"><?php echo e($articleList->title); ?></h3>
			<p class="est animated wow zoomIn" data-wow-delay=".5s">
				<?php echo e($articleList->add_time); ?>/
				<?php echo e($articleList->author); ?>/<?php echo e($articleList->description); ?>

			</p>
			<div class="grid_3 grid_4 animated wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
				<?php /*<h3 class="hdg">主体内容</h3>*/ ?>
				<div class="bs-example">
					<table class="table">
						<tbody>
						<?php echo $articleList['content'] ?>
						</tbody>
					</table>
				</div>
			</div>

			</div>
		</div>
	</div>
<!-- footer -->
	<?php echo $__env->make('manstreet/footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>;
<!-- //footer -->
</body>
</html>