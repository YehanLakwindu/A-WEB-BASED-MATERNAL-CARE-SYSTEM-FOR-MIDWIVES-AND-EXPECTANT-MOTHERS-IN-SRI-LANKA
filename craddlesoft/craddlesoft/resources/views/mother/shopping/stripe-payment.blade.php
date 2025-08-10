<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CraddleSoft - Payment</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://js.stripe.com/v3/"></script>
</head>
<body class="bg-gray-50">
    <div class="max-w-4xl px-4 py-8 mx-auto sm:px-6 lg:px-8">
        <div class="p-8 bg-white rounded-lg shadow-md">
            <div class="mb-8 text-center">
                <h1 class="text-2xl font-bold text-gray-800">Complete Your Payment</h1>
                <h2 class="text-xl text-gray-600">Order Total: ${{ number_format($total/300, 2) }} USD</h2>
                <p class="text-gray-500">Order #{{ $order->order_number }}</p>
                <p class="text-sm text-gray-500">(LKR {{ number_format($total, 2) }} ≈ ${{ number_format($total/300, 2) }} USD)</p>
                
                <div class="p-4 mt-4 bg-blue-100 border border-blue-400 rounded-lg">
                    <p class="font-semibold text-blue-800">🧪 TEST MODE</p>
                    <p class="text-sm text-blue-700">Use test card: 4242424242424242, Exp: 12/25, CVV: 123</p>
                </div>
            </div>

            <!-- Stripe Payment Form -->
            <form id="payment-form" class="max-w-md mx-auto">
                <div id="card-element" class="p-4 mb-4 border border-gray-300 rounded-lg">
                    <!-- Stripe Elements will create form elements here -->
                </div>
                
                <div id="card-errors" role="alert" class="mb-4 text-sm text-red-600"></div>
                
                <button type="submit" id="submit-button" class="w-full px-6 py-4 text-lg font-semibold text-white transition duration-300 bg-blue-600 rounded-lg hover:bg-blue-700 disabled:opacity-50">
                    <span id="button-text">💳 Pay ${{ number_format($total/300, 2) }} USD</span>
                    <span id="spinner" class="hidden">Processing...</span>
                </button>
            </form>

            <div class="mt-6 text-center">
                <a href="{{ route('shopping.cart') }}" class="text-sm text-gray-600 hover:text-gray-800">
                    ← Back to Cart
                </a>
            </div>
        </div>
    </div>

    <script>
        const stripe = Stripe('{{ $stripeKey }}');
        const elements = stripe.elements();
        
        // Create card element
        const cardElement = elements.create('card', {
            style: {
                base: {
                    fontSize: '16px',
                    color: '#424770',
                    '::placeholder': {
                        color: '#aab7c4',
                    },
                },
            },
        });
        
        cardElement.mount('#card-element');
        
        // Handle form submission
        const form = document.getElementById('payment-form');
        const submitButton = document.getElementById('submit-button');
        const buttonText = document.getElementById('button-text');
        const spinner = document.getElementById('spinner');
        
        form.addEventListener('submit', async (event) => {
            event.preventDefault();
            
            submitButton.disabled = true;
            buttonText.classList.add('hidden');
            spinner.classList.remove('hidden');
            
            const {error, paymentIntent} = await stripe.confirmCardPayment(
                '{{ $paymentIntent->client_secret }}',
                {
                    payment_method: {
                        card: cardElement,
                    }
                }
            );
            
            if (error) {
                document.getElementById('card-errors').textContent = error.message;
                submitButton.disabled = false;
                buttonText.classList.remove('hidden');
                spinner.classList.add('hidden');
            } else {
                // Payment succeeded
                window.location.href = '{{ route("stripe.success") }}?payment_intent=' + paymentIntent.id;
            }
        });
        
        // Handle real-time validation errors from the card Element
        cardElement.on('change', (event) => {
            const displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
    </script>
</body>
</html>