<?php $__env->startSection('title', $product->name); ?>

<?php $__env->startSection('extra-css'); ?>
	<style type="text/css">

		.img-fluid{
			width: 540px;
			height: 450px;
		}

		.mightLike-img{
			width: 120px;
    		height: 100px;
		}
	</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1><?php echo e($product->name); ?></h1>
					<nav class="d-flex align-items-center">
						<a href="<?php echo e(route('landing-page')); ?>">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="single-product.html"><?php echo e($product->name); ?></a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
	<div>
        <?php if(session()->has('success')): ?>
            <div class="alert alert-success mt-1 text-center"><?php echo e(session('success')); ?></div>
        <?php endif; ?>

        <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger mt-1 text-center">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                </ul>
            </div>
        <?php endif; ?>
    </div>
	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
					<div class="s_Product_carousel">
						<div class="single-prd-item">
							<img class="img-fluid" src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="">
						</div>
					</div>
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3><?php echo e($product->name); ?></h3>
						<h2>$<?php echo e($product->price); ?></h2>
						<p class="prod_pragraph"><?php echo e($product->details); ?></p>
						<p class="prod_pragraph"><?php echo $product->description; ?></p>
						
						<div class="card_area d-flex align-items-center">
							<form action="<?php echo e(route('cart.store')); ?>" method="POST">
								<?php echo csrf_field(); ?>
								<input type="hidden" name="id" value="<?php echo e($product->id); ?>">
								<input type="hidden" name="name" value="<?php echo e($product->name); ?>">
								<input type="hidden" name="price" value="<?php echo e($product->price); ?>">
								<button type="submit" class="primary-btn">Add to Cart</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	<!-- Start related-product Area -->
	<section class="related-product-area section_gap_bottom" style="margin-top: 60px">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 text-center">
					<div class="section-title">
						<h1>You might also like..</h1>
					</div>
				</div>
			</div>
			<div class="row justify-content-center">
					<?php $__empty_1 = true; $__currentLoopData = $mightLike; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
						<div class="col-lg-4 mb-20">
							<div class="single-related-product d-flex">
								<a href="<?php echo e(route('shop.show', $product->slug)); ?>">
									<img class="mightLike-img" src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="">
								</a>
								<div class="desc">
									<a href="<?php echo e(route('shop.show', $product->slug)); ?>" class="title">
										<?php echo e($product->name); ?>

									</a>
									<div class="price">
										<h6>$<?php echo e($product->price); ?></h6>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
						<h6>No Products Yet</h6>
					<?php endif; ?>	
			</div>
		</div>
	</section>
	<!-- End related-product Area -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce-application-Heroku\resources\views/single-product.blade.php ENDPATH**/ ?>