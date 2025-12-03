<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Support Ticket System</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col font-[Figtree]">

    <!-- Top Right Login/Register -->
    <div class="absolute top-4 right-6 z-10 flex gap-4">
        <?php if(auth()->guard()->check()): ?>
            <a href="<?php echo e(url('/dashboard')); ?>" class="px-4 py-2 bg-white shadow rounded-lg font-semibold text-gray-700 hover:bg-gray-200">Dashboard</a>
        <?php else: ?>
            <a href="<?php echo e(route('login')); ?>" class="px-4 py-2 bg-white shadow rounded-lg font-semibold text-gray-700 hover:bg-gray-200">Log in</a>
            <?php if(Route::has('register')): ?>
                <a href="<?php echo e(route('register')); ?>" class="px-4 py-2 bg-white shadow rounded-lg font-semibold text-gray-700 hover:bg-gray-200">Register</a>
            <?php endif; ?>
        <span class="absolute top-20 right-6 text-xs text-gray-500">(For admin purpose)</span>
        <?php endif; ?>
    </div>

    <!-- Main Container -->
    <div class="flex flex-col items-center justify-center flex-grow p-6">

        <!-- Logo -->
        <div class="mb-8">
            <img src="<?php echo e(asset('logo/support-ticket-logo.png')); ?>" width="180" alt="Support Ticket Logo" class="drop-shadow-lg">
        </div>

        <!-- Card Section -->
        <div class="bg-white shadow-2xl rounded-2xl p-10 max-w-2xl w-full text-center">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Support Ticket Management System</h1>
            <p class="text-gray-600 mb-8 leading-relaxed">
                A clean and modern multi-department ticketing system with auto-routing.
            </p>

            <!-- Button to Support Form -->
            <a href="<?php echo e(url('/support-form')); ?>" class="inline-block px-8 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg shadow-md transition-all">
                Go to Support Ticket Form
            </a>
        </div>

        <!-- Info Section -->
        <div class="text-center text-gray-500 mt-10">
            Laravel v<?php echo e(Illuminate\Foundation\Application::VERSION); ?> (PHP v<?php echo e(PHP_VERSION); ?>)
        </div>

    </div>
</body>
</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/Support Ticket Project/support-ticket-app/resources/views/welcome.blade.php ENDPATH**/ ?>