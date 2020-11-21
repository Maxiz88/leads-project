 <?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, []); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header'); ?> 
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <?php echo e(__('Leads')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    <?php if(auth()->check() && auth()->user()->hasRole('client')): ?>
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('lead.form')->html();
} elseif ($_instance->childHasBeenRendered('xtdcu6R')) {
    $componentId = $_instance->getRenderedChildComponentId('xtdcu6R');
    $componentTag = $_instance->getRenderedChildComponentTagName('xtdcu6R');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('xtdcu6R');
} else {
    $response = \Livewire\Livewire::mount('lead.form');
    $html = $response->html();
    $_instance->logRenderedChild('xtdcu6R', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
    </div>
    <?php else: ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('lead.show')->html();
} elseif ($_instance->childHasBeenRendered('ojgJywR')) {
    $componentId = $_instance->getRenderedChildComponentId('ojgJywR');
    $componentTag = $_instance->getRenderedChildComponentTagName('ojgJywR');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ojgJywR');
} else {
    $response = \Livewire\Livewire::mount('lead.show');
    $html = $response->html();
    $_instance->logRenderedChild('ojgJywR', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            </div>
        </div>
    </div>
    <?php endif; ?>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
<?php /**PATH /var/www/html/leadproject.loc/resources/views/lead.blade.php ENDPATH**/ ?>