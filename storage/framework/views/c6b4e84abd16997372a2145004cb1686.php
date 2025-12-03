<?php $__env->startSection('admin'); ?>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Ticket Type</h4>
                        <p class="card-title-desc">Create a name for the <code class="highlighter-rouge">Ticket Type</code>.</p>
                        
                        <form action="<?php echo e(route('store-ticket-type')); ?>" method="POST">
                            <?php echo csrf_field(); ?>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Ticket Type Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="ticket_type" placeholder="Enter Input here..." id="ticket-type-id">
                                    <?php $__errorArgs = ['ticket_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="text-danger"><?php echo e($message); ?></span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>

                        <input type="submit" class="btn btn-info waves-effect waves-light" value="Save Ticket Type">

                        </form>
                        
                       
                        
                        <!-- end row -->
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

        


    </div>
</div> 

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Support Ticket Project/support-ticket-app/resources/views/admin/ticket_type/ticket_type_add.blade.php ENDPATH**/ ?>