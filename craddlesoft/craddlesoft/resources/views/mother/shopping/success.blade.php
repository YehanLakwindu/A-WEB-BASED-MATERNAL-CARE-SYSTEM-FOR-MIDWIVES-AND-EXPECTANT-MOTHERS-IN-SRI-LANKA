<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CraddleSoft - Payment Successful</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-8 text-center bg-white rounded-lg shadow-md">
            <div class="mb-6">
                <svg class="w-16 h-16 mx-auto text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            
            <h1 class="mb-4 text-2xl font-bold text-gray-900">Payment Successful!</h1>
            <p class="mb-6 text-gray-600">Thank you for your order. Your payment has been processed successfully via PayHere.</p>
            
            <div class="p-4 mb-6 rounded-lg bg-gray-50">
                <h3 class="mb-2 font-semibold text-gray-800">Order Details</h3>
                <p class="text-sm text-gray-600">Order Number: {{ $order->order_number }}</p>
                <p class="text-sm text-gray-600">Total Amount: LKR {{ number_format($order->total_amount, 2) }}</p>
                <p class="text-sm text-gray-600">Payment Status: {{ ucfirst($order->payment_status) }}</p>
                <p class="text-sm text-gray-600">Payment Gateway: Stripe</p>
            </div>
            
            <div class="space-y-3">
                <a href="{{ route('shopping.index') }}" class="block w-full px-4 py-2 text-white transition duration-300 bg-blue-600 rounded-md hover:bg-blue-700">
                    Continue Shopping
                </a>
                <a href="/" class="block w-full px-4 py-2 text-gray-800 transition duration-300 bg-gray-200 rounded-md hover:bg-gray-300">
                    Back to Dashboard
                </a>
            </div>
            <!-- Add this to your success page buttons -->
<div class="space-y-3">
    <a href="{{ route('orders.show', $order) }}" class="block w-full px-4 py-2 text-center text-white transition duration-300 bg-purple-600 rounded-md hover:bg-purple-700">
        View Order Details
    </a>
    <a href="{{ route('orders.index') }}" class="block w-full px-4 py-2 text-center text-white transition duration-300 bg-blue-600 rounded-md hover:bg-blue-700">
        View All Orders
    </a>
    <a href="{{ route('shopping.index') }}" class="block w-full px-4 py-2 text-center text-gray-800 transition duration-300 bg-gray-200 rounded-md hover:bg-gray-300">
        Continue Shopping
    </a>
</div>
        </div>
    </div>
</body>
</html>