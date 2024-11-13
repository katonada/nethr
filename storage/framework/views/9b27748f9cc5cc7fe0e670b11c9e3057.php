<!doctype html>
<html lang="<?php echo e(Statamic::cpLocale()); ?>" dir="<?php echo e(Statamic::cpDirection()); ?>" class="<?php echo e($user->preferredTheme() === 'dark' ? 'dark' : ''); ?>">
<head>
    <?php echo $__env->make('statamic::partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
    <div id="statamic">

        <?php echo $__env->make('statamic::partials.session-expiry', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('statamic::partials.licensing-alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('statamic::partials.global-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div id="main"
            class="<?php echo $__env->yieldContent('content-class'); ?>"
            :class="{
                'nav-closed': ! navOpen,
                'nav-mobile-open': mobileNavOpen,
                'showing-license-banner': showBanner
            }"
        >
            <?php echo $__env->make('statamic::partials.nav-main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('statamic::partials.nav-mobile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="workspace">
                <div class="page-wrapper" :class="wrapperClass">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>

        </div>

        <component
            v-for="component in appendedComponents"
            :key="component.id"
            :is="component.name"
            v-bind="component.props"
            v-on="component.events"
        ></component>

        <confirmation-modal
            v-if="copyToClipboardModalUrl"
            :cancellable="false"
            :button-text="__('OK')"
            :title="__('Copy to clipboard')"
            @confirm="copyToClipboardModalUrl = null"
        >
            <div class="prose">
                <code-block :text="copyToClipboardModalUrl" />
            </div>
        </confirmation-modal>

        <keyboard-shortcuts-modal></keyboard-shortcuts-modal>

        <portal-targets></portal-targets>

    </div>

    <?php echo $__env->make('statamic::partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('scripts'); ?>

</body>
</html>
<?php /**PATH D:\Sites\nethr\vendor\statamic\cms\src\Providers/../../resources/views/layout.blade.php ENDPATH**/ ?>