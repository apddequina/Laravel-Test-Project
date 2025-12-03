<?php $__env->startSection('admin'); ?>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Profile Page</h4>
                        
                        <form method="post" action="<?php echo e(route('store.profile')); ?>">
                            <?php echo csrf_field(); ?>
                            
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input name="name" class="form-control" type="text" id="example-text-input" value="<?php echo e($editData->name); ?>">
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input name="email" class="form-control" type="email" id="example-text-input" value="<?php echo e($editData->email); ?>">
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input name="username" class="form-control" type="text" id="example-text-input" value="<?php echo e($editData->username); ?>">
                                </div>
                            </div>

                            
                        <!-- end row -->
                            <input type="submit" class="btn btn-primary waves-effect waves-light" value="Update Profile">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>

            

        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Support Ticket Project/support-ticket-app/resources/views/admin/admin_profile_edit.blade.php ENDPATH**/ ?>