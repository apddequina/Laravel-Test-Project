<?php $__env->startSection('admin'); ?>

<div class="page-content">
    <div class="container-fluid">

        <!-- Welcome Message -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="bg-light p-4 rounded shadow-sm text-center">
                    <h2 class="mb-2">Welcome, <?php echo e(Auth::user()->name); ?>!</h2>
                    <p class="text-muted">Manage all support tickets, respond to feedback, and keep your customers happy.</p>
                </div>
            </div>
        </div>

        <!-- Quick Stats Cards -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Total Tickets</h5>
                        <p class="card-text display-5"><?php echo e($totalTickets ?? 0); ?></p>
                        <a href="<?php echo e(route('all-tickets')); ?>" class="btn btn-primary btn-sm">View All</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Pending Tickets</h5>
                        <p class="card-text display-5"><?php echo e($pendingTickets ?? 0); ?></p>
                        <a href="<?php echo e(route('all-tickets')); ?>?status=pending" class="btn btn-warning btn-sm">View Pending</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Tickets Noted</h5>
                        <p class="card-text display-5"><?php echo e($notedTickets ?? 0); ?></p>
                        <a href="<?php echo e(route('all-tickets')); ?>?status=noted" class="btn btn-success btn-sm">View Noted</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Quick Actions</h4>
                        <div class="d-flex gap-2">
                            <a href="<?php echo e(route('support-form')); ?>" class="btn btn-success"><i class="fas fa-plus"></i> Create New Ticket</a>
                            <a href="<?php echo e(route('all-tickets')); ?>" class="btn btn-primary"><i class="fas fa-ticket-alt"></i> Manage Tickets</a>
                            <a href="<?php echo e(route('all-tickets')); ?>?status=noted" class="btn btn-info"><i class="fas fa-check-circle"></i> View Feedback</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.admin_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Support Ticket Project/support-ticket-app/resources/views/admin/index.blade.php ENDPATH**/ ?>