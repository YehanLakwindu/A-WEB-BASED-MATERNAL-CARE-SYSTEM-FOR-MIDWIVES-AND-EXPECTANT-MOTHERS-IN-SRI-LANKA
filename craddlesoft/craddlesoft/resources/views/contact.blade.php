<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - CraddleSoft</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Hero video container */
        .hero-video-container {
            position: relative;
            height: 100vh;
            overflow: hidden;
            background-color: rgba(0, 0, 0, 0.4);
        }
        
        .hero-video {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            transform: translateX(-50%) translateY(-50%);
            z-index: -1;
            object-fit: cover;
        }

        .content-overlay {
            background: linear-gradient(to bottom, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.5) 100%);
        }

        /* Text Animation */
        .hero-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
            opacity: 0;
            animation: fadeInOut 6s forwards;
        }

        @keyframes fadeInOut {
            0% {
                opacity: 0;
                transform: translate(-50%, -50%) scale(0.9);
            }
            30% {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
            }
            70% {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
            }
            100% {
                opacity: 0;
                transform: translate(-50%, -50%) scale(0.9);
            }
        }

        .contact-form {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }

        .contact-info-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(5px);
            transition: all 0.3s ease;
        }

        .contact-info-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .form-input {
            transition: all 0.3s ease;
        }

        .form-input:focus {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="fixed top-0 left-0 right-0 z-50 bg-transparent">
        <div class="px-6 py-3 mx-auto max-w-7xl">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('images/prologo.png') }}" alt="CraddleSoft Logo" class="h-12">
                    <span class="ml-2 text-2xl font-extrabold text-white">CraddleSoft</span>
                </div>

                <div class="hidden space-x-8 md:flex">
                    <a href="{{ url('/') }}" class="px-4 py-2 font-medium text-white transition-all hover:text-blue-300">Home</a>
                    <a href="{{ route('about') }}" class="px-4 py-2 font-medium text-white transition-all hover:text-blue-300">About</a>
                    <a href="{{ route('features') }}" class="px-4 py-2 font-medium text-white transition-all hover:text-blue-300">Features</a>
                    <a href="{{ route('contact') }}" class="px-4 py-2 font-medium text-white transition-all hover:text-blue-300">Contact</a>
                    @auth
                        <a href="{{ route('dashboard') }}" class="px-6 py-2 font-medium text-white transition-all bg-blue-600 rounded-lg hover:bg-blue-700">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="px-6 py-2 font-medium text-white transition-all bg-blue-600 rounded-lg hover:bg-blue-700">Log in</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Video Background Section -->
    <div class="hero-video-container">
        <video autoplay loop muted playsinline class="hero-video">
            <source src="{{ asset('images/v3.mp4') }}" type="video/mp4">
        </video>
        <div class="absolute inset-0 content-overlay"></div>

        <!-- Animated Text -->
        <div class="hero-text">
            <p>Contact CraddleSoft</p>
            <p>Where Can We Help You?</p>
        </div>
    </div>

    <!-- Contact Form Section -->
    <div class="container px-4 mx-auto mt-24 max-w-7xl">
        <div class="flex flex-col items-center justify-center min-h-screen">
            <div class="w-full max-w-4xl px-8 py-12 rounded-lg contact-form">
                <h1 class="mb-2 text-4xl font-bold text-center text-gray-800">Get in Touch</h1>
                <p class="mb-8 text-center text-gray-600">We're here to help and answer any questions you might have</p>

                <!-- Contact Information Cards -->
                <div class="grid grid-cols-1 gap-6 mb-12 md:grid-cols-3">
                    <div class="p-6 text-center rounded-lg contact-info-card">
                        <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4 text-blue-600 bg-blue-100 rounded-full">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <h3 class="mb-2 text-lg font-semibold">Phone</h3>
                        <p class="text-gray-600">+94 772124468</p>
                    </div>

                    <div class="p-6 text-center rounded-lg contact-info-card">
                        <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4 text-pink-600 bg-pink-100 rounded-full">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="mb-2 text-lg font-semibold">Email</h3>
                        <p class="text-gray-600">craddlesoft@gmail.com</p>
                    </div>

                    <div class="p-6 text-center rounded-lg contact-info-card">
                        <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4 text-green-600 bg-green-100 rounded-full">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <h3 class="mb-2 text-lg font-semibold">Location</h3>
                        <p class="text-gray-600">Colombo, Sri Lanka</p>
                    </div>
                </div>

                <!-- Contact Form -->
