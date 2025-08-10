<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CraddleSoft - Shopping Cart</title>
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
                        Continue Shopping
                    </a>
                    <span class="text-gray-600">{{ Auth::user()->name }}</span>
                </div>
            </div>
        </div>
    </nav>

    <!-- Header Section -->
    <div class="py-16 bg-gradient-to-r from-orange-600 to-red-600">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="mb-4 text-4xl font-bold text-white">
                    Shopping Cart
                </h1>
                <p class="text-xl text-orange-100">
                    Review your selected items
                </p>
            </div>
        </div>
    </div>

    <div class="px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- Success/Error Messages -->
        @if(session('success'))
            <div class="px-4 py-3 mb-6 text-green-700 bg-green-100 border border-green-400 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="px-4 py-3 mb-6 text-red-700 bg-red-100 border border-red-400 rounded">
                {{ session('error') }}
            </div>
        @endif

        @if($cartItems->count() > 0)
            <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">
                <!-- Cart Items -->
                <div class="lg:col-span-2">
                    <div class="overflow-hidden bg-white rounded-lg shadow-md">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h2 class="text-xl font-semibold text-gray-800">Cart Items</h2>
                        </div>
                        
                        <div class="divide-y divide-gray-200">
                            @foreach($cartItems as $item)
                                <div class="flex items-center p-6 space-x-4">
                                    <!-- Product Image -->
                                    <div class="flex-shrink-0 w-20 h-20 bg-gray-200 rounded-lg">
                                        @if($item->product->image)
                                            <img src="{{ asset('images/' . $item->product->image) }}" 
                                                 alt="{{ $item->product->name }}" 
                                                 class="object-cover w-full h-full rounded-lg">
                                        @else
                                            <div class="flex items-center justify-center w-full h-full">
                                                <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>

                                    <!-- Product Details -->
                                    <div class="flex-1">
                                        <h3 class="text-lg font-medium text-gray-900">{{ $item->product->name }}</h3>
                                        <p class="mt-1 text-sm text-gray-500">{{ Str::limit($item->product->description, 80) }}</p>
                                        <div class="flex mt-2 space-x-2">
                                            <span class="px-2 py-1 text-xs text-gray-800 bg-gray-100 rounded">
                                                {{ ucfirst(str_replace('_', ' ', $item->product->category)) }}
                                            </span>
                                        </div>
                                    </div>

                                    <!-- Quantity & Price -->
                                    <div class="flex flex-col items-end space-y-2">
                                        <div class="text-lg font-semibold text-gray-900">
                                            LKR {{ number_format($item->quantity * $item->product->price, 2) }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            LKR {{ number_format($item->product->price, 2) }} each
                                        </div>
                                        
                                        <!-- Quantity Controls -->
                                        <form action="{{ route('shopping.updateCart', $item) }}" method="POST" class="flex items-center space-x-2">
                                            @csrf
                                            @method('PATCH')
                                            <select name="quantity" onchange="this.form.submit()" class="text-sm border-gray-300 rounded">
                                                @for($i = 1; $i <= min(10, $item->product->stock_quantity); $i++)
                                                    <option value="{{ $i }}" {{ $item->quantity == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </form>

                                        <!-- Remove Button -->
                                        <form action="{{ route('shopping.removeFromCart', $item) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-sm text-red-600 hover:text-red-800">
                                                Remove
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="sticky p-6 bg-white rounded-lg shadow-md top-4">
                        <h2 class="mb-4 text-xl font-semibold text-gray-800">Order Summary</h2>
                        
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-medium">LKR {{ number_format($total, 2) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Shipping</span>
                                <span class="font-medium text-green-600">Free</span>
                            </div>
                            <div class="pt-3 border-t">
                                <div class="flex justify-between text-lg font-semibold">
                                    <span>Total</span>
                                    <span>LKR {{ number_format($total, 2) }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 space-y-3">
                            <a href="{{ route('checkout.index') }}" class="block w-full px-4 py-3 text-center text-white transition duration-300 bg-orange-600 rounded-md hover:bg-orange-700">
                                Proceed to Checkout
                            </a>
                            <a href="{{ route('shopping.index') }}" class="block w-full px-4 py-3 text-center text-gray-800 transition duration-300 bg-gray-200 rounded-md hover:bg-gray-300">
                                Continue Shopping
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Empty Cart -->
            <div class="py-12 text-center">
                <svg class="w-12 h-12 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m3.6 8L9 13m0 0L5.4 7M9 13l4-8m-4 8v6a2 2 0 002 2h6a2 2 0 002-2v-6m-8 0h8"></path>
                </svg>
                <h3 class="mt-2 text-lg font-medium text-gray-900">Your cart is empty</h3>
                <p class="mt-1 text-sm text-gray-500">Start shopping to add items to your cart.</p>
                <div class="mt-6">
                    <a href="{{ route('shopping.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-orange-600 border border-transparent rounded-md shadow-sm hover:bg-orange-700">
                        Start Shopping
                    </a>
                </div>
            </div>
        @endif
    </div>
</body>
</html>