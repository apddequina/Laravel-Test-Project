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
                    <div class="table-responsive card-body">

                        <h4 class="card-title">Ticket Types</h4>

                        <table id="datatable" class="table table-bordered nowrap" style="width: 100%;">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Subject</th>
                                <th>Description</th>
                                <th>Department</th>
                                <th>Created at</th>
                                <th>Status</th>
                                
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                                <?php $__currentLoopData = $allTickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr data-bs-toggle="modal" data-bs-target="#descriptionModal-<?php echo e($ticket->id); ?>" style="cursor:pointer;">
                                    <td><?php echo e($ticket->name); ?></td>
                                        <td><?php echo e($ticket->email); ?></td>
                                        <td><?php echo e($ticket->phone); ?></td>
                                        <td><?php echo e($ticket->subject); ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#descriptionModal-<?php echo e($ticket->id); ?>">
                                                <i class="fas fa-eye"></i> View
                                            </button>
                                        </td>
                                        <td><?php echo e($ticket->ticket_type); ?></td>
                                        <td><?php echo e(\Carbon\Carbon::parse($ticket->created_at)->diffForHumans()); ?></td>
                                        <td>
                                        <?php if($ticket->status === 'pending'): ?>
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        <?php elseif($ticket->status === 'noted'): ?>
                                            <span class="badge bg-success">Noted</span>
                                        <?php elseif($ticket->status === 'closed'): ?>
                                            <span class="badge bg-secondary">Closed</span>
                                        <?php else: ?>
                                            <span class="badge bg-info"><?php echo e(ucfirst($ticket->status)); ?></span>
                                        <?php endif; ?>
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#feedbackModal-<?php echo e($ticket->id); ?>">
                                                <i class="fas fa-edit"></i> Update Feedback
                                            </button>
                                            
                                            <!-- Delete button -->
                                            <form action="<?php echo e(route('delete-ticket', ['id' => $ticket->id, 'type' => $ticket->ticket_type])); ?>" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this ticket?');">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </button>
                                            </form>
                                        </td>

                                    </tr>


                                <!-- Feedback Modal -->
                                <div class="modal fade" id="feedbackModal-<?php echo e($ticket->id); ?>" tabindex="-1" aria-labelledby="feedbackModalLabel-<?php echo e($ticket->id); ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <form action="<?php echo e(route('update-ticket', ['id' => $ticket->id, 'type' => $ticket->ticket_type])); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PUT'); ?>
                                                
                                                <!-- Simple header -->
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="feedbackModalLabel-<?php echo e($ticket->id); ?>">Feedback for <?php echo e($ticket->name); ?></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <textarea id="editor-<?php echo e($ticket->id); ?>" name="feedback" style="min-height: 300px;"><?php echo $ticket->feedback; ?></textarea>
                                                        <input type="hidden" name="status" value="noted">
                                                    </div>
                                                </div>
                                                
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success">Save Feedback</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <!-- Modal for Full Description -->
                                <div class="modal fade" id="descriptionModal-<?php echo e($ticket->id); ?>" tabindex="-1" aria-labelledby="descriptionModalLabel-<?php echo e($ticket->id); ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="descriptionModalLabel-<?php echo e($ticket->id); ?>">Description for <?php echo e($ticket->subject); ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><?php echo e($ticket->description); ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                    
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


<?php echo $__env->make('admin.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Support Ticket Project/support-ticket-app/resources/views/admin/ticket/all_tickets.blade.php ENDPATH**/ ?>