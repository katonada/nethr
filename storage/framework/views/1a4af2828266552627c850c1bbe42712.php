<?php use function Statamic\trans as __; ?>


<?php $__env->startSection('title', __('Dashboard')); ?>

<?php $__env->startSection('content'); ?>

    <div class="widgets @container flex flex-wrap -mx-4 py-2">
        <?php $__currentLoopData = $widgets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $widget): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="widget w-full md:<?php echo e(Statamic\Support\Str::tailwindWidthClass($widget['width'])); ?> <?php echo e($widget['classes']); ?> mb-8 px-4">
                <?php echo $widget['html']; ?>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php echo $__env->make('statamic::partials.docs-callout', [
        'topic' => __('Widgets'),
        'url' => Statamic::docsUrl('widgets')
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('statamic::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Sites\nethr\vendor\statamic\cms\src\Providers/../../resources/views/dashboard.blade.php ENDPATH**/ ?>