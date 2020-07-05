<?php $__env->startSection('title', 'Confirmation'); ?>

<?php $__env->startSection('content'); ?>
	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Confirmation</h1>
					<nav class="d-flex align-items-center">
						<a href="<?php echo e(route('landing-page')); ?>">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Confirmation</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<div>
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

	<!--================Order Details Area =================-->
	<section class="order_details section_gap">
		<div class="container">
			<div>
		        <?php if(session()->has('success')): ?>
		        	<h3 class="title_confirmation" style="color: darkblue;">
		            	<?php echo e(session('success')); ?>

		            </h3>	
		        <?php endif; ?>

		        <?php if(count($errors) > 0): ?>
		            <div class="alert alert-danger">
		                <ul>
		                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		                        <li><?php echo e($error); ?></li>
		                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
		                </ul>
		            </div>
		        <?php endif; ?>
		    </div>
			<div class="order_details_table">
				<h2>Order Details</h2>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Product</th>
								<th scope="col">Quantity</th>
								<th scope="col">Total</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = Cart::instance('default')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<tr>
									<td>
										<p><?php echo e($item->model->name); ?></p>
									</td>
									<td>
										<h5>x <?php echo e($item->qty); ?></h5>
									</td>
									<td>
										<p>$<?php echo e($item->model->price); ?></p>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
							<tr>
								<td>
									<h4>Subtotal</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>$<?php echo e($subtotal); ?></p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Tax (14%)</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>$<?php echo e($tax); ?></p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Total</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>$<?php echo e($total); ?></p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<?php
        Cart::instance('default')->destroy();
		session()->forget('coupon');
	?>
	<!--================End Order Details Area =================-->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce-application\resources\views/confirmation.blade.php ENDPATH**/ ?>