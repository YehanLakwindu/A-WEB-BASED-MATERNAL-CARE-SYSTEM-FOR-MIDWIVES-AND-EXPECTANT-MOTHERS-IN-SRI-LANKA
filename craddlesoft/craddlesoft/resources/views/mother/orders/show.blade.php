<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order #{{ $order->order_number }} - CraddleSoft</title>
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
                    <a href="{{ route('orders.index') }}" class="text-gray-600 hover:text-purple-600">
                        My Orders
                    </a>
                    <a href="{{ route('shopping.index') }}" class="text-gray-600 hover:text-purple-600">
                        Shop
                    </a>
                    <span class="text-gray-600">{{ Auth::user()->name }}</span>
                </div>
            </div>
        </div>
    </nav>

    <!-- Header Section -->
    <div class="py-16 bg-gradient-to-r from-purple-600 to-pink-600">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="mb-4 text-4xl font-bold text-white">Order Details</h1>
                <p class="text-xl text-purple-100">Order #{{ $order->order_number }}</p>
            </div>
        </div>
    </nav>

    <div class="px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
            <!-- Order Items -->
            <div class="lg:col-span-2">
                <div class="overflow-hidden bg-white rounded-lg shadow-md">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-800">Order Items</h2>
                    </div>
                    
                    <div class="divide-y divide-gray-200">
                        @foreach($order->orderItems as $item)
                            <div class="flex items-center p-6 space-x-4">
                                <!-- Product Image -->
                                <div class="flex items-center justify-center flex-shrink-0 w-20 h-20 bg-gray-200 rounded-lg">
                                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>

                                <!-- Product Details -->
                                <div class="flex-1">
                                    <h3 class="text-lg font-medium text-gray-900">{{ $item->product->name }}</h3>
                                    <p class="mt-1 text-sm text-gray-500">{{ $item->product->description }}</p>
                                    <div class="flex mt-2 space-x-2">
                                        <span class="px-2 py-1 text-xs text-gray-800 bg-gray-100 rounded">
                                            {{ ucfirst(str_replace('_', ' ', $item->product->category)) }}
                                        </span>
                                        <span class="px-2 py-1 text-xs text-gray-800 bg-gray-100 rounded">
                                            {{ ucfirst(str_replace('_', ' ', $item->product->stage)) }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Quantity & Price -->
                                <div class="text-right">
                                    <div class="text-lg font-semibold text-gray-900">
                                        LKR {{ number_format($item->quantity * $item->price, 2) }}
                                    </div>
                                    <div class="text-sm text-gray-500">
                                        {{ $item->quantity }} × LKR {{ number_format($item->price, 2) }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Order Summary & Info -->
            <div class="space-y-6 lg:col-span-1">
                <!-- Order Summary -->
                <div class="p-6 bg-white rounded-lg shadow-md">
                    <h2 class="mb-4 text-xl font-semibold text-gray-800">Order Summary</h2>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal</span>
                            <span class="font-medium">LKR {{ number_format($order->total_amount, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Shipping</span>
                            <span class="font-medium text-green-600">Free</span>
                        </div>
                        <div class="pt-3 border-t">
                            <div class="flex justify-between text-lg font-semibold">
                                <span>Total</span>
                                <span>LKR {{ number_format($order->total_amount, 2) }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Order Status -->
                    <div class="mt-6">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Status</span>
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
                        </div>
                    </div>

                    @if($order->payment_status === 'completed')
                        <div class="mt-6">
                            <a href="{{ route('orders.invoice', $order) }}" class="block w-full px-4 py-2 text-center text-white transition duration-300 bg-green-600 rounded-md hover:bg-green-700">
                                Download Invoice
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Order Information -->
                <div class="p-6 bg-white rounded-lg shadow-md">
                    <h2 class="mb-4 text-xl font-semibold text-gray-800">Order Information</h2>
                    
                    <div class="space-y-3 text-sm">
                        <div>
                            <span class="font-medium text-gray-700">Order Number:</span>
                            <span class="text-gray-600">{{ $order->order_number }}</span>
                        </div>
                        <div>
                            <span class="font-medium text-gray-700">Order Date:</span>
                            <span class="text-gray-600">{{ $order->created_at->format('M d, Y h:i A') }}</span>
                        </div>
                        @if($order->stripe_payment_intent_id)
                            <div>
                                <span class="font-medium text-gray-700">Payment ID:</span>
                                <span class="text-xs text-gray-600">{{ $order->stripe_payment_intent_id }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Shipping Address -->
                @if($order->shipping_address)
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <h2 class="mb-4 text-xl font-semibold text-gray-800">Shipping Address</h2>
                        
                        <div class="space-y-2 text-sm">
                            <div class="font-medium text-gray-700">{{ $order->shipping_address['name'] }}</div>
                            <div class="text-gray-600">{{ $order->shipping_address['address'] }}</div>
                            <div class="text-gray-600">{{ $order->shipping_address['city'] }}, {{ $order->shipping_address['postal_code'] }}</div>
                            <div class="text-gray-600">{{ $order->shipping_address['phone'] }}</div>
                            <div class="text-gray-600">{{ $order->shipping_address['email'] }}</div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Back to Orders -->
        <div class="mt-8 text-center">
            <a href="{{ route('orders.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50">
                ← Back to My Orders
            </a>
        </div>
    </div>
</body>
</html>