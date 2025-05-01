<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Features - CraddleSoft</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .hero-video-container {
            position: relative;
            height: 80vh;
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
            background: linear-gradient(to bottom, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.3) 100%);
        }

        .feature-card {
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .icon-button {
            transition: all 0.3s ease;
        }

        .icon-button:hover {
            transform: translateY(-3px);
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

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button class="text-white focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Video Section -->
    <div class="hero-video-container">
        <video autoplay loop muted playsinline class="hero-video">
            <source src="{{ asset('images/v2.mp4') }}" type="video/mp4">
        </video>
        <div class="absolute inset-0 content-overlay">
            <!-- Hero Content -->
            <div class="flex flex-col items-center justify-center h-full text-center">
                <h1 class="mb-6 text-5xl font-bold text-white">Comprehensive Features for All Users</h1>
                <p class="max-w-2xl mb-8 text-xl text-white">Empowering mothers, midwives, and healthcare providers with innovative tools for better maternal care.</p>
                <div class="flex flex-wrap justify-center gap-8">
                    <!-- Mother Button -->
                    <a href="#mother-features" class="flex flex-col items-center p-4 transition-all bg-blue-600 rounded-lg icon-button group hover:bg-blue-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mb-2 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 12h.01"></path>
                            <path d="M15 12h.01"></path>
                            <path d="M10 16c.5.3 1.2.5 2 .5s1.5-.2 2-.5"></path>
                            <path d="M19 6.3a9 9 0 0 1 1.8 3.9 2 2 0 0 1 0 3.6 9 9 0 0 1-17.6 0 2 2 0 0 1 0-3.6A9 9 0 0 1 5 6.3"></path>
                            <path d="M12 4V2"></path>
                        </svg>
                        <span class="text-lg font-medium text-white">For Mothers</span>
                    </a>

                    <!-- Midwife Button -->
                    <a href="#midwife-features" class="flex flex-col items-center p-4 transition-all bg-pink-600 rounded-lg icon-button group hover:bg-pink-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mb-2 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <span class="text-lg font-medium text-white">For Midwives</span>
                    </a>

                    <!-- Doctor Button -->
                    <a href="#doctor-features" class="flex flex-col items-center p-4 transition-all bg-green-600 rounded-lg icon-button group hover:bg-green-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 mb-2 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4.8 2.3A.3.3 0 1 0 5 2H4a2 2 0 0 0-2 2v5a6 6 0 0 0 6 6v0a6 6 0 0 0 6-6V4a2 2 0 0 0-2-2h-1a.2.2 0 1 0 .3.3"></path>
                            <path d="M8 15v1a6 6 0 0 0 6 6v0a6 6 0 0 0 6-6v-4"></path>
                            <circle cx="20" cy="10" r="2"></circle>
                        </svg>
                        <span class="text-lg font-medium text-white">For Doctors</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
  <!-- Mother Features Section -->
  <section id="mother-features" class="py-20 bg-white">
    <div class="px-4 mx-auto max-w-7xl">
        <h2 class="mb-12 text-4xl font-bold text-center text-blue-600">Features for Mothers</h2>
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            <div class="p-6 bg-white rounded-lg shadow-lg feature-card">
                <h3 class="mb-4 text-xl font-bold text-blue-600">Pregnancy Tracking</h3>
                <ul class="space-y-2 text-gray-600">
                    <li>• Track pregnancy milestones and development</li>
                    <li>• Record daily health metrics and symptoms</li>
                    <li>• Access personalized health guidelines</li>
                    <li>• Monitor important appointments</li>
                </ul>
            </div>

            <div class="p-6 bg-white rounded-lg shadow-lg feature-card">
                <h3 class="mb-4 text-xl font-bold text-blue-600">Child Health Monitoring</h3>
                <ul class="space-y-2 text-gray-600">
                    <li>• Monitor growth and development charts</li>
                    <li>• Track vaccination schedules</li>
                    <li>• Manage Triposha distribution</li>
                    <li>• Record child health milestones</li>
                </ul>
            </div>

            <div class="p-6 bg-white rounded-lg shadow-lg feature-card">
                <h3 class="mb-4 text-xl font-bold text-blue-600">Health Resources</h3>
                <ul class="space-y-2 text-gray-600">
                    <li>• Access educational materials</li>
                    <li>• View health recommendations</li>
                    <li>• Get nutrition guidelines</li>
                    <li>• Read pregnancy tips and advice</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Midwife Features Section -->
<section id="midwife-features" class="py-20 bg-gray-50">
    <div class="px-4 mx-auto max-w-7xl">
        <h2 class="mb-12 text-4xl font-bold text-center text-pink-600">Features for Midwives</h2>
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            <div class="p-6 bg-white rounded-lg shadow-lg feature-card">
                <h3 class="mb-4 text-xl font-bold text-pink-600">Patient Management</h3>
                <ul class="space-y-2 text-gray-600">
                    <li>• Manage mother and child records</li>
                    <li>• Schedule appointments</li>
                    <li>• Track high-risk pregnancies</li>
                    <li>• Monitor patient progress</li>
                </ul>
            </div>

            <div class="p-6 bg-white rounded-lg shadow-lg feature-card">
                <h3 class="mb-4 text-xl font-bold text-pink-600">Health Check Management</h3>
                <ul class="space-y-2 text-gray-600">
                    <li>• Record vital signs and metrics</li>
                    <li>• Document health assessments</li>
                    <li>• Track pregnancy progress</li>
                    <li>• Manage vaccination records</li>
                </ul>
            </div>

            <div class="p-6 bg-white rounded-lg shadow-lg feature-card">
                <h3 class="mb-4 text-xl font-bold text-pink-600">Resource Distribution</h3>
                <ul class="space-y-2 text-gray-600">
                    <li>• Manage Triposha allocation</li>
                    <li>• Track medical supplies</li>
                    <li>• Monitor resource distribution</li>
                    <li>• Generate distribution reports</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Doctor Features Section -->
<section id="doctor-features" class="py-20 bg-white">
    <div class="px-4 mx-auto max-w-7xl">
        <h2 class="mb-12 text-4xl font-bold text-center text-green-600">Features for MOH Doctors</h2>
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            <div class="p-6 bg-white rounded-lg shadow-lg feature-card">
                <h3 class="mb-4 text-xl font-bold text-green-600">Health Monitoring</h3>
                <ul class="space-y-2 text-gray-600">
                    <li>• Access comprehensive patient data</li>
                    <li>• Monitor health trends</li>
                    <li>• Track high-risk cases</li>
                    <li>• Review medical histories</li>
                </ul>
            </div>

            <div class="p-6 bg-white rounded-lg shadow-lg feature-card">
                <h3 class="mb-4 text-xl font-bold text-green-600">Data Analysis</h3>
                <ul class="space-y-2 text-gray-600">
                    <li>• Generate health reports</li>
                    <li>• Analyze population health data</li>
                    <li>• Track regional statistics</li>
                    <li>• Monitor key health indicators</li>
                </ul>
            </div>

            <div class="p-6 bg-white rounded-lg shadow-lg feature-card">
                <h3 class="mb-4 text-xl font-bold text-green-600">Resource Management</h3>
                <ul class="space-y-2 text-gray-600">
                    <li>• Oversee resource allocation</li>
                    <li>• Monitor supply distribution</li>
                    <li>• Track facility utilization</li>
                    <li>• Manage medical inventories</li>
                </ul>
            </div>
        </div>
    </div>
</section>
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