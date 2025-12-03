<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Ticket Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
     <!-- Bootstrap Css -->
     <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
     <!-- Icons Css -->

    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6 flex justify-center items-center font-sans">
    
    <div class="absolute top-4 left-4">
        <button onclick="history.back()" class="btn btn-sm btn-secondary">
            &larr; Back
        </button>
    </div>

    <div class="bg-white shadow-2xl rounded-2xl p-10 max-w-2xl w-full">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Submit a Support Ticket</h1>
        <p class="text-gray-600 text-center mb-8">Please fill out the form below. Your ticket will be routed to the correct department automatically.</p>

        <form action="{{ route('store-ticket') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Name -->
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Full Name</label>
                <input type="text" name="name" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:outline-none" placeholder="Enter your full name">
            </div>

            <!-- Email -->
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Email Address</label>
                <input type="email" name="email" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:outline-none" placeholder="Enter your email">
            </div>

            <!-- Phone -->
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Phone Number</label>
                <input type="text" name="phone" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:outline-none" placeholder="Enter your phone numnber">
            </div>

            <!-- Subject -->
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Subject</label>
                <input type="text" name="subject" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:outline-none" placeholder="Ticket subject">
            </div>

            <!-- Description -->
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Description</label>
                <textarea name="description" rows="4" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:outline-none" placeholder="Describe your issue in detail..."></textarea>
            </div>

            <!-- Ticket Type -->
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Ticket Type <span class="text-red-500">*</span></label>
                <select name="ticket_type" required class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-green-500 focus:outline-none bg-white">
                    <option value="" disabled selected>Select ticket type</option>
                    <option value="technical">Technical Issues</option>
                    <option value="billing">Account & Billing</option>
                    <option value="product">Product & Service</option>
                    <option value="inquiry">General Inquiry</option>
                    <option value="feedback">Feedback & Suggestions</option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex justify-between items-center pt-4">
                <button type="reset" class="px-6 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg font-semibold">Clear</button>
                <button type="submit" class="px-8 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg font-bold shadow">Submit Ticket</button>
            </div>

        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break; 
        }
        @endif 
    </script>
        

</body>
</html>