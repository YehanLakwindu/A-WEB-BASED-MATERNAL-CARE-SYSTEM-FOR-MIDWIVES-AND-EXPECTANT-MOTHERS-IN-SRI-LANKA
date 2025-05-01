<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - CraddleSoft</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
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
            background: linear-gradient(to bottom, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.3) 100%);
        }

        /* Keyframes for the number pop-up animation */
@keyframes popUp {
  0% {
    transform: scale(0);
    opacity: 0;
  }
  50% {
    transform: scale(1.5);
    opacity: 1;
  }
  100% {
    transform: scale(1);
    opacity: 1;
  }
}

.number {
  animation: popUp 1s ease-out;
}

    </style>
</head>

<body class="bg-gray-50">
    <!-- Hero Video Section -->
    <div class="hero-video-container">
        <video autoplay loop muted playsinline class="hero-video">
            <source src="images/v1.mp4" type="video/mp4">
        </video>
        <div class="absolute inset-0 content-overlay">
            <!-- Navigation -->
            <nav class="z-50 bg-transparent">
                <div class="px-6 py-3 mx-auto max-w-7xl">
                    <div class="flex items-center justify-between">
                        <!-- Logo Section -->
                        <div class="flex items-center space-x-4">
                          <img src="{{ asset('images/prologo.png') }}" alt="CraddleSoft Logo" class="h-12">
                            <span class="ml-2 text-2xl font-extrabold text-white">CraddleSoft</span>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 md:flex">
                            <a href="{{ url('/') }}" class="px-4 py-2 font-medium text-white transition-all hover:text-blue-300">Home</a>
                            <a href="{{ route('about') }}" class="px-4 py-2 font-medium text-white transition-all hover:text-blue-300">About</a>
                            <a href="{{ route('features') }}" class="px-4 py-2 font-medium text-white transition-all hover:text-blue-300">Features</a>
                            <a href="{{ route('contact') }}" class="px-4 py-2 font-medium text-white transition-all hover:text-blue-300">Contact</a>

                            @auth
                            <a href="{{ route('dashboard') }}" class="px-6 py-2 font-medium text-white transition-all bg-blue-600 rounded-lg hover:bg-blue-700">Dashboard</a>
                            @else
                            <a href="{{ route('login') }}" class="px-6 py-2 font-medium text-white transition-all bg-blue-600 rounded-lg hover:bg-blue-700">Log in</a>
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-6 py-2 font-medium text-white transition-all bg-blue-600 rounded-lg hover:bg-blue-700">Register</a>
                            @endif
                            @endauth
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Hero Content -->
            <div class="flex flex-col items-center justify-center h-full text-center">
                <h1 class="mb-6 text-5xl font-bold text-white">Revolutionizing Maternal Healthcare</h1>
                <p class="max-w-2xl mb-8 text-xl text-white">Our platform empowers mothers, midwives, and healthcare providers to connect seamlessly for a better healthcare experience.</p>
                <a href="#about" class="px-8 py-3 text-lg font-medium text-white transition-all bg-blue-600 rounded-lg hover:bg-blue-700">
                    Learn More
                </a>
            </div>
        </div>
    </div>
<!-- About Section with Statistics -->
<div id="about" class="py-20 bg-gray-100">
    <div class="px-4 mx-auto max-w-7xl">
        <h2 class="text-4xl font-bold text-center text-blue-600">About CraddleSoft</h2>
        <p class="mt-6 text-lg leading-relaxed text-center text-gray-700">
            CraddleSoft is committed to empowering maternal healthcare by providing innovative digital solutions that connect mothers, midwives, and healthcare providers seamlessly. Our goal is to create a robust, easy-to-use platform to support expectant mothers throughout their pregnancy journey while assisting healthcare professionals in monitoring and managing their care efficiently.
        </p>

        <!-- Statistics Section -->
        <div class="grid grid-cols-1 gap-6 mt-12 md:grid-cols-4" id="stats-section">
            <!-- Card 1 -->
            <div class="flex flex-col items-center justify-center p-6 bg-white rounded-lg shadow-lg">
                <div class="text-5xl font-bold text-blue-600 number" data-animate="projects">49+</div>
                <p class="mt-2 text-lg text-gray-700">Projects Completed</p>
            </div>

            <!-- Card 2 -->
            <div class="flex flex-col items-center justify-center p-6 bg-white rounded-lg shadow-lg">
                <div class="text-5xl font-bold text-blue-600 number" data-animate="mothers">2,461+</div>
                <p class="mt-2 text-lg text-gray-700">Mothers Assisted</p>
            </div>

            <!-- Card 3 -->
            <div class="flex flex-col items-center justify-center p-6 bg-white rounded-lg shadow-lg">
                <div class="text-5xl font-bold text-blue-600 number" data-animate="providers">99+</div>
                <p class="mt-2 text-lg text-gray-700">Healthcare Providers</p>
            </div>

            <!-- Card 4 -->
            <div class="flex flex-col items-center justify-center p-6 bg-white rounded-lg shadow-lg">
                <div class="text-5xl font-bold text-blue-600 number" data-animate="features">49+</div>
                <p class="mt-2 text-lg text-gray-700">Features Launched</p>
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
<script>
    // Function to check if an element is in the viewport
    function isElementInViewport(el) {
      const rect = el.getBoundingClientRect();
      return rect.top >= 0 && rect.left >= 0 && rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) && rect.right <= (window.innerWidth || document.documentElement.clientWidth);
    }
  
    // Function to animate numbers
    function animateNumbers() {
      const numbers = document.querySelectorAll('.number');
      
      numbers.forEach((num) => {
        if (isElementInViewport(num) && !num.classList.contains('animated')) {
          num.classList.add('animated'); // Prevent multiple animations
          num.style.animation = 'popUp 1s ease-out forwards';
        }
      });
    }
  
    // Listen to scroll event to check when the numbers come into view
    window.addEventListener('scroll', animateNumbers);
  
    // Trigger the animation when page loads (in case it's already in the viewport)
    window.addEventListener('load', animateNumbers);
  </script>
  

</html>