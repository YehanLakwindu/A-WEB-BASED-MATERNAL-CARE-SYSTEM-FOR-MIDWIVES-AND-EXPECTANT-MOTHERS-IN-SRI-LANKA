<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CraddleSoft - Checkout</title>
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
                    <a href="{{ route('shopping.cart') }}" class="text-gray-600 hover:text-purple-600">
                        Back to Cart
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
                <h1 class="mb-4 text-4xl font-bold text-white">Checkout</h1>
                <p class="text-xl text-green-100">Complete your order</p>
            </div>
        </div>
    </div>

    <div class="px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <!-- Error Messages -->
        @if($errors->any())
            <div class="px-4 py-3 mb-6 text-red-700 bg-red-100 border border-red-400 rounded">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('checkout.process') }}" method="POST" class="grid grid-cols-1 gap-8 lg:grid-cols-2">
            @csrf
            
            <!-- Shipping Information -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h2 class="mb-6 text-xl font-semibold text-gray-800">Shipping Information</h2>
                
                <div class="space-y-4">
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div>
                            <label for="name" class="block mb-1 text-sm font-medium text-gray-700">Full Name *</label>
                            <input type="text" name="name" id="name" required value="{{ old('name', Auth::user()->name) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>
                        <div>
                            <label for="email" class="block mb-1 text-sm font-medium text-gray-700">Email *</label>
                            <input type="email" name="email" id="email" required value="{{ old('email', Auth::user()->email) }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500">
                        </div>
                    </div>
                    
                    <div>
                        <label for="phone" class="block mb-1 text-sm font-medium text-gray-700">Phone Number *</label>
                        <input type="tel" name="phone" id="phone" required value="{{ old('phone') }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500" placeholder="+94 77 123 4567">
                    </div>
                    
                    <div>
                        <label for="address" class="block mb-1 text-sm font-medium text-gray-700">Address *</label>
                        <textarea name="address" id="address" rows="3" required class="w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500" placeholder="Street address, house number, etc.">{{ old('address') }}</textarea>
                    </div>
                    
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        <div>
                            <label for="city" class="block mb-1 text-sm font-medium text-gray-700">City *</label>
                            <input type="text" name="city" id="city" required value="{{ old('city') }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500" placeholder="Colombo">
                        </div>
                        <div>
                            <label for="postal_code" class="block mb-1 text-sm font-medium text-gray-700">Postal Code *</label>
                            <input type="text" name="postal_code" id="postal_code" required value="{{ old('postal_code') }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring-green-500" placeholder="10100">
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Order Summary -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h2 class="mb-6 text-xl font-semibold text-gray-800">Order Summary</h2>
                
                <!-- Cart Items -->
                <div class="mb-6 space-y-4 overflow-y-auto max-h-64">
                    @foreach($cartItems as $item)
                        <div class="flex items-center py-3 space-x-3 border-b border-gray-100">
                            <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 bg-gray-200 rounded">
                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div class="flex-1">
                                <h4 class="text-sm font-medium text-gray-900">{{ $item->product->name }}</h4>
                                <p class="text-sm text-gray-500">Qty: {{ $item->quantity }}</p>
                            </div>
                            <div class="text-sm font-medium text-gray-900">
                                LKR {{ number_format($item->quantity * $item->product->price, 2) }}
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Totals -->
                <div class="pt-4 space-y-3 border-t">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Subtotal</span>
                        <span class="font-medium">LKR {{ number_format($total, 2) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Shipping</span>
                        <span class="font-medium text-green-600">Free</span>
                    </div>
                    <div class="flex justify-between pt-3 text-lg font-semibold border-t">
                        <span>Total</span>
                        <span>LKR {{ number_format($total, 2) }}</span>
                    </div>
                </div>
                
                <!-- Checkout Button -->
                <button type="submit" class="flex items-center justify-center w-full px-4 py-3 mt-6 space-x-2 text-white transition duration-300 bg-green-600 rounded-md hover:bg-green-700">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                    <span>Proceed to Payment</span>
                </button>
                
                <div class="mt-4 text-center">
                    <a href="{{ route('shopping.cart') }}" class="text-sm text-gray-600 hover:text-gray-800">
                        ← Back to Cart
                    </a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>