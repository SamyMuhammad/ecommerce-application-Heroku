

<?php $__env->startSection('title', 'Orders'); ?>

<?php $__env->startSection('content'); ?>
	<section class="banner-area organic-breadcrumb">
		<div class="container">

		</div>
	</section>
	<div>
        <?php if(session()->has('success')): ?>
            <div class="alert alert-success mt-1 text-center"><?php echo e(session('success')); ?></div>
        <?php endif; ?>
    </div>
    
	<div class="container" style="margin-top: 65px;">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head"></div>
					<ul class="main-categories">
						<li class="main-nav-list"><a href="<?php echo e(route('users.edit')); ?>">Profile</a></li>
						<li class="main-nav-list active"><a href="<?php echo e(route('orders.index')); ?>">Orders</a></li>
					</ul>
				</div>
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">

				<!-- Start -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">
						<div class="col-md-12">	
							<div class="card-head">
								<h4 style="margin-top: 15px;">Your Orders</h4>
							</div>
							<div class="card-body">
		                        <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
		                        	<div class="card" style="margin-bottom: 20px;">
									  <div class="card-header">
									    Order #<?php echo e($order->id); ?>

									  </div>
									  <div class="card-body">
									    <h5>Name: <?php echo e($order->billing_name); ?></h5>
									    <h5>Address: <?php echo e($order->billing_address); ?></h5>
									    <h5>Total Price: <?php echo e($order->billing_total); ?>$</h5>
								    	<div class="row">
										    <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												  <div class="col-sm-6 col-md-4 col-lg-4">
												    <div class="card">
												      <img class="card-img-top" src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="Card image cap">	
												      <div class="card-body">
												        <h5 class="card-title"><a href="<?php echo e(route('shop.show', $product->slug)); ?>"><?php echo e($product->name); ?></a>
												        </h5>
												        <p class="card-text"><?php echo e($product->details); ?></p>
												      </div>
												    </div>
												  </div>
										    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</div>
									  </div>
									</div>
		                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
		                        	<h3>No Orders Yet.</h3>
		                        <?php endif; ?>
		                    </div>
						</div>
					</div>
				</section>
				<!-- End -->
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce-application\resources\views/my-orders.blade.php ENDPATH**/ ?>