<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CraddleSoft - Baby Care Shopping</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
   <!-- Professional Navigation -->
<nav class="sticky top-0 z-50 bg-white border-b shadow-lg backdrop-blur-sm bg-opacity-95">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <!-- Logo Section -->
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-3">
                    <!-- Logo Icon -->
                    <div class="flex items-center justify-center w-12 h-12 transition-all duration-300 transform shadow-lg bg-gradient-to-br from-purple-600 to-pink-600 rounded-xl hover:scale-110">
                        <svg class="text-white w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <!-- Brand Name -->
                    <div>
                        <h1 class="text-2xl font-bold text-transparent bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text">
                            CraddleSoft
                        </h1>
                        <p class="text-xs font-medium text-gray-500">Pregnancy Care</p>
                    </div>
                </div>
            </div>

            <!-- Navigation Links -->
            <div class="flex items-center space-x-6">
                <!-- My Orders Link -->
                <a href="{{ route('orders.index') }}" 
                   class="flex items-center px-4 py-2 space-x-2 text-gray-600 transition-all duration-300 transform group rounded-xl hover:text-purple-600 hover:bg-purple-50 hover:scale-105">
                    <div class="p-2 transition-colors duration-300 bg-blue-100 rounded-lg group-hover:bg-blue-200">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <span class="font-medium">My Orders</span>
                </a>



                <!-- User Profile Section -->
                <div class="flex items-center px-4 py-2 space-x-3 border border-purple-100 bg-gradient-to-r from-purple-50 to-pink-50 rounded-xl">
                    <!-- User Avatar -->
                    <div class="flex items-center justify-center w-10 h-10 rounded-full shadow-md bg-gradient-to-br from-purple-500 to-pink-500">
                        <span class="text-sm font-bold text-white">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </span>
                    </div>
                    <!-- User Info -->
                    <div class="flex flex-col">
                        <span class="text-sm font-semibold text-gray-800">{{ Auth::user()->name }}</span>
                        <span class="text-xs text-gray-500">Welcome back!</span>
                    </div>
                </div>

                <!-- Mobile Menu Button (for responsive design) -->
                <button class="p-2 text-gray-600 transition-colors duration-300 rounded-lg md:hidden hover:text-purple-600 hover:bg-purple-50">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu (Hidden by default) -->
    <div class="bg-white border-t border-gray-200 md:hidden">
        <div class="px-4 py-4 space-y-3">
            <a href="{{ route('orders.index') }}" 
               class="flex items-center px-4 py-3 space-x-3 text-gray-600 transition-all duration-300 rounded-xl hover:text-purple-600 hover:bg-purple-50">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <span class="font-medium">My Orders</span>
            </a>
            

        </div>
    </div>
</nav>

<style>
/* Additional CSS for enhanced animations */
.nav-link-hover {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.nav-link-hover:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
}

