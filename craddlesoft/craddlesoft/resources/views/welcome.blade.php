<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CraddleSoft - Maternal Care Platform</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .hero-bg {
            background: url('images/mombaby.jpg') no-repeat center center;
            background-size: cover;
            transition: background-image 0.5s ease-in-out;
            animation: backgroundSwitch 25s infinite;
        }

        .gradient-text {
            background: linear-gradient(to right, white, blue);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Keyframes for Background Animation */
        @keyframes backgroundSwitch {
            0% {
                background-image: url('images/mombaby.jpg');
            }

            14.28% {
                background-image: url('images/p1.jpg');
            }

            28.57% {
                background-image: url('images/withdoc.jpg');
            }

            42.86% {
                background-image: url('images/p2.jpg');
            }

            57.14% {
                background-image: url('images/p3.jpg');
            }

            71.43% {
                background-image: url('images/p4.jpg');
            }

            85.71% {
                background-image: url('images/p5.jpg');
            }

            100% {
                background-image: url('images/mombaby.jpg');
            }
        }

        .hero-section {
            animation: backgroundSwitch 30s infinite;
        }

        /* Footer */
        .footer-icon:hover {
            color: #3B82F6;
            transform: scale(1.1);
        }

        /* Card Hover Effect */
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="bg-gray-50">
    <!-- Navigation -->
    <nav class="sticky top-0 z-50 bg-white shadow-lg">
        <div class="px-6 mx-auto max-w-7xl">
            <div class="flex items-center justify-between py-4">
                <!-- Logo Section -->
                <div class="flex items-center space-x-3">
                    <img src="images/logo1.png" alt="CraddleSoft Logo" class="h-12 transition-transform transform hover:scale-110">
                    <span class="text-2xl font-bold text-blue-600 transition-colors hover:text-indigo-700">CraddleSoft</span>
                </div>

                <!-- Desktop Navigation Links -->
                <div class="items-center hidden space-x-6 md:flex">
                    <a href="#" class="relative px-4 py-2 font-medium text-gray-800 transition duration-300 ease-in-out hover:text-blue-600 group">
                        Home
                        <span class="absolute bottom-0 left-0 w-0 h-1 transition-all duration-300 bg-blue-600 group-hover:w-full"></span>
                    </a>
                    <a href="{{ route('about') }}" class="relative px-4 py-2 font-medium text-gray-800 transition duration-300 ease-in-out hover:text-blue-600 group">
                        About
                        <span class="absolute bottom-0 left-0 w-0 h-1 transition-all duration-300 bg-blue-600 group-hover:w-full"></span>
                    </a>
                    <a href="{{ route('features') }}" class="relative px-4 py-2 font-medium text-gray-800 transition duration-300 ease-in-out hover:text-blue-600 group">
                        Features
                        <span class="absolute bottom-0 left-0 w-0 h-1 transition-all duration-300 bg-blue-600 group-hover:w-full"></span>
                    </a>
                    <a href="{{ route('contact') }}" class="relative px-4 py-2 font-medium text-gray-800 transition duration-300 ease-in-out hover:text-blue-600 group">
                        Contact
                        <span class="absolute bottom-0 left-0 w-0 h-1 transition-all duration-300 bg-blue-600 group-hover:w-full"></span>
                    </a>
                    @auth
                    <a href="{{ route('dashboard') }}" class="px-6 py-2 font-medium text-white transition-all transform bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 hover:-translate-y-1">
                        Dashboard
                    </a>
                    @else
                    <a href="{{ route('login') }}" class="px-6 py-2 font-medium text-white transition-all transform bg-blue-600 rounded-lg shadow-md hover:bg-blue-700 hover:-translate-y-1">
                        Log in
                    </a>
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="px-6 py-2 font-medium text-white transition-all transform bg-green-600 rounded-lg shadow-md hover:bg-green-700 hover:-translate-y-1">
                        Register
                    </a>
                    @endif
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="py-32 hero-bg hero-section">
        <div class="px-6 py-16 mx-auto text-white max-w-7xl">
            <div class="grid items-center grid-cols-1 gap-8 md:grid-cols-2">
                <div>
                    <h1 class="mb-6 font-extrabold text-7xl gradient-text">CraddleSoft</h1>

                    <h2 class="mb-5 text-5xl font-bold">Nurturing Every Life</h2>
                    <p class="mb-10 text-xl leading-relaxed">
                        CraddleSoft provides comprehensive support for maternal healthcare, connecting mothers, midwives, and healthcare providers in one seamless platform.
                    </p>
                    <div class="space-x-6">
                        <a href="{{ route('register') }}" class="px-8 py-4 font-semibold text-blue-600 transition-all bg-white rounded-md hover:bg-gray-100">Get Started</a>
                        <a href="https://www.who.int/health-topics/maternal-health#tab=tab_1" class="px-8 py-4 font-semibold text-white transition-all border-2 border-white rounded-md hover:bg-white hover:text-blue-600">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div id="services" class="py-20 bg-blue-50">
        <div class="px-4 mx-auto text-center max-w-7xl">
            <h2 class="mb-8 text-4xl font-extrabold text-blue-600">Services of Clinical Excellence</h2>
            <div class="grid grid-cols-1 gap-12 md:grid-cols-3">
                <div class="p-6 bg-white rounded-lg shadow-lg service-card hover:scale-105">
                    <h3 class="mb-4 text-2xl font-semibold text-blue-600">Prenatal Care</h3>
                    <p class="text-lg text-gray-600">
                        We offer personalized prenatal care to ensure the health and well-being of both mothers and babies throughout pregnancy.
                    </p>
                </div>
                <div class="p-6 bg-white rounded-lg shadow-lg service-card hover:scale-105">
                    <h3 class="mb-4 text-2xl font-semibold text-blue-600">Postpartum Support</h3>
                    <p class="text-lg text-gray-600">
                        Our platform provides continued support after childbirth to help mothers recover and adjust to life with a newborn.
                    </p>
                </div>
                <div class="p-6 bg-white rounded-lg shadow-lg service-card hover:scale-105">
                    <h3 class="mb-4 text-2xl font-semibold text-blue-600">Telemedicine Services</h3>
                    <p class="text-lg text-gray-600">
                        Our telemedicine services connect mothers with healthcare providers remotely, ensuring easy access to medical care.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog Section -->
    <div id="blog" class="py-20 bg-gray-50">
        <div class="px-4 mx-auto text-center max-w-7xl">
            <h2 class="mb-12 text-4xl font-extrabold text-blue-600">Blog & News</h2>
            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                <!-- Blog 1 -->
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <img src="images/b1.jpg" alt="Pregnancy Tips" class="object-cover w-full mb-4 rounded-lg h-60">
                    <h3 class="mb-4 text-2xl font-semibold text-blue-600">Pregnancy Tips</h3>
                    <p class="mb-4 text-lg text-gray-600">Latest tips and advice for a healthy and safe pregnancy.</p>
                    <a href="#" class="text-blue-600 transition-all hover:underline">Read More</a>
                </div>
                <!-- Blog 2 -->
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <img src="images/b2.jpg" alt="Motherhood Journey" class="object-cover w-full mb-4 rounded-lg h-60">
                    <h3 class="mb-4 text-2xl font-semibold text-blue-600">Motherhood Journey</h3>
                    <p class="mb-4 text-lg text-gray-600">Inspiring stories from real mothers sharing their experiences and advice.</p>
                    <a href="#" class="text-blue-600 transition-all hover:underline">Read More</a>
                </div>
                <!-- Blog 3 -->
                <div class="p-6 bg-white rounded-lg shadow-lg">
                    <img src="images/b3.jpg" alt="Healthcare Innovations" class="object-cover w-full mb-4 rounded-lg h-60">
                    <h3 class="mb-4 text-2xl font-semibold text-blue-600">Healthcare Innovations</h3>
                    <p class="mb-4 text-lg text-gray-600">The latest advancements in maternal healthcare and digital health solutions.</p>
                    <a href="#" class="text-blue-600 transition-all hover:underline">Read More</a>
                </div>
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
                <a href="#" class="text-gray-400 footer-icon hover:text-blue-500">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M22.675 0H1.325C.595 0 0 .594 0 1.324v21.351C0 23.406.594 24 1.324 24H12.82v-9.293H9.692V11.23h3.127V8.445c0-3.1 1.893-4.788 4.656-4.788 1.324 0 2.463.099 2.794.143v3.242h-1.918c-1.507 0-1.797.716-1.797 1.763v2.312h3.594l-.468 3.478h-3.126V24h6.127c.729 0 1.324-.594 1.324-1.324V1.324C24 .594 23.406 0 22.675 0z"/>
                    </svg>
                </a>
                <a href="#" class="text-gray-400 footer-icon hover:text-blue-500">
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
