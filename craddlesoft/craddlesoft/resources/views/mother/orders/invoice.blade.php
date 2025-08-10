<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $order->order_number }} - CraddleSoft</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .no-print { display: none !important; }
            body { -webkit-print-color-adjust: exact; }
        }
    </style>
</head>
<body class="bg-white">
    <div class="max-w-4xl px-4 py-8 mx-auto">
        <!-- Print Button -->
        <div class="mb-6 text-right no-print">
            <button onclick="window.print()" class="px-4 py-2 text-white transition duration-300 bg-blue-600 rounded-md hover:bg-blue-700">
                🖨️ Print Invoice
            </button>
            <a href="{{ route('orders.show', $order) }}" class="px-4 py-2 ml-3 text-white transition duration-300 bg-gray-600 rounded-md hover:bg-gray-700">
                ← Back to Order
            </a>
        </div>

        <!-- Invoice -->
        <div class="p-8 bg-white border border-gray-200 rounded-lg">
            <!-- Invoice Header -->
            <div class="flex items-start justify-between mb-8">
                <div>
                    <h1 class="text-3xl font-bold text-purple-600">CraddleSoft</h1>
                    <p class="mt-2 text-gray-600">Baby Care & Pregnancy Support</p>
                    <p class="text-sm text-gray-500">Colombo, Sri Lanka</p>
                </div>
                <div class="text-right">
                    <h2 class="text-2xl font-bold text-gray-800">INVOICE</h2>
                    <p class="text-gray-600">Invoice #{{ $order->order_number }}</p>
                    <p class="text-sm text-gray-500">{{ $order->created_at->format('M d, Y') }}</p>
                </div>
            </div>

            <!-- Customer Info -->
            <div class="grid grid-cols-1 gap-8 mb-8 md:grid-cols-2">
                <div>
                    <h3 class="mb-3 text-lg font-semibold text-gray-800">Bill To:</h3>
                    @if($order->shipping_address)
                        <div class="text-gray-600">
                            <p class="font-medium">{{ $order->shipping_address['name'] }}</p>
                            <p>{{ $order->shipping_address['address'] }}</p>
                            <p>{{ $order->shipping_address['city'] }}, {{ $order->shipping_address['postal_code'] }}</p>
                            <p>{{ $order->shipping_address['phone'] }}</p>
                            <p>{{ $order->shipping_address['email'] }}</p>
                        </div>
                    @endif
                </div>
                <div>
                    <h3 class="mb-3 text-lg font-semibold text-gray-800">Order Details:</h3>
                    <div class="text-gray-600">
                        <p><span class="font-medium">Order Date:</span> {{ $order->created_at->format('M d, Y h:i A') }}</p>
                        <p><span class="font-medium">Payment Status:</span> 
                            <span class="font-medium 
                                @if($order->payment_status === 'completed') text-green-600
                                @elseif($order->payment_status === 'pending') text-yellow-600
                                @else text-red-600
                                @endif">
                                {{ ucfirst($order->payment_status) }}
                            </span>
                        </p>
                        <p><span class="font-medium">Payment Method:</span> Credit Card (Stripe)</p>
                    </div>
                </div>
            </div>

            <!-- Order Items Table -->
            <div class="mb-8">
                <table class="w-full border border-collapse border-gray-300">
                    <thead>
                        <tr class="bg-gray-50">
                            <th class="px-4 py-3 font-semibold text-left text-gray-800 border border-gray-300">Product</th>
                            <th class="px-4 py-3 font-semibold text-center text-gray-800 border border-gray-300">Qty</th>
                            <th class="px-4 py-3 font-semibold text-right text-gray-800 border border-gray-300">Unit Price</th>
                            <th class="px-4 py-3 font-semibold text-right text-gray-800 border border-gray-300">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderItems as $item)
                            <tr>
                                <td class="px-4 py-3 border border-gray-300">
                                    <div>
                                        <p class="font-medium text-gray-900">{{ $item->product->name }}</p>
                                        <p class="text-sm text-gray-500">{{ $item->product->description }}</p>
                                        <div class="flex mt-1 space-x-2">
                                            <span class="px-2 py-1 text-xs text-gray-700 bg-gray-100 rounded">
                                                {{ ucfirst(str_replace('_', ' ', $item->product->category)) }}
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-center border border-gray-300">{{ $item->quantity }}</td>
                                <td class="px-4 py-3 text-right border border-gray-300">LKR {{ number_format($item->price, 2) }}</td>
                                <td class="px-4 py-3 font-medium text-right border border-gray-300">LKR {{ number_format($item->quantity * $item->price, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Invoice Totals -->
            <div class="flex justify-end">
                <div class="w-64">
                    <div class="space-y-2">
                        <div class="flex justify-between py-2">
                            <span class="text-gray-600">Subtotal:</span>
                            <span class="font-medium">LKR {{ number_format($order->total_amount, 2) }}</span>
                        </div>
                        <div class="flex justify-between py-2">
                            <span class="text-gray-600">Shipping:</span>
                            <span class="font-medium text-green-600">Free</span>
                        </div>
                        <div class="flex justify-between py-2 border-t border-gray-300">
                            <span class="text-lg font-semibold text-gray-800">Total:</span>
                            <span class="text-lg font-bold text-gray-900">LKR {{ number_format($order->total_amount, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="pt-8 mt-12 text-sm text-center text-gray-500 border-t border-gray-200">
                <p>Thank you for shopping with CraddleSoft!</p>
                <p class="mt-2">For any questions about this invoice, please contact support@craddlesoft.com</p>
            </div>
        </div>
    </div>
</body>
</html>