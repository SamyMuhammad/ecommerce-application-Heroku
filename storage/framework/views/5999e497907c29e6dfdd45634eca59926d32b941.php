

<?php $__env->startSection('title', 'Search Results'); ?>

<?php $__env->startSection('extra-css'); ?>
	<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/custom.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Results</h1>
					<nav class="d-flex align-items-center">
						<a href="<?php echo e(route('landing-page')); ?>">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Search</a>
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

	<div class="container">
		<div class="row">
			
			<div class="col-lg-12 col-md-7">
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">
						<!-- single product -->
						<?php $__empty_1 = true; $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
							<div class="col-lg-3 col-md-6">
								<div class="single-product">
									<a href="<?php echo e(route('shop.show', $product->slug)); ?>">
										<img class="img-fluid" src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="">
									</a>
									<div class="product-details">
										<a href="<?php echo e(route('shop.show', $product->slug)); ?>">
											<h6><?php echo e($product->name); ?></h6>
										</a>
										<h5><?php echo e(Str::limit($product->details, 75)); ?></h5>
										<div class="price">
											<h6>$<?php echo e($product->price); ?></h6>
										</div>
										<div class="prd-bottom">

											<form action="<?php echo e(route('cart.store')); ?>" method="POST" id="cartAdding" class="hidden-form">
												<?php echo csrf_field(); ?>
												<input type="hidden" name="id" value="<?php echo e($product->id); ?>">
												<input type="hidden" name="name" value="<?php echo e($product->name); ?>">
												<input type="hidden" name="price" value="<?php echo e($product->price); ?>">
												<span class="cart-icon">
													<i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i>
													<button type="submit" class="text">Add to Cart</button>
												</span>
											</form>

										</div>
									</div>
								</div>
							</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
							<h2 style="margin: 0 auto; margin-top: 30px;">No Products Found.</h2>
						<?php endif; ?>
					</div>
				</section>
				<!-- End Best Seller -->

				<!-- Start Filter Bar -->
				<div style="margin-bottom: 30px;">
					<?php echo e($products->appends(request()->input())->links()); ?>

				</div>
				<!-- End Filter Bar -->

			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce-application\resources\views/search-results.blade.php ENDPATH**/ ?>