<?php $__env->startSection('admin'); ?>

<div class="page-content">
    <div class="container-fluid">
        <h4>Edit Ticket Type</h4>

        <form action="<?php echo e(route('update-ticket-type', $ticket->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
                <label for="ticket_type" class="form-label">Ticket Type Name</label>
                <input type="text" name="ticket_type" class="form-control" value="<?php echo e($ticket->ticket_type); ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Update Ticket Type</button>
            <a href="<?php echo e(route('all-ticket-type')); ?>" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Support Ticket Project/support-ticket-app/resources/views/admin/ticket_type/ticket_type_edit.blade.php ENDPATH**/ ?>