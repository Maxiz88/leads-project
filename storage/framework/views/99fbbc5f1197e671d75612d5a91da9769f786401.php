<div>
    <table class="table-auto w-full table-bordered">
        <thead>
        <tr class="d-flex">
            <th class="px-2 py-1 col-2" >Username</th>
            <th class="px-4 py-2 col-3">Email</th>
            <th class="px-4 py-2 col-3">Subject</th>
            <th class="px-4 py-2 col-3" >Description</th>
            <th class="px-4 py-2 col-3" >Attached file</th>
            <th class="px-4 py-2 col-3">Created</th>
            <th class="px-4 py-2 col-3">Status</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $leads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr <?php if($loop->even): ?>class="bg-grey class="d-flex""<?php endif; ?>>
                <td class="border px-2 py-1 col-2"><?php echo e($lead->username); ?></td>
                <td class="border px-4 py-2 col-3"><?php echo e($lead->email); ?></td>
                <td class="border px-4 py-2 col-3"><?php echo e($lead->subject); ?></td>
                <td class="border px-4 py-2 col-3"><?php echo e($lead->description); ?></td>
                <td class="border px-4 py-2 col-3"><?php if($lead->file): ?><a href="<?php echo e(asset('storage/files/' . $lead->file)); ?>"><?php echo e($lead->file); ?></a><?php endif; ?></td>
                <td class="border px-4 py-2 col-3"><?php echo e($lead->created_at); ?></td>
                <td class="border px-4 py-2 col-3"><?php if($lead->status): ?> Done <?php else: ?> New <?php endif; ?></td>
                    <?php if(!$lead->status): ?>
                    <td class="border px-4 py-2 col-3">
                        <button wire:click="markAsDone(<?php echo e($lead->id); ?>)" class="bg-red-100 text-red-600 px-4 rounded-full">
                            Mark as "Done"
                        </button>
                    </td>
                    <?php endif; ?>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

</div>
<?php /**PATH /var/www/html/leadproject.loc/resources/views/livewire/lead/show.blade.php ENDPATH**/ ?>