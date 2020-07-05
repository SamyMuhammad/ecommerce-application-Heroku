<?php $__env->startSection('title', 'Checkout'); ?>

<?php $__env->startSection('extra-css'); ?>
    <script src="https://js.stripe.com/v3/"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/custom.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Checkout</h1>
                    <nav class="d-flex align-items-center">
                        <a href="<?php echo e(route('landing-page')); ?>">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">Checkout</a>
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

    <!--================Checkout Area =================-->
    <section class="checkout_area section_gap">
        <div class="container">  
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- PAYMENT FORM -->
                        <form class="row contact_form" id="payment-form" action="<?php echo e(route('checkout.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <h3>Payment</h3>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="<?php echo e(old('name')); ?>" required>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control" id="number" name="phone" placeholder="Phone number" value="<?php echo e(old('phone')); ?>" required>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="<?php echo e(auth()->user()->email); ?>" readonly>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="<?php echo e(old('address')); ?>" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="city" name="city" placeholder="Town/City" value="<?php echo e(old('city')); ?>" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="province" name="province" placeholder="Province" value="<?php echo e(old('province')); ?>" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="name_on_card" name="name_on_card" placeholder="Name on card" value="<?php echo e(old('name_on_card')); ?>" required>
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <div id="card-element" style="border: 1px solid #ced4da;">
                                  <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <div id="card-errors" role="alert"></div>
                            </div>
                            <button id="complete-order" style="margin-bottom: 20px;" class="primary-btn" type="submit">Submit</button>
                        </form>
                    </div>
                    
                    <!-- Your Order -->
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Your Order</h2>
                            <ul class="list">
                                <li><span class="prices-head" style="font-weight: 500">Product <span class="price-span" style="font-weight: 500">Total</span></span></li>
                                <?php $__empty_1 = true; $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <li>
                                        <span class="prices-head"> <?php echo e($item->model->name); ?> 
                                            <span class="middle" style="margin-left: 5px;">x <?php echo e($item->qty); ?></span> 
                                            <span class="last price-span">$<?php echo e($item->model->price); ?></span>
                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <?php endif; ?>    
                            </ul>
                            <ul class="list list_2">
                                <li><span class="prices-head">Subtotal <span class="price-span">$<?php echo e(Cart::subtotal()); ?></span></span></li>
                                <?php if(session()->has('coupon')): ?>
                                    <li>
                                        <span class="prices-head">Discount (<?php echo e(session('coupon')['name']); ?>)
                                            <form action="<?php echo e(route('coupon.destroy')); ?>" method="POST"
                                            style="display: inline;">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>
                                                <button type="submit" class="btn-to-link">Remove</button>
                                            </form>
                                            <span class="price-span">- $<?php echo e($discount); ?></span>
                                        </span>
                                    </li>
                                <hr>    
                                <li><span class="prices-head">New Subtotal<span class="price-span">$<?php echo e($newSubtotal); ?></span></span></li>
                                <?php endif; ?>
                                <li><span class="prices-head">Tax (14%)<span class="price-span">$<?php echo e($newTax); ?></span></span></li>
                                <li><span class="prices-head" style="font-weight: 500">Total <span class="price-span">$<?php echo e($newTotal); ?></span></span></li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->

    <?php $__env->startSection('extra-js'); ?>
        <script type="text/javascript" src="<?php echo e(asset('js/stripe-checkout.js')); ?>"></script>
    <?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce-application\resources\views/checkout.blade.php ENDPATH**/ ?>