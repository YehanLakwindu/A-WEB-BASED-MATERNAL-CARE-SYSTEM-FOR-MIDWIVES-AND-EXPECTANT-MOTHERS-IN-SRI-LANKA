<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders - CraddleSoft</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white border-b shadow-sm">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <h1 class="text-xl font-bold text-purple-600">CraddleSoft</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('shopping.index') }}" class="text-gray-600 hover:text-purple-600">
                        Continue Shopping
                    </a>
                    <a href="{{ route('shopping.cart') }}" class="text-gray-600 hover:text-purple-600">
                        Cart
                    </a>
                    <span class="text-gray-600">{{ Auth::user()->name }}</span>
                </div>
            </div>
        </div>
    </nav>

    <!-- Header Section -->
    <div class="py-16 bg-gradient-to-r from-green-600 to-blue-600">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="mb-4 text-4xl font-bold text-white">My Orders</h1>
                <p class="text-xl text-green-100">Track your CraddleSoft purchases</p>
            </div>
        </div>
    </div>

    <div class="px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
        @if($orders->count() > 0)
            <!-- Orders List -->
            <div class="space-y-6">
                @foreach($orders as $order)
                    <div class="overflow-hidden bg-white rounded-lg shadow-md">
                        <!-- Order Header -->
                        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                                <div class="flex items-center space-x-4">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900">
                                            Order #{{ $order->order_number }}
                                        </h3>
                                        <p class="text-sm text-gray-500">
                                            Placed on {{ $order->created_at->format('M d, Y') }} at {{ $order->created_at->format('h:i A') }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center mt-4 space-x-3 sm:mt-0">
                                    <!-- Order Status -->
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                        @if($order->payment_status === 'completed') bg-green-100 text-green-800
                                        @elseif($order->payment_status === 'pending') bg-yellow-100 text-yellow-800
                                        @elseif($order->payment_status === 'cancelled') bg-red-100 text-red-800
                                        @else bg-gray-100 text-gray-800
                                        @endif">
                                        @if($order->payment_status === 'completed') ✅ Completed
                                        @elseif($order->payment_status === 'pending') ⏳ Pending
                                        @elseif($order->payment_status === 'cancelled') ❌ Cancelled
                                        @else {{ ucfirst($order->payment_status) }}
                                        @endif
                                    </span>
                                    <!-- Total Amount -->
                                    <span class="text-lg font-bold text-gray-900">
                                        LKR {{ number_format($order->total_amount, 2) }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Order Items Preview -->
                        <div class="px-6 py-4">
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                                @foreach($order->orderItems->take(3) as $item)
                                    <div class="flex items-center space-x-3">
                                        <!-- Product Image Placeholder -->
                                        <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 bg-gray-200 rounded-lg">
                                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <!-- Product Info -->
                                        <div class="flex-1">
                                            <h4 class="text-sm font-medium text-gray-900">{{ $item->product->name }}</h4>
                                            <p class="text-sm text-gray-500">Qty: {{ $item->quantity }} × LKR {{ number_format($item->price, 2) }}</p>
                                        </div>
                                    </div>
                                @endforeach
                                
                                @if($order->orderItems->count() > 3)
                                    <div class="flex items-center justify-center text-sm text-gray-500">
                                        +{{ $order->orderItems->count() - 3 }} more items
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Order Actions -->
                        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                            <div class="flex flex-col space-y-3 sm:flex-row sm:justify-between sm:items-center sm:space-y-0">
                                <div class="text-sm text-gray-600">
                                    {{ $order->orderItems->count() }} {{ Str::plural('item', $order->orderItems->count()) }}
                                </div>
                                <div class="flex space-x-3">
                                    <a href="{{ route('orders.show', $order) }}" class="px-4 py-2 text-sm text-white transition duration-300 bg-blue-600 rounded-md hover:bg-blue-700">
                                        View Details
                                    </a>
                                    @if($order->payment_status === 'completed')
                                        <a href="{{ route('orders.invoice', $order) }}" class="px-4 py-2 text-sm text-white transition duration-300 bg-green-600 rounded-md hover:bg-green-700">
                                            Download Invoice
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-8">
                {{ $orders->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="py-12 text-center">
                <svg class="w-12 h-12 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
                <h3 class="mt-2 text-lg font-medium text-gray-900">No orders yet</h3>
                <p class="mt-1 text-sm text-gray-500">Start shopping to see your orders here!</p>
                <div class="mt-6">
                    <a href="{{ route('shopping.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700">
                        Start Shopping
                    </a>
                </div>
            </div>
        @endif
    </div>
</body>
</html>