<form action="{{ route('contact.submit') }}" method="POST" class="max-w-3xl p-8 mx-auto space-y-8 bg-white rounded-lg shadow-lg">
    @csrf
    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
        <div>
            <label for="name" class="block text-lg font-semibold text-gray-800">Your Name</label>
            <input type="text" id="name" name="name" class="w-full px-5 py-4 text-gray-800 placeholder-gray-500 border border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200" placeholder="Enter your name" required>
        </div>
        <div>
            <label for="email" class="block text-lg font-semibold text-gray-800">Email Address</label>
            <input type="email" id="email" name="email" class="w-full px-5 py-4 text-gray-800 placeholder-gray-500 border border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200" placeholder="Enter your email" required>
        </div>
    </div>

    <div>
        <label for="subject" class="block text-lg font-semibold text-gray-800">Subject</label>
        <input type="text" id="subject" name="subject" class="w-full px-5 py-4 text-gray-800 placeholder-gray-500 border border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200" placeholder="Subject of your message" required>
    </div>

    <div>
        <label for="message" class="block text-lg font-semibold text-gray-800">Message</label>
        <textarea id="message" name="message" rows="6" class="w-full px-5 py-4 text-gray-800 placeholder-gray-500 border border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-2 focus:ring-blue-200" placeholder="Write your message here" required></textarea>
    </div>

    <div class="flex justify-center">
        <button type="submit" class="px-8 py-4 text-white transition duration-300 ease-in-out transform bg-blue-600 rounded-lg shadow-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-300 focus:outline-none hover:scale-105">Send Message</button>
    </div>
</form>

            </div>
        </div>
    </div>

          <!-- Footer -->
<footer class="py-12 text-white bg-gray-900">
  <div class="px-4 mx-auto max-w-7xl">
      <!-- Logo and Brand Section -->
      <div class="flex items-center justify-center mb-8">
          <img src="images/prologo.png" alt="CraddleSoft Logo" class="h-16">
          <span class="ml-4 text-2xl font-extrabold text-blue-500">CraddleSoft</span>
      </div>

      <div class="grid grid-cols-1 gap-8 md:grid-cols-4">
          <!-- About Section -->
          <div>
              <h4 class="mb-4 text-lg font-semibold text-blue-400">About CraddleSoft</h4>
              <p class="text-gray-400">
                  Empowering maternal healthcare through innovative digital solutions. We are committed to enhancing the well-being of mothers and children.
              </p>
          </div>
          
          <!-- Quick Links -->
          <div>
              <h4 class="mb-4 text-lg font-semibold text-blue-400">Quick Links</h4>
              <ul class="space-y-2">
                  <li><a href="#" class="text-gray-400 hover:text-blue-500">Home</a></li>
                  <li><a href="#features" class="text-gray-400 hover:text-blue-500">Features</a></li>
                  <li><a href="#about" class="text-gray-400 hover:text-blue-500">About Us</a></li>
                  <li><a href="#contact" class="text-gray-400 hover:text-blue-500">Contact</a></li>
              </ul>
          </div>

          <!-- Support -->
          <div>
              <h4 class="mb-4 text-lg font-semibold text-blue-400">Support</h4>
              <ul class="space-y-2">
                  <li><a href="#" class="text-gray-400 hover:text-blue-500">Help Center</a></li>
                  <li><a href="#" class="text-gray-400 hover:text-blue-500">Terms of Service</a></li>
                  <li><a href="#" class="text-gray-400 hover:text-blue-500">Privacy Policy</a></li>
              </ul>
          </div>

          <!-- Contact -->
          <div>
              <h4 class="mb-4 text-lg font-semibold text-blue-400">Contact Us</h4>
              <ul class="space-y-2">
                  <li>Email: <a href="mailto:craddlesoft@gmail.com" class="text-gray-400 hover:text-blue-500">craddlesoft@gmail.com</a></li>
                  <li>Phone: 077-2124468</li>
              </ul>
          </div>
      </div>

      <!-- Social Media Icons -->
      <div class="flex justify-center mt-8 space-x-6">
          <a href="#" class="text-gray-400 hover:text-blue-500">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M22.675 0H1.325C.595 0 0 .594 0 1.324v21.351C0 23.406.594 24 1.324 24H12.82v-9.293H9.692V11.23h3.127V8.445c0-3.1 1.893-4.788 4.656-4.788 1.324 0 2.463.099 2.794.143v3.242h-1.918c-1.507 0-1.797.716-1.797 1.763v2.312h3.594l-.468 3.478h-3.126V24h6.127c.729 0 1.324-.594 1.324-1.324V1.324C24 .594 23.406 0 22.675 0z"/>
              </svg>
          </a>
          <a href="#" class="text-gray-400 hover:text-blue-500">
              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M23.954 4.57a10 10 0 01-2.825.775 4.93 4.93 0 002.165-2.725 9.864 9.864 0 01-3.127 1.184 4.916 4.916 0 00-8.384 4.482A13.955 13.955 0 011.671 3.15a4.916 4.916 0 001.523 6.556 4.897 4.897 0 01-2.224-.616c-.054 2.28 1.581 4.415 3.949 4.89a4.935 4.935 0 01-2.224.085 4.917 4.917 0 004.6 3.417 9.868 9.868 0 01-6.102 2.104c-.39 0-.779-.023-1.17-.067a13.933 13.933 0 007.548 2.209c9.142 0 14.307-7.72 13.995-14.646A10.025 10.025 0 0024 4.59a9.936 9.936 0 01-2.046.57z"/>
              </svg>
          </a>
      </div>

      <!-- Copyright -->
      <div class="pt-8 mt-8 text-center text-gray-400 border-t border-gray-700">
          <p>&copy; {{ date('Y') }} CraddleSoft. All rights reserved.</p>
      </div>
  </div>
</footer>
</body>
</html>
