<?php use function Statamic\trans as __; ?>

<div class="flex">
    <a href="<?php echo e($url); ?>" class="flex-initial flex p-2 -m-2 items-center text-xs text-gray-700 dark:text-dark-175 hover:text-gray-900 dark:hover:text-dark-100">
        <div class="h-6 rotate-180 svg-icon using-svg">
            <?php echo Statamic::svg('icons/micro/chevron-right') ?>
        </div>
        <span v-pre><?php echo e(__($title)); ?></span>
    </a>
</div>
<?php /**PATH D:\Sites\nethr\vendor\statamic\cms\src\Providers/../../resources/views/partials/breadcrumb.blade.php ENDPATH**/ ?>