/* Smooth gradient animation */
@keyframes gradient-shift {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

.animated-gradient {
    background: linear-gradient(-45deg, #667eea, #764ba2, #f093fb, #f5576c);
    background-size: 400% 400%;
    animation: gradient-shift 15s ease infinite;
}

/* Pulse animation for cart badge */
@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

.cart-badge {
    animation: pulse 2s infinite;
}
</style>

    <!-- Enhanced Header Section with Background Image -->
<div class="relative py-20 overflow-hidden bg-gradient-to-r from-slate-800 to-purple-700">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0">
        <img src="{{ asset('images/babyshopping.jpg') }}" 
             alt="Baby Care Shopping" 
             class="object-cover w-full h-full opacity-60">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900/60 to-purple-800/50"></div>
    </div>
    
    <!-- Decorative Elements -->
    <div class="absolute w-20 h-20 rounded-full top-10 left-10 bg-white/10 animate-pulse"></div>
    <div class="absolute w-16 h-16 rounded-full bottom-10 right-10 bg-white/10 animate-bounce"></div>
    <div class="absolute w-12 h-12 rounded-full top-1/2 left-20 bg-white/10 animate-ping"></div>
    
    <div class="relative px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="text-center">
            <!-- Main Heading with Animation -->
            <h1 class="mb-6 text-5xl font-extrabold text-white animate-fade-in-up">
                <span class="block">Baby Care</span>
                <span class="block text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-blue-200">
                    Shopping Paradise
                </span>
            </h1>
            
            <!-- Subtitle -->
            <p class="max-w-3xl mx-auto mb-8 text-xl font-medium text-gray-100 animate-fade-in-up" style="animation-delay: 0.2s;">
                Discover premium baby care products, pregnancy essentials, nutritious foods, and adorable toys - all curated with love for your precious journey into motherhood.
            </p>
            
            <!-- Feature Highlights -->
            <div class="flex flex-wrap justify-center gap-4 mb-8 animate-fade-in-up" style="animation-delay: 0.4s;">
                <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-white rounded-full bg-white/20 backdrop-blur-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    Premium Quality
                </span>
                <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-white rounded-full bg-white/20 backdrop-blur-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Fast Delivery
                </span>
                <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-white rounded-full bg-white/20 backdrop-blur-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                    Made with Love
                </span>
                <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-white rounded-full bg-white/20 backdrop-blur-sm">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                    Safe & Trusted
                </span>
            </div>
            
            <!-- Call to Action Buttons -->
            <div class="flex flex-col items-center justify-center space-y-4 animate-fade-in-up sm:flex-row sm:space-y-0 sm:space-x-6" style="animation-delay: 0.6s;">
                <button class="px-8 py-4 text-lg font-bold text-purple-600 transition-all duration-300 transform bg-white rounded-full shadow-xl group hover:bg-gray-50 hover:scale-105 hover:shadow-2xl">
                    <span class="flex items-center">
                        <svg class="w-5 h-5 mr-2 transition-transform group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                        Start Shopping Now
                    </span>
                </button>
            </div>
            
            <!-- Shopping Stats -->
            <div class="grid grid-cols-2 gap-8 mt-12 md:grid-cols-4 animate-fade-in-up" style="animation-delay: 0.8s;">
                <div class="text-center">
                    <div class="text-3xl font-bold text-white">500+</div>
                    <div class="text-sm text-purple-200">Products</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-white">1000+</div>
                    <div class="text-sm text-purple-200">Happy Mothers</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-white">24/7</div>
                    <div class="text-sm text-purple-200">Support</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-white">Free</div>
                    <div class="text-sm text-gray-300">Delivery</div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Enhanced animations */
@keyframes fade-in-up {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in-up {
    animation: fade-in-up 0.8s ease-out forwards;
    opacity: 0;
}

/* Floating elements animation */
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

/* Pulsing effect for decorative elements */
@keyframes pulse-slow {
    0%, 100% { opacity: 0.3; transform: scale(1); }
    50% { opacity: 0.6; transform: scale(1.1); }
}

/* Button hover effects */
.group:hover svg {
    animation: bounce 0.6s ease-in-out;
}

@keyframes bounce {
    0%, 100% { transform: translateY(0) rotate(0deg); }
    50% { transform: translateY(-5px) rotate(12deg); }
}
</style>

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

        <!-- Shopping Statistics & Quick Actions -->
        <div class="mb-8">
            <!-- Shopping Stats Cards -->
            <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-4">
                <!-- Cart Items -->
                <div class="p-6 transition-all transform bg-white rounded-lg shadow-md hover:shadow-lg hover:scale-105">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center w-12 h-12 bg-orange-100 rounded-lg">
                                <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m3.6 8L9 13m0 0L5.4 7M9 13l4-8m-4 8v6a2 2 0 002 2h6a2 2 0 002-2v-6m-8 0h8"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Items in Cart</p>
                            <p class="text-2xl font-bold text-gray-900">
                                @php
                                    $cartCount = \App\Models\ShoppingCart::where('user_id', Auth::id())->count();
                                @endphp
                                {{ $cartCount }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Total Orders -->
                <div class="p-6 transition-all transform bg-white rounded-lg shadow-md hover:shadow-lg hover:scale-105">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center w-12 h-12 bg-blue-100 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Total Orders</p>
                            <p class="text-2xl font-bold text-gray-900">
                                @php
                                    $totalOrders = \App\Models\Order::where('user_id', Auth::id())->count();
                                @endphp
                                {{ $totalOrders }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Completed Orders -->
                <div class="p-6 transition-all transform bg-white rounded-lg shadow-md hover:shadow-lg hover:scale-105">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center w-12 h-12 bg-green-100 rounded-lg">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Completed Orders</p>
                            <p class="text-2xl font-bold text-gray-900">
                                @php
                                    $completedOrders = \App\Models\Order::where('user_id', Auth::id())->where('payment_status', 'completed')->count();
                                @endphp
                                {{ $completedOrders }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Total Spent -->
                <div class="p-6 transition-all transform bg-white rounded-lg shadow-md hover:shadow-lg hover:scale-105">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center w-12 h-12 bg-purple-100 rounded-lg">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500">Total Spent</p>
                            <p class="text-2xl font-bold text-gray-900">
                                @php
                                    $totalSpent = \App\Models\Order::where('user_id', Auth::id())->where('payment_status', 'completed')->sum('total_amount');
                                @endphp
                                LKR {{ number_format($totalSpent, 2) }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Shopping Quick Actions -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <h2 class="mb-4 text-xl font-semibold text-gray-800">{{ __("Shopping Quick Actions") }}</h2>
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
                    <!-- Browse Products -->
                    <a href="{{ route('shopping.index') }}" class="flex items-center p-4 transition duration-300 rounded-lg bg-purple-50 hover:bg-purple-100">
                        <div class="flex items-center justify-center w-10 h-10 mr-3 bg-purple-600 rounded-lg">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900">{{ __("Browse Products") }}</p>
                            <p class="text-sm text-gray-500">{{ __("Shop baby care items") }}</p>
                        </div>
                    </a>

                    <!-- View Cart -->
                    <a href="{{ route('shopping.cart') }}" class="flex items-center p-4 transition duration-300 rounded-lg bg-orange-50 hover:bg-orange-100">
                        <div class="flex items-center justify-center w-10 h-10 mr-3 bg-orange-600 rounded-lg">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m3.6 8L9 13m0 0L5.4 7M9 13l4-8m-4 8v6a2 2 0 002 2h6a2 2 0 002-2v-6m-8 0h8"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900">{{ __("View Cart") }}</p>
                            <p class="text-sm text-gray-500">{{ $cartCount }} {{ __("items waiting") }}</p>
                        </div>
                    </a>

                    <!-- My Orders -->
                    <a href="{{ route('orders.index') }}" class="flex items-center p-4 transition duration-300 rounded-lg bg-green-50 hover:bg-green-100">
                        <div class="flex items-center justify-center w-10 h-10 mr-3 bg-green-600 rounded-lg">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900">{{ __("My Orders") }}</p>
                            <p class="text-sm text-gray-500">{{ __("Track order history") }}</p>
                        </div>
                    </a>

                    <!-- Checkout -->
                    @if($cartCount > 0)
                        <a href="{{ route('checkout.index') }}" class="flex items-center p-4 transition duration-300 rounded-lg bg-blue-50 hover:bg-blue-100">
                            <div class="flex items-center justify-center w-10 h-10 mr-3 bg-blue-600 rounded-lg">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">{{ __("Checkout") }}</p>
                                <p class="text-sm text-gray-500">{{ __("Complete your purchase") }}</p>
                            </div>
                        </a>
                    @else
                        <div class="flex items-center p-4 rounded-lg opacity-50 bg-gray-50">
                            <div class="flex items-center justify-center w-10 h-10 mr-3 bg-gray-400 rounded-lg">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium text-gray-500">{{ __("Checkout") }}</p>
                                <p class="text-sm text-gray-400">{{ __("Add items to cart first") }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="p-6 mb-8 bg-white rounded-lg shadow-md">
            <h3 class="mb-4 text-lg font-semibold text-gray-800">Filter Products</h3>
            <form method="GET" action="{{ route('shopping.index') }}" class="grid grid-cols-1 gap-4 md:grid-cols-3">
                <!-- Category Filter -->
                <div>
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-700">Category</label>
                    <select name="category" id="category" class="w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring-purple-500">
                        <option value="all" {{ $category == 'all' ? 'selected' : '' }}>All Categories</option>
                        <option value="pre_pregnancy" {{ $category == 'pre_pregnancy' ? 'selected' : '' }}>Pre-Pregnancy</option>
                        <option value="during_pregnancy" {{ $category == 'during_pregnancy' ? 'selected' : '' }}>During Pregnancy</option>
                        <option value="baby_care" {{ $category == 'baby_care' ? 'selected' : '' }}>Baby Care</option>
                        <option value="nutrition" {{ $category == 'nutrition' ? 'selected' : '' }}>Nutrition</option>
                        <option value="toys" {{ $category == 'toys' ? 'selected' : '' }}>Toys</option>
                        <option value="clothing" {{ $category == 'clothing' ? 'selected' : '' }}>Clothing</option>
                    </select>
                </div>

                <!-- Stage Filter -->
                <div>
                    <label for="stage" class="block mb-2 text-sm font-medium text-gray-700">Baby Age / Stage</label>
                    <select name="stage" id="stage" class="w-full border-gray-300 rounded-md shadow-sm focus:border-purple-500 focus:ring-purple-500">
                        <option value="all" {{ $stage == 'all' ? 'selected' : '' }}>All Stages</option>
                        <option value="before_pregnancy" {{ $stage == 'before_pregnancy' ? 'selected' : '' }}>Before Pregnancy</option>
                        <option value="trimester_1" {{ $stage == 'trimester_1' ? 'selected' : '' }}>1st Trimester</option>
                        <option value="trimester_2" {{ $stage == 'trimester_2' ? 'selected' : '' }}>2nd Trimester</option>
                        <option value="trimester_3" {{ $stage == 'trimester_3' ? 'selected' : '' }}>3rd Trimester</option>
                        <option value="0_6_months" {{ $stage == '0_6_months' ? 'selected' : '' }}>0-6 Months</option>
                        <option value="6_12_months" {{ $stage == '6_12_months' ? 'selected' : '' }}>6-12 Months</option>
                        <option value="1_2_years" {{ $stage == '1_2_years' ? 'selected' : '' }}>1-2 Years</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="flex items-end">
                    <button type="submit" class="w-full px-4 py-2 text-white transition duration-300 bg-purple-600 rounded-md hover:bg-purple-700">
                        Filter Products
                    </button>
                </div>
            </form>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
            @forelse($products as $product)
                <div class="overflow-hidden transition-shadow duration-300 bg-white rounded-lg shadow-md hover:shadow-lg">
                    <!-- Product Image -->
                    <div class="h-48 bg-gray-200">
                        @if($product->image)
                            <img src="{{ asset('images/' . $product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="object-cover w-full h-full">
                        @else
                            <div class="flex items-center justify-center h-full">
                                <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        @endif
                    </div>

                    <!-- Product Details -->
                    <div class="p-4">
                        <h3 class="mb-2 text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                        <p class="mb-3 text-sm text-gray-600">{{ Str::limit($product->description, 100) }}</p>
                        
                        <!-- Category & Stage Badges -->
                        <div class="flex flex-wrap gap-2 mb-3">
                            <span class="px-2 py-1 text-xs font-medium text-purple-800 bg-purple-100 rounded-full">
                                {{ ucfirst(str_replace('_', ' ', $product->category)) }}
                            </span>
                            <span class="px-2 py-1 text-xs font-medium text-pink-800 bg-pink-100 rounded-full">
                                {{ ucfirst(str_replace('_', ' ', $product->stage)) }}
                            </span>
                        </div>

                        <!-- Price -->
                        <div class="flex items-center justify-between">
                            <span class="text-xl font-bold text-gray-900">LKR {{ number_format($product->price, 2) }}</span>
                            @if($product->stock_quantity > 0)
                                <span class="text-sm text-green-600">In Stock</span>
                            @else
                                <span class="text-sm text-red-600">Out of Stock</span>
                            @endif
                        </div>

                        <!-- Add to Cart Form -->
                        <form action="{{ route('shopping.addToCart', $product) }}" method="POST" class="mt-4">
                            @csrf
                            <div class="flex items-center mb-3 space-x-2">
                                <label for="quantity_{{ $product->id }}" class="text-sm text-gray-700">Qty:</label>
                                <select name="quantity" id="quantity_{{ $product->id }}" class="text-sm border-gray-300 rounded">
                                    @for($i = 1; $i <= min(10, $product->stock_quantity); $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            
                            @if($product->stock_quantity > 0)
                                <button type="submit" class="flex items-center justify-center w-full px-4 py-2 space-x-2 text-white transition duration-300 bg-purple-600 rounded-md hover:bg-purple-700">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m3.6 8L9 13m0 0L5.4 7M9 13l4-8m-4 8v6a2 2 0 002 2h6a2 2 0 002-2v-6m-8 0h8"></path>
                                    </svg>
                                    <span>Add to Cart</span>
                                </button>
                            @else
                                <button disabled class="w-full px-4 py-2 text-white bg-gray-400 rounded-md cursor-not-allowed">
                                    Out of Stock
                                </button>
                            @endif
                        </form>
                    </div>
                </div>
            @empty
                <div class="py-12 text-center col-span-full">
                    <svg class="w-12 h-12 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">No products found</h3>
                    <p class="mt-1 text-sm text-gray-500">Try adjusting your filter criteria.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $products->appends(request()->query())->links() }}
        </div>
    </div>

    <!-- Floating Cart Button -->
    <div class="fixed bottom-6 right-6">
        <a href="{{ route('shopping.cart') }}" class="flex items-center p-4 space-x-2 text-white transition duration-300 bg-purple-600 rounded-full shadow-lg hover:bg-purple-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m3.6 8L9 13m0 0L5.4 7M9 13l4-8m-4 8v6a2 2 0 002 2h6a2 2 0 002-2v-6m-8 0h8"></path>
            </svg>
            <span class="hidden sm:inline">Cart</span>
        </a>
    </div>
</body>
</html>