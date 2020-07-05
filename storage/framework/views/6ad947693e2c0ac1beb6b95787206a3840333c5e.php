<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="<?php echo e(asset('img/fav.png')); ?>">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title><?php echo $__env->yieldContent('title'); ?></title>
	<!--
		CSS
		============================================= -->
	<link rel="stylesheet" href="<?php echo e(asset('css/linearicons.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/font-awesome.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/themify-icons.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/nice-select.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/nouislider.min.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/ion.rangeSlider.css')); ?>" />
	<link rel="stylesheet" href="<?php echo e(asset('css/ion.rangeSlider.skinFlat.css')); ?>" />
	<link rel="stylesheet" href="<?php echo e(asset('css/magnific-popup.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/main.css')); ?>">
	<style type="text/css">
		.login-item{
			margin-right: 4px !important;
		}
		.auth{
			color:#FF6D00 !important;
		}
	</style>

	<?php echo $__env->yieldContent('extra-css'); ?>

</head>

<body>

	<!-- Start Header Area -->
	<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.html"><!-- <img src="img/logo.png" alt=""> --></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item">
								<a class="nav-link" href="<?php echo e(route('landing-page')); ?>">Home</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="<?php echo e(route('shop.index')); ?>">Shop</a>
							</li>
								
							<li class="nav-item">
								<a class="nav-link cart" href="<?php echo e(route('cart.index')); ?>">
								Cart
								</a>
								<?php if(Cart::instance('default')->count() > 0): ?>
									<div class="badge badge-pill badge-primary" style="color: #FFF;">
										<?php echo e(Cart::instance('default')->count()); ?>

									</div>
								<?php endif; ?>
							</li>

							<!-- Authentication Links -->
	                        <?php if(auth()->guard()->guest()): ?>
	                            <li class="nav-item login-item">
	                                <a class="nav-link auth" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a> |
	                            </li>
	                            <?php if(Route::has('register')): ?>
	                                <li class="nav-item">
	                                    <a class="nav-link auth" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
	                                </li>
	                            <?php endif; ?>
	                        <?php else: ?>
	                            <li class="nav-item dropdown">
	                                <a id="navbarDropdown" class="nav-link dropdown-toggle auth" href="<?php echo e(route('users.edit')); ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
	                                    <?php echo e(Auth::user()->name); ?> <i class="fa fa-angle-down" aria-hidden="true"></i> <span class="caret"></span>
	                                </a>

	                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
	                                   <!-- User Dashboard -->
	                                    <a class="dropdown-item" href="<?php echo e(route('users.edit')); ?>">
	                                        My Account
	                                    </a>

	                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
	                                       onclick="event.preventDefault();
	                                                     document.getElementById('logout-form').submit();">
	                                        <?php echo e(__('Logout')); ?>

	                                    </a>

	                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
	                                        <?php echo csrf_field(); ?>
	                                    </form>
	                                </div>
	                            </li>
	                        <?php endif; ?>

						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item">
								<button class="search">
									<span class="lnr lnr-magnifier" id="search"></span>
								</button>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between" method="GET" action="<?php echo e(route('search')); ?>">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here" name="query" value="<?php echo e(request()->query('query')); ?>">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- End Header Area -->

	<?php echo $__env->yieldContent('content'); ?>

	<!-- start footer Area -->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>About Us</h6>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore
							magna aliqua.
						</p>
					</div>
				</div>
				<div class="col-lg-4  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Newsletter</h6>
						<p>Stay update with our latest</p>
						<div class="" id="mc_embed_signup">

							<form target="_blank" novalidate="true" action="#"
							 method="get" class="form-inline">

								<div class="d-flex flex-row">

									<input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"
									 required="" type="email">


									<button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
									<div style="position: absolute; left: -5000px;">
										<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
									</div>

								</div>
								<div class="info"></div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget mail-chimp">
						<h6 class="mb-20">Instragram Feed</h6>
						<ul class="instafeed d-flex flex-wrap">
							<li><img src="<?php echo e(asset('img/i1.jpg')); ?>" alt=""></li>
							<li><img src="<?php echo e(asset('img/i2.jpg')); ?>" alt=""></li>
							<li><img src="<?php echo e(asset('img/i3.jpg')); ?>" alt=""></li>
							<li><img src="<?php echo e(asset('img/i4.jpg')); ?>" alt=""></li>
							<li><img src="<?php echo e(asset('img/i5.jpg')); ?>" alt=""></li>
							<li><img src="<?php echo e(asset('img/i6.jpg')); ?>" alt=""></li>
							<li><img src="<?php echo e(asset('img/i7.jpg')); ?>" alt=""></li>
							<li><img src="<?php echo e(asset('img/i8.jpg')); ?>" alt=""></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>Follow Us</h6>
						<p>Let us be social</p>
						<div class="footer-social d-flex align-items-center">
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-dribbble"></i></a>
							<a href="#"><i class="fa fa-behance"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
				<p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
				</p>
			</div>
		</div>
	</footer>
	<!-- End footer Area -->
	
	<?php echo $__env->yieldContent('extra-js'); ?>

	<script src="<?php echo e(asset('js/vendor/jquery-2.2.4.min.js')); ?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="<?php echo e(asset('js/vendor/bootstrap.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/jquery.ajaxchimp.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/jquery.nice-select.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/jquery.sticky.js')); ?>"></script>
	<script src="<?php echo e(asset('js/nouislider.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/jquery.magnific-popup.min.js')); ?>"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="<?php echo e(asset('js/gmaps.min.js')); ?>"></script>
	<script src="<?php echo e(asset('js/main.js')); ?>"></script>
	
</body>

</html>
<?php /**PATH C:\xampp\htdocs\ecommerce-application\resources\views/layouts/theme.blade.php ENDPATH**/ ?>