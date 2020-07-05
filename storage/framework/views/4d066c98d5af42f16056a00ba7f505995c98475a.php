

<?php $__env->startSection('title', 'Profile'); ?>

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
						<li class="main-nav-list active"><a href="<?php echo e(route('users.edit')); ?>">Profile</a></li>
						<li class="main-nav-list"><a href="<?php echo e(route('orders.index')); ?>">Orders</a></li>
					</ul>
				</div>
			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">

				<!-- Start -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">
						<div class="col-md-12">	
							<div class="card-head">
								<h4 style="margin-top: 15px;">Profile Data</h4>
							</div>
							<div class="card-body">
		                        <form method="POST" action="<?php echo e(route('users.update')); ?>">
		                            <?php echo method_field('patch'); ?>
		                            <?php echo csrf_field(); ?>

		                            <div class="form-group row">
		                                <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

		                                <div class="col-md-6">
		                                    <input id="name" type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name', $user->name)); ?>" required autocomplete="name" autofocus>

		                                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
		                                        <span class="invalid-feedback" role="alert">
		                                            <strong><?php echo e($message); ?></strong>
		                                        </span>
		                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
		                                </div>
		                            </div>

		                            <div class="form-group row">
		                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

		                                <div class="col-md-6">
		                                    <input id="email" type="email" class="form-control" name="email" value="<?php echo e(old('email', $user->email)); ?>" readonly autocomplete="email">

		                                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
		                                        <span class="invalid-feedback" role="alert">
		                                            <strong><?php echo e($message); ?></strong>
		                                        </span>
		                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
		                                </div>
		                            </div>

		                            <div class="form-group row">
		                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

		                                <div class="col-md-6">
	                                    <small>Leave password blank to keep the old password.</small>
		                                    <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" autocomplete="new-password">
		                                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
		                                        <span class="invalid-feedback" role="alert">
		                                            <strong><?php echo e($message); ?></strong>
		                                        </span>
		                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
		                                </div>
		                            </div>

		                            <div class="form-group row">
		                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

		                                <div class="col-md-6">
		                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
		                                </div>
		                            </div>

		                            <div class="form-group row mb-0">
		                                <div class="col-md-6 offset-md-4">
		                                    <button type="submit" class="genric-btn primary btn">
		                                        Submit
		                                    </button>
		                                </div>
		                            </div>
		                        </form>
		                    </div>
						</div>
					</div>
				</section>
				<!-- End -->
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce-application\resources\views/my-profile.blade.php ENDPATH**/ ?>