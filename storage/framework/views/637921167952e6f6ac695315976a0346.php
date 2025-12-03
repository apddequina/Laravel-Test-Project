<?php $__env->startSection('admin'); ?>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">All Ticket Types</h4>


                </div>
            </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Ticket Types</h4>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>Ticket Name</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                                <?php ($i = 1); ?>
                                <?php $__currentLoopData = $ticket_type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e($tt->ticket_type); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('edit-ticket-type', $tt->id)); ?>" class="btn btn-info sm" title="Edit Data">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        
                                            <a href="<?php echo e(route('delete-ticket-type', $tt->id)); ?>" class="btn btn-danger sm" title="Delete Data"
                                               onclick="return confirm('Are you sure you want to delete this ticket type?');">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                        

                                    </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

        


    </div>
</div> 

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Support Ticket Project/support-ticket-app/resources/views/admin/ticket_type/ticket_type_all.blade.php ENDPATH**/ ?>