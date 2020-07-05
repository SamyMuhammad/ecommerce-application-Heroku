<?php $__env->startComponent('mail::message'); ?>
# Order Received

Thank you for your order.

**Order ID:** <?php echo e($order->id); ?>


**Order Email:** <?php echo e($order->billing_email); ?>


**Order Name:** <?php echo e($order->billing_name); ?>


**Order Total:** $<?php echo e(round($order->billing_total / 100, 2)); ?>


**Items Ordered**

<?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
Name: <?php echo e($product->name); ?> <br>
Price: $<?php echo e($product->price); ?> <br>
Quantity: <?php echo e($product->pivot->quantity); ?> <br> <br> <br>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

You can get further details about your order by logging into our website.

<?php $__env->startComponent('mail::button', ['url' => config('app.url'), 'color' => 'green']); ?>
Go to Website
<?php if (isset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e)): ?>
<?php $component = $__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e; ?>
<?php unset($__componentOriginalb8f5c8a6ad1b73985c32a4b97acff83989288b9e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

Thank you again for choosing us.

Regards,<br>
<?php echo e(config('app.name')); ?>

<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\xampp\htdocs\ecommerce-application\resources\views/emails/orders/placed.blade.php ENDPATH**/ ?>