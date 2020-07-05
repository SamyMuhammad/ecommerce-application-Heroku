<?php $__env->startSection('title', 'Cart'); ?>

<?php $__env->startSection('extra-css'); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/custom.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="<?php echo e(route('landing-page')); ?>">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#">Cart</a>
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
    <!--================Cart Area =================-->
    <?php if(Cart::instance('default')->count() > 0): ?>
        <section class="cart_area">
            <div class="container">
                <h4 class="text-center"><?php echo e(Cart::count()); ?> item(s) in Shopping Cart</h4>
                <div class="cart_inner">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php $__currentLoopData = Cart::instance('default')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img class="cart-image" src="<?php echo e(asset('storage/' . $item->model->image)); ?>" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <p><?php echo e($item->model->name); ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>$<?php echo e($item->model->price); ?></h5>
                                        </td>
                                        <td>
                                            <div class="product_count">
                                                
                                                <select name="qty" class="qty ignore" data-id="<?php echo e($item->rowId); ?>">
                                                    <?php for($i = 1; $i < 6; $i++): ?>
                                                        <option value="<?php echo e($i); ?>" 
                                                            <?php echo e($item->qty == $i ? "selected" : ''); ?>>
                                                            <?php echo e($i); ?>

                                                        </option>
                                                    <?php endfor; ?>
                                                </select>
                                            </div>
                                        </td>
                                        <td style="width: 10%">
                                            <h5 class="mb-3">
                                                <form action="<?php echo e(route('cart.destroy', $item->rowId)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('delete'); ?>
                                                    <button class="genric-btn danger-border circle small" style="padding: 0 7px;" type="submit">Remove</button>
                                                </form>
                                            </h5>
                                            <h5>
                                                <form  method="POST" 
                                                action="<?php echo e(route('cart.saveForLater', $item->rowId)); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <button class="genric-btn info-border circle small" style="padding: 0 7px;" type="submit">Save for Later</button>
                                                </form>
                                            </h5>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <h5>Subtotal</h5>
                                    </td>
                                    <td>
                                        <h5>$<?php echo e(Cart::subtotal()); ?></h5>
                                    </td>
                                    <?php if(session()->has('coupon')): ?>
                                        <tr>
                                            <td>
                                                <h5>Coupon (<?php echo e(session('coupon')['name']); ?>)</h5>

                                                <form action="<?php echo e(route('coupon.destroy')); ?>" method="POST"
                                                style="display: inline;">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('delete'); ?>
                                                    <button type="submit" class="btn-to-link">Remove</button>
                                                </form>
                                            </td>
                                            <td>
                                            </td>
                                            <td>
                                                <h5>Discount</h5>
                                            </td>
                                            <td>
                                                <h5>- $<?php echo e($discount); ?></h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            </td>
                                            <td>    
                                            </td>
                                            <td>
                                                <h5>New Subtotal</h5>
                                            </td>
                                            <td>
                                                <h5>$<?php echo e($newSubtotal); ?></h5>
                                            </td>
                                        </tr>
                                        
                                    <?php endif; ?>
                                </tr>

                                <tr>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <h5>Tax(14%)</h5>
                                    </td>
                                    <td>
                                        <h5>$<?php echo e($newTax); ?></h5>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <h5>Total</h5>
                                    </td>
                                    <td>
                                        <h5>$<?php echo e($newTotal); ?></h5>
                                    </td>
                                </tr>

                                </tr>
                                <tr class="out_button_area">
                                    <td>
                                        
                                        <?php if(! session()->has('coupon')): ?>
                                            <div class="cupon_area">
                                                <div class="check_title">
                                                    <h2>Have a coupon?</h2>
                                                </div>
                                                <form method="POST" action="<?php echo e(route('coupon.store')); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="text" name="coupon_code" placeholder="Enter coupon code" value="<?php echo e(old('coupon_code')); ?>">
                                                    <button type="submit" class="tp_btn">Apply Coupon</button>
                                                </form>   
                                            </div>  
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                        <div class="checkout_btn_inner d-flex align-items-center">
                                            <a class="gray_btn" href="<?php echo e(route('shop.index')); ?>">Continue Shopping</a>
                                            <a class="primary-btn" href="<?php echo e(route('checkout.index')); ?>">Proceed to checkout</a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    <?php else: ?>
        <h2 class="text-center" style="margin-top: 50px; margin-bottom: 50px;">No Items in Cart</h2>
    <?php endif; ?>
    <!--================End Cart Area =================-->

    <!-- Saved For Later -->
    <?php if(Cart::instance('saveForLater')->count() > 0): ?>
        <section class="cart_area">
            <div class="container">
                <h4 class="text-center"><?php echo e(Cart::instance('saveForLater')->count()); ?> item(s) is Saved for Later</h4>
                <div class="cart_inner">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Price</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = Cart::instance('saveForLater')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img class="cart-image" src="<?php echo e(asset('storage/' . $item->model->image)); ?>" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <p><?php echo e($item->model->name); ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <h5>$<?php echo e($item->model->price); ?></h5>
                                        </td>
                                        <td style="width: 10%">
                                            <h5 class="mb-3">
                                                <form action="<?php echo e(route('saveForLater.destroy', $item->rowId)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('delete'); ?>
                                                    <button class="genric-btn danger-border circle small" style="padding: 0 7px;" type="submit">Remove</button>
                                                </form>
                                            </h5>
                                            <h5>
                                                <form  method="POST" 
                                                action="<?php echo e(route('saveForLater.addToCart', $item->rowId)); ?>">
                                                    <?php echo csrf_field(); ?>
                                                    <button class="genric-btn info-border circle small" style="padding: 0 7px;" type="submit">Add to Cart</button>
                                                </form>
                                            </h5>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?> 

<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>

    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    
    <script>

        (function () {
            const classname = document.querySelectorAll('.qty');

            Array.from(classname).forEach(function (element){
                element.addEventListener('change', function (){
                    const id = element.getAttribute('data-id')
                    axios.patch(`cart/${id}`, {
                        qty : this.value
                      })
                      .then(function (response) {
                        // console.log(response);
                        window.location.href = "<?php echo e(route('cart.index')); ?>"
                      })
                      .catch(function (error) {
                        console.log(error);
                        window.location.href = "<?php echo e(route('cart.index')); ?>"
                      });
                })
            })
        })();
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecommerce-application\resources\views/cart.blade.php ENDPATH**/ ?>