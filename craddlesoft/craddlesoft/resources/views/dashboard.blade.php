<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if(Auth::user()->hasRole('admin'))
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Admin Dashboard - Features</title>
      <!-- Tailwind CSS CDN -->
      <script src="https://cdn.tailwindcss.com"></script>
      <style>
        /* Fade in and slide in animations */
        @keyframes fade-in {
          from { opacity: 0; }
          to { opacity: 1; }
        }
        @keyframes slide-in {
          from { transform: translateY(-20px); opacity: 0; }
          to { transform: translateY(0); opacity: 1; }
        }
        /* Gradient background animation */
        @keyframes gradientBG {
          0% { background-position: 0% 50%; }
          50% { background-position: 100% 50%; }
          100% { background-position: 0% 50%; }
        }
        /* Bounce animation for hover */
        @keyframes bounce {
          0%, 100% { transform: translateY(0); }
          50% { transform: translateY(-10px); }
        }
        .animate-fade-in {
          animation: fade-in 1.5s ease-in-out;
        }
        .animate-slide-in {
          animation: slide-in 1s ease-out;
        }
        .animate-gradient {
          background-size: 200% 200%;
          animation: gradientBG 5s ease infinite;
        }
        .hover-bounce:hover {
          animation: bounce 1s;
        }
      </style>
    </head>
    <body class="bg-gray-50">
      <div class="min-h-screen bg-gray-50">
        <div class="py-12 bg-gray-100">
          <div class="mx-auto space-y-8 max-w-7xl sm:px-6 lg:px-8">
    
            <!-- Welcome Section with Animated Gradient Background -->
            <div class="p-6 text-white rounded-lg shadow-lg bg-gradient-to-r from-blue-500 via-green-400 to-purple-500 animate-gradient animate-fade-in">
              <h1 class="text-4xl font-bold animate-slide-in">
                {{ __("Welcome Admin, ") }} {{ Auth::user()->name }}
              </h1>
              <p class="mt-2 text-lg">
                {{ __("This dashboard provides tools to manage users, monitor mother and child health, and oversee appointments effectively.") }}
              </p>
            </div>
    
            <!-- Features Blocks Section (Rows with Two Blocks per Row) -->
            <div class="space-y-8">
              <!-- Row 1: Users Management & Registered Mothers Management -->
              <div class="flex flex-col items-stretch md:flex-row">
                <!-- Block 1: Users Management -->
                <div class="w-full p-6 transition duration-300 transform bg-white rounded-lg shadow-md md:w-1/2 hover:shadow-xl hover:scale-105">
                  <div class="flex items-center">
                    <svg class="w-10 h-10 mr-4 text-indigo-500 hover-bounce" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <h3 class="text-xl font-bold text-gray-800">{{ __("Users Management") }}</h3>
                  </div>
                  <p class="mt-2 text-gray-600">
                    {{ __("View, add, or manage users with administrative access.") }}
                  </p>
                  <button onclick="window.location.href='{{ route('users.index') }}'" class="px-4 py-2 mt-4 text-white transition duration-300 bg-indigo-500 rounded-lg hover:bg-indigo-600">
                    {{ __("Manage Users") }}
                  </button>
                </div>
    
                <!-- Vertical Divider (visible on md and larger screens) -->
                <div class="hidden w-px mx-4 bg-gray-300 md:block"></div>
    
                <!-- Block 2: Registered Mothers Management -->
                <div class="w-full p-6 transition duration-300 transform bg-white rounded-lg shadow-md md:w-1/2 hover:shadow-xl hover:scale-105">
                  <div class="flex items-center">
                    <svg class="w-10 h-10 mr-4 text-green-500 hover-bounce" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6M9 16h6M12 20l9-7-9-7-9 7 9 7z" />
                    </svg>
                    <h3 class="text-xl font-bold text-gray-800">{{ __("Registered Mothers Management") }}</h3>
                  </div>
                  <p class="mt-2 text-gray-600">
                    {{ __("Access and manage information about registered mothers.") }}
                  </p>
                  <button onclick="window.location.href='{{ route('mothersdatas.index') }}'" class="px-4 py-2 mt-4 text-white transition duration-300 bg-green-500 rounded-lg hover:bg-green-600">
                    {{ __("Access Mothers Data") }}
                  </button>
                </div>
              </div>
    
              <!-- Row 2: Appointments Calendar & WhatsApp Messages -->
              <div class="flex flex-col items-stretch md:flex-row">
                <!-- Block 3: Appointments Calendar -->
                <div class="w-full p-6 transition duration-300 transform bg-white rounded-lg shadow-md md:w-1/2 hover:shadow-xl hover:scale-105">
                  <div class="flex items-center">
                    <svg class="w-10 h-10 mr-4 text-blue-500 hover-bounce" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-4 10v8m-5-4h10m2 4H7m6 0v-4m-4 0H7m6-4h5" />
                    </svg>
                    <h3 class="text-xl font-bold text-gray-800">{{ __("Appointments Calendar") }}</h3>
                  </div>
                  <p class="mt-2 text-gray-600">
                    {{ __("Oversee and manage appointments on the calendar.") }}
                  </p>
                  <button onclick="window.location.href='{{ route('fullcalendar') }}'" class="px-4 py-2 mt-4 text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">
                    {{ __("View Calendar") }}
                  </button>
                </div>
    
                <!-- Vertical Divider -->
                <div class="hidden w-px mx-4 bg-gray-300 md:block"></div>
    
                <!-- Block 4: WhatsApp Messages -->
                <div class="w-full p-6 transition duration-300 transform bg-white rounded-lg shadow-md md:w-1/2 hover:shadow-xl hover:scale-105">
                  <div class="flex items-center">
                    <svg class="w-10 h-10 mr-4 text-green-500 hover-bounce" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <h3 class="text-xl font-bold text-gray-800">{{ __("Send WhatsApp Messages") }}</h3>
                  </div>
                  <p class="mt-2 text-gray-600">
                    {{ __("Quickly send WhatsApp messages to users.") }}
                  </p>
                  <button onclick="window.location.href='{{ route('whatsapp.index') }}'" class="px-4 py-2 mt-4 text-white transition duration-300 bg-green-500 rounded-lg hover:bg-green-600">
                    {{ __("Send WhatsApp Messages") }}
                  </button>
                </div>
              </div>
    
              <!-- Row 3: Send Email & Mother's Medical History -->
              <div class="flex flex-col items-stretch md:flex-row">
                <!-- Block 5: Send Email -->
                <div class="w-full p-6 transition duration-300 transform bg-white rounded-lg shadow-md md:w-1/2 hover:shadow-xl hover:scale-105">
                  <div class="flex items-center">
                    <svg class="w-10 h-10 mr-4 text-blue-500 hover-bounce" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m4 0v8m-4-8l-4 4m12-4l4 4" />
                    </svg>
                    <h3 class="text-xl font-bold text-gray-800">{{ __("Send Email") }}</h3>
                  </div>
                  <p class="mt-2 text-gray-600">
                    {{ __("Compose and send emails to users efficiently.") }}
                  </p>
                  <button onclick="window.location.href='{{ route('mail.index') }}'" class="px-4 py-2 mt-4 text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">
                    {{ __("Send Email") }}
                  </button>
                </div>
    
                <!-- Vertical Divider -->
                <div class="hidden w-px mx-4 bg-gray-300 md:block"></div>
    
                <!-- Block 6: Mother's Medical History -->
                <div class="w-full p-6 transition duration-300 transform bg-white rounded-lg shadow-md md:w-1/2 hover:shadow-xl hover:scale-105">
                  <div class="flex items-center">
                    <svg class="w-10 h-10 mr-4 text-green-500 hover-bounce" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l-4-4m0 0l4-4m-4 4h16" />
                    </svg>
                    <h3 class="text-xl font-bold text-gray-800">{{ __("Mother's Medical History") }}</h3>
                  </div>
                  <p class="mt-2 text-gray-600">
                    {{ __("Review and manage comprehensive medical history, checkups, and progress of mothers.") }}
                  </p>
                  <button onclick="window.location.href='{{ route('mother.details.form') }}'" class="px-4 py-2 mt-4 text-white transition duration-300 bg-green-500 rounded-lg hover:bg-green-600">
                    {{ __("View Medical History") }}
                  </button>
                </div>
              </div>
    
              <!-- Row 4: Baby Vaccinations & Access Digital ID -->
              <div class="flex flex-col items-stretch md:flex-row">
                <!-- Block 7: Baby Vaccinations -->
                <div class="w-full p-6 transition duration-300 transform bg-white rounded-lg shadow-md md:w-1/2 hover:shadow-xl hover:scale-105">
                  <div class="flex items-center">
                    <svg class="w-10 h-10 mr-4 text-green-500 hover-bounce" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m4 0v8m-4-8l-4 4m12-4l4 4" />
                    </svg>
                    <h3 class="text-xl font-bold text-gray-800">{{ __("Baby Vaccinations") }}</h3>
                  </div>
                  <p class="mt-2 text-gray-600">
                    {{ __("Track and manage baby vaccination records efficiently.") }}
                  </p>
                  <button onclick="window.location.href='{{ route('baby-vaccinations.index') }}'" class="px-4 py-2 mt-4 text-white transition duration-300 bg-green-500 rounded-lg hover:bg-green-600">
                    {{ __("View Vaccination Records") }}
                  </button>
                </div>
    
                <!-- Vertical Divider -->
                <div class="hidden w-px mx-4 bg-gray-300 md:block"></div>
    
                <!-- Block 8: Access Digital ID -->
                <div class="w-full p-6 transition duration-300 transform bg-white rounded-lg shadow-md md:w-1/2 hover:shadow-xl hover:scale-105">
                  <div class="flex items-center">
                    <svg class="w-10 h-10 mr-4 text-indigo-500 hover-bounce" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6M9 16h6M12 20l9-7-9-7-9 7-9 7z" />
                    </svg>
                    <h3 class="text-xl font-bold text-gray-800">{{ __("Access Digital ID") }}</h3>
                  </div>
                  <p class="mt-2 text-gray-600">
                    {{ __("Enter a Mother ID to view the digital ID details.") }}
                  </p>
                  <form action="{{ route('mother.digitalId') }}" method="GET" class="mt-4">
                    <div class="mb-4">
                      <label for="mother_id" class="block text-sm font-medium text-gray-700">Mother ID</label>
                      <input 
                        type="text" 
                        name="mother_id" 
                        id="mother_id" 
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                        placeholder="Enter Mother ID (e.g., M10002)" 
                        required
                      >
                    </div>
                    <div class="text-center">
                      <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white transition duration-300 bg-indigo-600 border border-transparent rounded-lg shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        Go to Digital ID
                      </button>
                    </div>
                  </form>
                </div>
              </div>
    
              <!-- Row 5: Pregnancy Medical Checkups & Baby Health Checkups -->
              <div class="flex flex-col items-stretch md:flex-row">
                <!-- Block 9: Pregnancy Medical Checkups -->
                <div class="w-full p-6 transition duration-300 transform bg-white rounded-lg shadow-md md:w-1/2 hover:shadow-xl hover:scale-105">
                  <div class="flex items-center">
                    <svg class="w-10 h-10 mr-4 text-yellow-500 hover-bounce" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18m-9 12V4m4.5 4.5L21 3M2.5 19.5L3 3" />
                    </svg>
                    <h3 class="text-xl font-bold text-gray-800">{{ __("Pregnancy Medical Checkups") }}</h3>
                  </div>
                  <p class="mt-2 text-gray-600">
                    {{ __("Manage and schedule pregnancy medical checkups.") }}
                  </p>
                  <button onclick="window.location.href='{{ route('pregnancy-checks.index') }}'" class="px-4 py-2 mt-4 text-white transition duration-300 bg-yellow-500 rounded-lg hover:bg-yellow-600">
                    {{ __("View Checkups") }}
                  </button>
                </div>
    
                <!-- Vertical Divider -->
                <div class="hidden w-px mx-4 bg-gray-300 md:block"></div>
    
                <!-- Block 10: Baby Health Checkups -->
                <div class="w-full p-6 transition duration-300 transform bg-white rounded-lg shadow-md md:w-1/2 hover:shadow-xl hover:scale-105">
                  <div class="flex items-center">
                    <svg class="w-10 h-10 mr-4 text-blue-500 hover-bounce" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    <h3 class="text-xl font-bold text-gray-800">{{ __("Baby Health Checkups") }}</h3>
                  </div>
                  <p class="mt-2 text-gray-600">
                    {{ __("View and manage detailed baby health checkup records easily.") }}
                  </p>
                  <button onclick="window.location.href='{{ route('baby-health-checkups.index') }}'" class="px-4 py-2 mt-4 text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">
                    {{ __("View Checkup Records") }}
                  </button>
                </div>
                
              </div>
            </div>
            <!-- End Features Blocks Section -->
    
           
              <!-- Footer Section -->
              <footer class="pt-8 mt-12 border-t border-gray-200">
                <div class="grid grid-cols-1 gap-8 md:grid-cols-3 lg:grid-cols-4">
                    <!-- About Section -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-bold text-gray-800">{{ __("About Us") }}</h3>
                        <p class="text-gray-600">
                            {{ __("Committed to improving maternal and child health through innovative care solutions.") }}
                        </p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-blue-600 hover:text-blue-800">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                </svg>
                            </a>
                            <a href="#" class="text-blue-600 hover:text-blue-800" aria-label="Facebook">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                  <path d="M22.675 0h-21.35C.599 0 0 .6 0 1.326v21.348C0 23.4.599 24 1.325 24h11.495v-9.294H9.692v-3.622h3.128V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.466.099 2.797.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.762v2.31h3.587l-.467 3.622h-3.12V24h6.116c.727 0 1.325-.6 1.325-1.326V1.326C24 .6 23.402 0 22.675 0z"/>
                                </svg>
                              </a>
                            
                              <!-- LinkedIn Icon -->
                              <a href="#" class="text-blue-600 hover:text-blue-800" aria-label="LinkedIn">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                  <path d="M20.447 20.452h-3.554v-5.569c0-1.327-.027-3.036-1.851-3.036-1.851 0-2.135 1.445-2.135 2.939v5.666H9.356V9h3.414v1.561h.049c.476-.9 1.637-1.851 3.367-1.851 3.598 0 4.266 2.368 4.266 5.455v6.287zM5.337 7.433a2.067 2.067 0 110-4.134 2.067 2.067 0 010 4.134zM6.914 20.452H3.759V9h3.155v11.452zM22.225 0H1.771C.792 0 0 .771 0 1.723v20.554C0 23.229.792 24 1.771 24h20.451C23.207 24 24 23.229 24 22.277V1.723C24 .771 23.207 0 22.225 0z"/>
                                </svg>
                              </a>
                            
                              <!-- YouTube Icon -->
                              <a href="#" class="text-blue-600 hover:text-blue-800" aria-label="YouTube">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                  <path d="M23.498 6.186a2.969 2.969 0 00-2.087-2.102C19.64 3.5 12 3.5 12 3.5s-7.64 0-9.411.584a2.969 2.969 0 00-2.087 2.102A31.77 31.77 0 000 12a31.77 31.77 0 00.502 5.814 2.969 2.969 0 002.087 2.102C4.36 20.5 12 20.5 12 20.5s7.64 0 9.411-.584a2.969 2.969 0 002.087-2.102A31.77 31.77 0 0024 12a31.77 31.77 0 00-.502-5.814zM9.75 15.568V8.432L15.568 12l-5.818 3.568z"/>
                                </svg>
                              </a>
                            <!-- Add more social icons -->
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">{{ __("Quick Links") }}</h3>
                        <ul class="mt-4 space-y-2">
                            <li><a href="{{ route('users.index') }}" class="text-gray-600 hover:text-blue-600">{{ __("User Management") }}</a></li>
                            <li><a href="{{ route('mothersdatas.index') }}" class="text-gray-600 hover:text-blue-600">{{ __("Mothers Data") }}</a></li>
                            <li><a href="{{ route('fullcalendar') }}" class="text-gray-600 hover:text-blue-600">{{ __("Appointments") }}</a></li>
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">{{ __("Contact") }}</h3>
                        <ul class="mt-4 space-y-2">
                            <li class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                +94 772 124 468
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                support@mothercare.lk
                            </li>
                        </ul>
                    </div>

                    <!-- Health Resources -->
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">{{ __("Resources") }}</h3>
                        <ul class="mt-4 space-y-2">
                            <li><a href="#" class="text-gray-600 hover:text-blue-600">{{ __("Pregnancy Guidelines") }}</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-blue-600">{{ __("Vaccination Schedule") }}</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-blue-600">{{ __("Nutrition Advice") }}</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Copyright Notice -->
                <div class="pt-8 mt-8 text-center border-t border-gray-200">
                    <p class="text-sm text-gray-600">
                        © {{ date('Y') }} CraddleSoft. {{ __("All rights reserved.") }}
                    </p>
                    <div class="mt-2">
                        <a href="#" class="text-sm text-gray-600 hover:text-blue-600">{{ __("Privacy Policy") }}</a>
                        <span class="mx-2">|</span>
                        <a href="#" class="text-sm text-gray-600 hover:text-blue-600">{{ __("Terms of Service") }}</a>
                    </div>
                </div>
            </footer>
          </div>
        </div>
      </div>
    </body>
    </html>
    
    
    
    
       @elseif(Auth::user()->hasRole('mohdoctor'))
       <!DOCTYPE html>
       <html lang="en">
       <head>
         <meta charset="UTF-8" />
         <meta name="viewport" content="width=device-width, initial-scale=1.0" />
         <title>MOH Doctor Dashboard</title>
         <!-- Tailwind CSS CDN -->
         <script src="https://cdn.tailwindcss.com"></script>
         <style>
           /* Basic Animations */
           @keyframes fade-in {
             from { opacity: 0; }
             to { opacity: 1; }
           }
           @keyframes slide-in {
             from { transform: translateY(-20px); opacity: 0; }
             to { transform: translateY(0); opacity: 1; }
           }
           .animate-fade-in {
             animation: fade-in 1.5s ease-in-out;
           }
           .animate-slide-in {
             animation: slide-in 1s ease-out;
           }
         </style>
       </head>
       <body class="bg-gray-50">
         @role('mohdoctor')
         <div class="py-12 bg-gray-50">
           <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
             
             <!-- Welcome Section -->
             <div class="mb-8 overflow-hidden bg-white shadow-md sm:rounded-lg">
               <div class="p-6 bg-gradient-to-r from-green-300 via-yellow-200 to-teal-200">
                 <h1 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-green-600 via-blue-500 to-teal-600 animate-slide-in">
                   {{ __("Welcome Doctor, ") }} {{ Auth::user()->name }}
                 </h1>
                 <p class="mt-4 text-lg text-gray-700">
                   {{ __("Welcome to the MOH Doctor's Dashboard. Here you can manage appointments, review patient data, monitor mother and child health, and access clinical resources.") }}
                 </p>
               </div>
             </div>
             
             <!-- Key Features Section (Grouped into Rows with a Vertical Divider) -->
           <div class="space-y-8">
            <!-- Row 1 -->
            <div class="flex flex-col items-center md:flex-row">
              <!-- Feature 1: Appointments Management -->
              <div class="w-full md:w-1/2">
                <div class="p-6 transition transform bg-white rounded-lg shadow-md hover:shadow-xl hover:scale-105">
                  <h3 class="mb-3 text-xl font-semibold text-gray-800">{{ __("Appointments Management") }}</h3>
                  <p class="text-gray-600">
                    {{ __("View, accept, or reschedule appointments directly from your dashboard.") }}
                  </p>
                  <button onclick="window.location.href='{{ route('fullcalendar') }}'" class="inline-block px-4 py-2 mt-4 text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">
                    {{ __("Manage Appointments") }}
                  </button>
                </div>
              </div>
              <!-- Divider -->
              <div class="hidden w-px mx-4 bg-gray-300 md:block"></div>
              <!-- Feature 2: Registered Mothers / Report Generation -->
              <div class="w-full md:w-1/2">
                <div class="p-6 transition transform bg-white rounded-lg shadow-md hover:shadow-xl hover:scale-105">
                  <h3 class="mb-3 text-xl font-semibold text-gray-800">{{ __("Registered Mothers / Report Generation") }}</h3>
                  <p class="text-gray-600">
                    {{ __("Access and manage details of registered mothers and generate reports in PDF format.") }}
                  </p>
                  <button onclick="window.location.href='{{ route('mothersdatas.index') }}'" class="inline-block px-4 py-2 mt-4 text-white transition duration-300 bg-green-500 rounded-lg hover:bg-green-600">
                    {{ __("Generate Report") }}
                  </button>
                </div>
              </div>
            </div>
            
            <!-- Row 2 -->
            <div class="flex flex-col items-center md:flex-row">
              <!-- Feature 3: Educational Resources -->
              <div class="w-full md:w-1/2">
                <div class="p-6 transition transform bg-white rounded-lg shadow-md hover:shadow-xl hover:scale-105">
                  <h3 class="mb-3 text-xl font-semibold text-gray-800">{{ __("Educational Resources") }}</h3>
                  <p class="text-gray-600">
                    {{ __("Access the latest guidelines, articles, and training materials for midwifery practice.") }}
                  </p>
                  <button onclick="window.location.href='https://internationalmidwives.org/resources/category/midwifery-practice/'" class="inline-block px-4 py-2 mt-4 text-white transition duration-300 bg-yellow-500 rounded-lg hover:bg-yellow-600">
                    {{ __("Browse Resources") }}
                  </button>
                </div>
              </div>
              <!-- Divider -->
              <div class="hidden w-px mx-4 bg-gray-300 md:block"></div>
              <!-- Feature 4: Current Pregnant Mothers -->
              <div class="w-full md:w-1/2">
                <div class="p-6 transition transform bg-white rounded-lg shadow-md hover:shadow-xl hover:scale-105">
                  <h3 class="mb-3 text-xl font-semibold text-gray-800">{{ __("Current Pregnant Mothers") }}</h3>
                  <p class="text-gray-600">
                    {{ __("View and manage details of current pregnant mothers, including care, appointments, and health progress.") }}
                  </p>
                  <button onclick="window.location.href='{{ route('patients.index') }}'" class="inline-block px-4 py-2 mt-4 text-white transition duration-300 bg-purple-500 rounded-lg hover:bg-purple-600">
                    {{ __("Manage Mothers") }}
                  </button>
                </div>
              </div>
            </div>
            
            <!-- Row 3 -->
            <div class="flex flex-col items-center md:flex-row">
              <!-- Feature 5: Pregnancy Medical Checkups -->
              <div class="w-full md:w-1/2">
                <div class="p-6 transition transform bg-white rounded-lg shadow-md hover:shadow-xl hover:scale-105">
                  <h3 class="mb-3 text-xl font-semibold text-gray-800">{{ __("Pregnancy Medical Checkups") }}</h3>
                  <p class="text-gray-600">
                    {{ __("Monitor and manage all stages of pregnancy health checkups, including 3-, 6-, and 9-month intervals.") }}
                  </p>
                  <button onclick="window.location.href='{{ route('pregnancy-checks.index') }}'" class="inline-block px-4 py-2 mt-4 text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">
                    {{ __("View Checkups") }}
                  </button>
                </div>
              </div>
              <!-- Divider -->
              <div class="hidden w-px mx-4 bg-gray-300 md:block"></div>
              <!-- Feature 6: Send WhatsApp Messages -->
              <div class="w-full md:w-1/2">
                <div class="p-6 transition transform bg-white rounded-lg shadow-md hover:shadow-xl hover:scale-105">
                  <h3 class="mb-3 text-xl font-semibold text-gray-800">{{ __("Send WhatsApp Messages") }}</h3>
                  <p class="text-gray-600">
                    {{ __("Quickly send WhatsApp messages to users for efficient communication.") }}
                  </p>
                  <button onclick="window.location.href='{{ route('whatsapp.index') }}'" class="inline-block px-4 py-2 mt-4 text-white transition duration-300 bg-green-500 rounded-lg hover:bg-green-600">
                    {{ __("Send Messages") }}
                  </button>
                </div>
              </div>
            </div>
            
            <!-- Row 4 -->
            <div class="flex flex-col items-center md:flex-row">
              <!-- Feature 7: Baby Health Checkups -->
              <div class="w-full md:w-1/2">
                <div class="p-6 transition transform bg-white rounded-lg shadow-md hover:shadow-xl hover:scale-105">
                  <h3 class="mb-3 text-xl font-semibold text-gray-800">{{ __("Baby Health Checkups") }}</h3>
                  <p class="text-gray-600">
                    {{ __("View and manage baby health checkups efficiently.") }}
                  </p>
                  <button onclick="window.location.href='{{ route('baby-health-checkups.index') }}'" class="inline-block px-4 py-2 mt-4 text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">
                    {{ __("View Checkups") }}
                  </button>
                </div>
              </div>
              <!-- Divider -->
              <div class="hidden w-px mx-4 bg-gray-300 md:block"></div>
              <!-- Feature 8: Baby Vaccinations -->
              <div class="w-full md:w-1/2">
                <div class="p-6 transition transform bg-white rounded-lg shadow-md hover:shadow-xl hover:scale-105">
                  <h3 class="mb-3 text-xl font-semibold text-gray-800">{{ __("Baby Vaccinations") }}</h3>
                  <p class="text-gray-600">
                    {{ __("View and manage baby vaccination records efficiently.") }}
                  </p>
                  <button onclick="window.location.href='{{ route('baby-vaccinations.index') }}'" class="inline-block px-4 py-2 mt-4 text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">
                    {{ __("View Vaccinations") }}
                  </button>
                </div>
              </div>
            </div>
            
            <!-- Row 5 -->
            <div class="flex flex-col items-center md:flex-row">
              <!-- Feature 9: Send Email -->
              <div class="w-full md:w-1/2">
                <div class="p-6 transition transform bg-white rounded-lg shadow-md hover:shadow-xl hover:scale-105">
                  <h3 class="mb-3 text-xl font-semibold text-gray-800">{{ __("Send Email") }}</h3>
                  <p class="text-gray-600">
                    {{ __("Compose and send emails to users efficiently.") }}
                  </p>
                  <button onclick="window.location.href='{{ route('mail.index') }}'" class="inline-block px-4 py-2 mt-4 text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">
                    {{ __("Send Email") }}
                  </button>
                </div>
              </div>
              <!-- Divider -->
              <div class="hidden w-px mx-4 bg-gray-300 md:block"></div>
              <!-- Feature 10: Mother's Medical History -->
              <div class="w-full md:w-1/2">
                <div class="p-6 transition transform bg-white rounded-lg shadow-md hover:shadow-xl hover:scale-105">
                  <h3 class="mb-3 text-xl font-semibold text-gray-800">{{ __("Mother's Medical History") }}</h3>
                  <p class="text-gray-600">
                    {{ __("Access and review detailed medical history, health checkups, and progress of mothers.") }}
                  </p>
                  <button onclick="window.location.href='{{ route('mother.details.form') }}'" class="inline-block px-4 py-2 mt-4 text-white transition duration-300 bg-purple-500 rounded-lg hover:bg-purple-600">
                    {{ __("View Medical History") }}
                  </button>
                </div>
              </div>
            </div>
          </div>
          
          
             <!-- Footer Section -->
             <footer class="pt-8 mt-12 border-t border-gray-200">
               <div class="grid grid-cols-1 gap-8 md:grid-cols-3 lg:grid-cols-4">
                   <!-- About Section -->
                   <div class="space-y-4">
                       <h3 class="text-lg font-bold text-gray-800">{{ __("About Us") }}</h3>
                       <p class="text-gray-600">
                           {{ __("Committed to improving maternal and child health through innovative care solutions.") }}
                       </p>
                       <div class="flex space-x-4">
                           <a href="#" class="text-blue-600 hover:text-blue-800">
                               <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                   <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                               </svg>
                           </a>
                           <a href="#" class="text-blue-600 hover:text-blue-800" aria-label="Facebook">
                               <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                 <path d="M22.675 0h-21.35C.599 0 0 .6 0 1.326v21.348C0 23.4.599 24 1.325 24h11.495v-9.294H9.692v-3.622h3.128V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.466.099 2.797.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.762v2.31h3.587l-.467 3.622h-3.12V24h6.116c.727 0 1.325-.6 1.325-1.326V1.326C24 .6 23.402 0 22.675 0z"/>
                               </svg>
                             </a>
                           
                             <!-- LinkedIn Icon -->
                             <a href="#" class="text-blue-600 hover:text-blue-800" aria-label="LinkedIn">
                               <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                 <path d="M20.447 20.452h-3.554v-5.569c0-1.327-.027-3.036-1.851-3.036-1.851 0-2.135 1.445-2.135 2.939v5.666H9.356V9h3.414v1.561h.049c.476-.9 1.637-1.851 3.367-1.851 3.598 0 4.266 2.368 4.266 5.455v6.287zM5.337 7.433a2.067 2.067 0 110-4.134 2.067 2.067 0 010 4.134zM6.914 20.452H3.759V9h3.155v11.452zM22.225 0H1.771C.792 0 0 .771 0 1.723v20.554C0 23.229.792 24 1.771 24h20.451C23.207 24 24 23.229 24 22.277V1.723C24 .771 23.207 0 22.225 0z"/>
                               </svg>
                             </a>
                           
                             <!-- YouTube Icon -->
                             <a href="#" class="text-blue-600 hover:text-blue-800" aria-label="YouTube">
                               <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                 <path d="M23.498 6.186a2.969 2.969 0 00-2.087-2.102C19.64 3.5 12 3.5 12 3.5s-7.64 0-9.411.584a2.969 2.969 0 00-2.087 2.102A31.77 31.77 0 000 12a31.77 31.77 0 00.502 5.814 2.969 2.969 0 002.087 2.102C4.36 20.5 12 20.5 12 20.5s7.64 0 9.411-.584a2.969 2.969 0 002.087-2.102A31.77 31.77 0 0024 12a31.77 31.77 0 00-.502-5.814zM9.75 15.568V8.432L15.568 12l-5.818 3.568z"/>
                               </svg>
                             </a>
                           <!-- Add more social icons -->
                       </div>
                   </div>

                   <!-- Quick Links -->
                   <div>
                       <h3 class="text-lg font-bold text-gray-800">{{ __("Quick Links") }}</h3>
                       <ul class="mt-4 space-y-2">
                           <li><a href="{{ route('users.index') }}" class="text-gray-600 hover:text-blue-600">{{ __("User Management") }}</a></li>
                           <li><a href="{{ route('mothersdatas.index') }}" class="text-gray-600 hover:text-blue-600">{{ __("Mothers Data") }}</a></li>
                           <li><a href="{{ route('fullcalendar') }}" class="text-gray-600 hover:text-blue-600">{{ __("Appointments") }}</a></li>
                       </ul>
                   </div>

                   <!-- Contact Info -->
                   <div>
                       <h3 class="text-lg font-bold text-gray-800">{{ __("Contact") }}</h3>
                       <ul class="mt-4 space-y-2">
                           <li class="flex items-center text-gray-600">
                               <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                               </svg>
                               +94 772 124 468
                           </li>
                           <li class="flex items-center text-gray-600">
                               <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                               </svg>
                               support@mothercare.lk
                           </li>
                       </ul>
                   </div>

                   <!-- Health Resources -->
                   <div>
                       <h3 class="text-lg font-bold text-gray-800">{{ __("Resources") }}</h3>
                       <ul class="mt-4 space-y-2">
                           <li><a href="#" class="text-gray-600 hover:text-blue-600">{{ __("Pregnancy Guidelines") }}</a></li>
                           <li><a href="#" class="text-gray-600 hover:text-blue-600">{{ __("Vaccination Schedule") }}</a></li>
                           <li><a href="#" class="text-gray-600 hover:text-blue-600">{{ __("Nutrition Advice") }}</a></li>
                       </ul>
                   </div>
               </div>

               <!-- Copyright Notice -->
               <div class="pt-8 mt-8 text-center border-t border-gray-200">
                   <p class="text-sm text-gray-600">
                       © {{ date('Y') }} CraddleSoft. {{ __("All rights reserved.") }}
                   </p>
                   <div class="mt-2">
                       <a href="#" class="text-sm text-gray-600 hover:text-blue-600">{{ __("Privacy Policy") }}</a>
                       <span class="mx-2">|</span>
                       <a href="#" class="text-sm text-gray-600 hover:text-blue-600">{{ __("Terms of Service") }}</a>
                   </div>
               </div>
           </footer>
           </div>
         </div>
         @endrole
       </body>
       </html>
       
    

     @elseif(Auth::user()->hasRole('midwives'))
     <!DOCTYPE html>
     <html lang="en">
     <head>
       <meta charset="UTF-8" />
       <meta name="viewport" content="width=device-width, initial-scale=1.0" />
       <title>Midwives Dashboard</title>
       <!-- Tailwind CSS CDN -->
       <script src="https://cdn.tailwindcss.com"></script>
       <style>
         /* Basic Animations */
         @keyframes fade-in {
           from { opacity: 0; }
           to { opacity: 1; }
         }
         @keyframes slide-in {
           from { transform: translateY(-20px); opacity: 0; }
           to { transform: translateY(0); opacity: 1; }
         }
         .animate-fade-in {
           animation: fade-in 1.5s ease-in-out;
         }
         .animate-slide-in {
           animation: slide-in 1s ease-out;
         }
       </style>
     </head>
     <body class="bg-gray-50">
       @role('midwives')
       <div class="py-12 bg-gray-50">
         <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
           
         <!-- Welcome Section -->
<div class="mb-8 overflow-hidden bg-white shadow-md sm:rounded-lg">
  <div class="p-6 bg-gradient-to-r from-pink-200 via-yellow-200 to-teal-200">
    <h1 class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-pink-600 via-yellow-500 to-teal-600 animate-slide-in">
      {{ __("Welcome midwife, ") }} {{ Auth::user()->name }}
    </h1>
    <p class="mt-4 text-lg text-gray-700">
      {{ __("Welcome to the Midwives Dashboard. This section offers tools to manage appointments, monitor mother and child health, and access valuable resources for improved care.") }}
    </p>
  </div>
</div>

<!-- Schedule Management Section (New) -->
<div class="mb-8">
  <!-- Row 6 - Schedule Management -->
  <div class="flex flex-col items-center md:flex-row">
    <!-- Feature 11: Schedule Management -->
    <div class="w-full md:w-1/2">
      <div class="p-6 transition transform bg-white rounded-lg shadow-md hover:shadow-xl hover:scale-105">
        <h3 class="mb-3 text-xl font-semibold text-gray-800">{{ __("Schedule Management") }}</h3>
        <p class="text-gray-600">
          {{ __("Manage your availability, set working hours, and organize your schedule efficiently.") }}
        </p>
        <div class="flex flex-wrap gap-2 mt-4">
          <button onclick="window.location.href='{{ route('schedules.index') }}'" class="inline-block px-4 py-2 text-white transition duration-300 bg-indigo-500 rounded-lg hover:bg-indigo-600">
            {{ __("View Schedule") }}
          </button>
          <button onclick="window.location.href='{{ route('schedules.create') }}'" class="inline-block px-4 py-2 text-white transition duration-300 bg-green-500 rounded-lg hover:bg-green-600">
            {{ __("Create Schedule") }}
          </button>
        </div>
      </div>
    </div>
    <!-- Divider -->
    <div class="hidden w-px mx-4 bg-gray-300 md:block"></div>
    <!-- Feature 12: Schedule Overview -->
    <div class="w-full md:w-1/2">
      <div class="p-6 transition transform bg-white rounded-lg shadow-md hover:shadow-xl hover:scale-105">
        <h3 class="mb-3 text-xl font-semibold text-gray-800">{{ __("Schedule Overview") }}</h3>
        <p class="text-gray-600">
          {{ __("Get a quick overview of your upcoming appointments and scheduled tasks.") }}
        </p>
        <div class="p-4 mt-4 rounded-lg bg-gray-50">
          <h4 class="mb-2 text-sm font-medium text-gray-700">{{ __("Quick Actions:") }}</h4>
          <div class="space-y-2">
            <a href="{{ route('schedules.index') }}" class="block p-2 text-sm text-gray-600 transition duration-300 rounded-md hover:bg-gray-100">
              📅 {{ __("View Today's Schedule") }}
            </a>
            <a href="{{ route('schedules.create') }}" class="block p-2 text-sm text-gray-600 transition duration-300 rounded-md hover:bg-gray-100">
              ➕ {{ __("Add New Time Slot") }}
            </a>
            <a href="#" class="block p-2 text-sm text-gray-600 transition duration-300 rounded-md hover:bg-gray-100">
              🔄 {{ __("Update Availability") }}
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Midwives Data Management Section -->
<div class="mb-8">
  <div class="flex flex-col items-center md:flex-row">
    <!-- Feature: Midwives Data Overview -->
    <div class="w-full md:w-1/2">
      <div class="p-6 transition transform bg-white rounded-lg shadow-md hover:shadow-xl hover:scale-105">
        <h3 class="mb-3 text-xl font-semibold text-gray-800">{{ __("Midwives Data Overview") }}</h3>
        <p class="text-gray-600">
          {{ __("Access and manage your personal records, certifications, and performance metrics.") }}
        </p>
        <div class="flex flex-wrap gap-2 mt-4">
          <button onclick="window.location.href='{{ route('midwives.index') }}'" class="inline-block px-4 py-2 text-white transition duration-300 bg-purple-500 rounded-lg hover:bg-purple-600">
            {{ __("View Profile") }}
          </button>
          <button onclick="window.location.href='{{ route('midwives.index') }}'" class="inline-block px-4 py-2 text-white transition duration-300 bg-pink-500 rounded-lg hover:bg-pink-600">
            {{ __("Update Certifications") }}
          </button>
        </div>
      </div>
    </div>
    <!-- Divider -->
    <div class="hidden w-px mx-4 bg-gray-300 md:block"></div>
    <!-- Feature: Performance Analytics -->
    <div class="w-full md:w-1/2">
      <div class="p-6 transition transform bg-white rounded-lg shadow-md hover:shadow-xl hover:scale-105">
        <h3 class="mb-3 text-xl font-semibold text-gray-800">{{ __("Performance Analytics") }}</h3>
        <p class="text-gray-600">
          {{ __("Track your performance metrics and patient satisfaction ratings.") }}
        </p>
        <div class="p-4 mt-4 rounded-lg bg-gray-50">
          <h4 class="mb-2 text-sm font-medium text-gray-700">{{ __("Quick Stats:") }}</h4>
          <div class="space-y-2">
            <a href="{{ route('midwives.index') }}" class="block p-2 text-sm text-gray-600 transition duration-300 rounded-md hover:bg-gray-100">
              📊 {{ __("Monthly Performance") }}
            </a>
            <a href="{{ route('midwives.index') }}" class="block p-2 text-sm text-gray-600 transition duration-300 rounded-md hover:bg-gray-100">
              ⭐ {{ __("Patient Feedback") }}
            </a>
            <a href="{{ route('midwives.index') }}" class="block p-2 text-sm text-gray-600 transition duration-300 rounded-md hover:bg-gray-100">
              📈 {{ __("Growth Statistics") }}
            </a>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>


           
           
           <!-- Key Features Section (Grouped into Rows with a Vertical Divider) -->
           <div class="space-y-8">
             <!-- Row 1 -->
             <div class="flex flex-col items-center md:flex-row">
               <!-- Feature 1: Appointments Management -->
               <div class="w-full md:w-1/2">
                 <div class="p-6 transition transform bg-white rounded-lg shadow-md hover:shadow-xl hover:scale-105">
                   <h3 class="mb-3 text-xl font-semibold text-gray-800">{{ __("Appointments Management") }}</h3>
                   <p class="text-gray-600">
                     {{ __("View, accept, or reschedule appointments directly from your dashboard.") }}
                   </p>
                   <button onclick="window.location.href='{{ route('fullcalendar') }}'" class="inline-block px-4 py-2 mt-4 text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">
                     {{ __("Manage Appointments") }}
                   </button>
                 </div>
               </div>
               <!-- Divider -->
               <div class="hidden w-px mx-4 bg-gray-300 md:block"></div>
               <!-- Feature 2: Registered Mothers / Report Generation -->
               <div class="w-full md:w-1/2">
                 <div class="p-6 transition transform bg-white rounded-lg shadow-md hover:shadow-xl hover:scale-105">
                   <h3 class="mb-3 text-xl font-semibold text-gray-800">{{ __("Registered Mothers / Report Generation") }}</h3>
                   <p class="text-gray-600">
                     {{ __("Access and manage details of registered mothers and generate reports in PDF format.") }}
                   </p>
                   <button onclick="window.location.href='{{ route('mothersdatas.index') }}'" class="inline-block px-4 py-2 mt-4 text-white transition duration-300 bg-green-500 rounded-lg hover:bg-green-600">
                     {{ __("Generate Report") }}
                   </button>
                 </div>
               </div>
             </div>
             
             <!-- Row 2 -->
             <div class="flex flex-col items-center md:flex-row">
               <!-- Feature 3: Educational Resources -->
               <div class="w-full md:w-1/2">
                 <div class="p-6 transition transform bg-white rounded-lg shadow-md hover:shadow-xl hover:scale-105">
                   <h3 class="mb-3 text-xl font-semibold text-gray-800">{{ __("Educational Resources") }}</h3>
                   <p class="text-gray-600">
                     {{ __("Access the latest guidelines, articles, and training materials for midwifery practice.") }}
                   </p>
                   <button onclick="window.location.href='https://internationalmidwives.org/resources/category/midwifery-practice/'" class="inline-block px-4 py-2 mt-4 text-white transition duration-300 bg-yellow-500 rounded-lg hover:bg-yellow-600">
                     {{ __("Browse Resources") }}
                   </button>
                 </div>
               </div>
               <!-- Divider -->
               <div class="hidden w-px mx-4 bg-gray-300 md:block"></div>
               <!-- Feature 4: Current Pregnant Mothers -->
               <div class="w-full md:w-1/2">
                 <div class="p-6 transition transform bg-white rounded-lg shadow-md hover:shadow-xl hover:scale-105">
                   <h3 class="mb-3 text-xl font-semibold text-gray-800">{{ __("Current Pregnant Mothers") }}</h3>
                   <p class="text-gray-600">
                     {{ __("View and manage details of current pregnant mothers, including care, appointments, and health progress.") }}
                   </p>
                   <button onclick="window.location.href='{{ route('patients.index') }}'" class="inline-block px-4 py-2 mt-4 text-white transition duration-300 bg-purple-500 rounded-lg hover:bg-purple-600">
                     {{ __("Manage Mothers") }}
                   </button>
                 </div>
               </div>
             </div>
             
             <!-- Row 3 -->
             <div class="flex flex-col items-center md:flex-row">
               <!-- Feature 5: Pregnancy Medical Checkups -->
               <div class="w-full md:w-1/2">
                 <div class="p-6 transition transform bg-white rounded-lg shadow-md hover:shadow-xl hover:scale-105">
                   <h3 class="mb-3 text-xl font-semibold text-gray-800">{{ __("Pregnancy Medical Checkups") }}</h3>
                   <p class="text-gray-600">
                     {{ __("Monitor and manage all stages of pregnancy health checkups, including 3-, 6-, and 9-month intervals.") }}
                   </p>
                   <button onclick="window.location.href='{{ route('pregnancy-checks.index') }}'" class="inline-block px-4 py-2 mt-4 text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">
                     {{ __("View Checkups") }}
                   </button>
                 </div>
               </div>
               <!-- Divider -->
               <div class="hidden w-px mx-4 bg-gray-300 md:block"></div>
               <!-- Feature 6: Send WhatsApp Messages -->
               <div class="w-full md:w-1/2">
                 <div class="p-6 transition transform bg-white rounded-lg shadow-md hover:shadow-xl hover:scale-105">
                   <h3 class="mb-3 text-xl font-semibold text-gray-800">{{ __("Send WhatsApp Messages") }}</h3>
                   <p class="text-gray-600">
                     {{ __("Quickly send WhatsApp messages to users for efficient communication.") }}
                   </p>
                   <button onclick="window.location.href='{{ route('whatsapp.index') }}'" class="inline-block px-4 py-2 mt-4 text-white transition duration-300 bg-green-500 rounded-lg hover:bg-green-600">
                     {{ __("Send Messages") }}
                   </button>
                 </div>
               </div>
             </div>
             
             <!-- Row 4 -->
             <div class="flex flex-col items-center md:flex-row">
               <!-- Feature 7: Baby Health Checkups -->
               <div class="w-full md:w-1/2">
                 <div class="p-6 transition transform bg-white rounded-lg shadow-md hover:shadow-xl hover:scale-105">
                   <h3 class="mb-3 text-xl font-semibold text-gray-800">{{ __("Baby Health Checkups") }}</h3>
                   <p class="text-gray-600">
                     {{ __("View and manage baby health checkups efficiently.") }}
                   </p>
                   <button onclick="window.location.href='{{ route('baby-health-checkups.index') }}'" class="inline-block px-4 py-2 mt-4 text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">
                     {{ __("View Checkups") }}
                   </button>
                 </div>
               </div>
               <!-- Divider -->
               <div class="hidden w-px mx-4 bg-gray-300 md:block"></div>
               <!-- Feature 8: Baby Vaccinations -->
               <div class="w-full md:w-1/2">
                 <div class="p-6 transition transform bg-white rounded-lg shadow-md hover:shadow-xl hover:scale-105">
                   <h3 class="mb-3 text-xl font-semibold text-gray-800">{{ __("Baby Vaccinations") }}</h3>
                   <p class="text-gray-600">
                     {{ __("View and manage baby vaccination records efficiently.") }}
                   </p>
                   <button onclick="window.location.href='{{ route('baby-vaccinations.index') }}'" class="inline-block px-4 py-2 mt-4 text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">
                     {{ __("View Vaccinations") }}
                   </button>
                 </div>
               </div>
             </div>
             
             <!-- Row 5 -->
             <div class="flex flex-col items-center md:flex-row">
               <!-- Feature 9: Send Email -->
               <div class="w-full md:w-1/2">
                 <div class="p-6 transition transform bg-white rounded-lg shadow-md hover:shadow-xl hover:scale-105">
                   <h3 class="mb-3 text-xl font-semibold text-gray-800">{{ __("Send Email") }}</h3>
                   <p class="text-gray-600">
                     {{ __("Compose and send emails to users efficiently.") }}
                   </p>
                   <button onclick="window.location.href='{{ route('mail.index') }}'" class="inline-block px-4 py-2 mt-4 text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">
                     {{ __("Send Email") }}
                   </button>
                 </div>
               </div>
               <!-- Divider -->
               <div class="hidden w-px mx-4 bg-gray-300 md:block"></div>
               <!-- Feature 10: Mother's Medical History -->
               <div class="w-full md:w-1/2">
                 <div class="p-6 transition transform bg-white rounded-lg shadow-md hover:shadow-xl hover:scale-105">
                   <h3 class="mb-3 text-xl font-semibold text-gray-800">{{ __("Mother's Medical History") }}</h3>
                   <p class="text-gray-600">
                     {{ __("Access and review detailed medical history, health checkups, and progress of mothers.") }}
                   </p>
                   <button onclick="window.location.href='{{ route('mother.details.form') }}'" class="inline-block px-4 py-2 mt-4 text-white transition duration-300 bg-purple-500 rounded-lg hover:bg-purple-600">
                     {{ __("View Medical History") }}
                   </button>
                 </div>
               </div>
             </div>
           </div>
           
           
              <!-- Footer Section -->
              <footer class="pt-8 mt-12 border-t border-gray-200">
                <div class="grid grid-cols-1 gap-8 md:grid-cols-3 lg:grid-cols-4">
                    <!-- About Section -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-bold text-gray-800">{{ __("About Us") }}</h3>
                        <p class="text-gray-600">
                            {{ __("Committed to improving maternal and child health through innovative care solutions.") }}
                        </p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-blue-600 hover:text-blue-800">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                </svg>
                            </a>
                            <a href="#" class="text-blue-600 hover:text-blue-800" aria-label="Facebook">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                  <path d="M22.675 0h-21.35C.599 0 0 .6 0 1.326v21.348C0 23.4.599 24 1.325 24h11.495v-9.294H9.692v-3.622h3.128V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.466.099 2.797.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.762v2.31h3.587l-.467 3.622h-3.12V24h6.116c.727 0 1.325-.6 1.325-1.326V1.326C24 .6 23.402 0 22.675 0z"/>
                                </svg>
                              </a>
                            
                              <!-- LinkedIn Icon -->
                              <a href="#" class="text-blue-600 hover:text-blue-800" aria-label="LinkedIn">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                  <path d="M20.447 20.452h-3.554v-5.569c0-1.327-.027-3.036-1.851-3.036-1.851 0-2.135 1.445-2.135 2.939v5.666H9.356V9h3.414v1.561h.049c.476-.9 1.637-1.851 3.367-1.851 3.598 0 4.266 2.368 4.266 5.455v6.287zM5.337 7.433a2.067 2.067 0 110-4.134 2.067 2.067 0 010 4.134zM6.914 20.452H3.759V9h3.155v11.452zM22.225 0H1.771C.792 0 0 .771 0 1.723v20.554C0 23.229.792 24 1.771 24h20.451C23.207 24 24 23.229 24 22.277V1.723C24 .771 23.207 0 22.225 0z"/>
                                </svg>
                              </a>
                            
                              <!-- YouTube Icon -->
                              <a href="#" class="text-blue-600 hover:text-blue-800" aria-label="YouTube">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                  <path d="M23.498 6.186a2.969 2.969 0 00-2.087-2.102C19.64 3.5 12 3.5 12 3.5s-7.64 0-9.411.584a2.969 2.969 0 00-2.087 2.102A31.77 31.77 0 000 12a31.77 31.77 0 00.502 5.814 2.969 2.969 0 002.087 2.102C4.36 20.5 12 20.5 12 20.5s7.64 0 9.411-.584a2.969 2.969 0 002.087-2.102A31.77 31.77 0 0024 12a31.77 31.77 0 00-.502-5.814zM9.75 15.568V8.432L15.568 12l-5.818 3.568z"/>
                                </svg>
                              </a>
                            <!-- Add more social icons -->
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">{{ __("Quick Links") }}</h3>
                        <ul class="mt-4 space-y-2">
                            <li><a href="{{ route('users.index') }}" class="text-gray-600 hover:text-blue-600">{{ __("User Management") }}</a></li>
                            <li><a href="{{ route('mothersdatas.index') }}" class="text-gray-600 hover:text-blue-600">{{ __("Mothers Data") }}</a></li>
                            <li><a href="{{ route('fullcalendar') }}" class="text-gray-600 hover:text-blue-600">{{ __("Appointments") }}</a></li>
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">{{ __("Contact") }}</h3>
                        <ul class="mt-4 space-y-2">
                            <li class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                +94 772 124 468
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                support@mothercare.lk
                            </li>
                        </ul>
                    </div>

                    <!-- Health Resources -->
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">{{ __("Resources") }}</h3>
                        <ul class="mt-4 space-y-2">
                            <li><a href="#" class="text-gray-600 hover:text-blue-600">{{ __("Pregnancy Guidelines") }}</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-blue-600">{{ __("Vaccination Schedule") }}</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-blue-600">{{ __("Nutrition Advice") }}</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Copyright Notice -->
                <div class="pt-8 mt-8 text-center border-t border-gray-200">
                    <p class="text-sm text-gray-600">
                        © {{ date('Y') }} CraddleSoft. {{ __("All rights reserved.") }}
                    </p>
                    <div class="mt-2">
                        <a href="#" class="text-sm text-gray-600 hover:text-blue-600">{{ __("Privacy Policy") }}</a>
                        <span class="mx-2">|</span>
                        <a href="#" class="text-sm text-gray-600 hover:text-blue-600">{{ __("Terms of Service") }}</a>
                    </div>
                </div>
            </footer>
         </div>
       </div>
       @endrole
     </body>
     </html>
     


@else
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mother Panel - Pregnancy Timeline</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Animations */
    @keyframes fade-in {
      from { opacity: 0; }
      to { opacity: 1; }
    }
    @keyframes slide-in {
      from { transform: translateY(-20px); opacity: 0; }
      to { transform: translateY(0); opacity: 1; }
    }
    @keyframes bounce {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-5px); }
    }
    .animate-fade-in { animation: fade-in 1.5s ease-in-out; }
    .animate-slide-in { animation: slide-in 1s ease-out; }
    .hover-bounce:hover { animation: bounce 1s; }

    /* Vertical timeline line */
    .timeline-line {
      position: absolute;
      left: 50%;
      width: 4px;
      background: #e2e8f0; /* gray-200 */
      transform: translateX(-50%);
      top: 0;
      bottom: 0;
    }
  </style>
</head>
<body class="bg-white">
  @role('mother')
  <div class="py-12 bg-white">
    <div class="px-6 mx-auto max-w-7xl sm:px-8">

      <!-- Welcome Dashboard -->
      <div class="w-full overflow-hidden bg-white shadow-md sm:rounded-xl">
        <div class="relative p-10 transition-all transform border border-gray-100 rounded-lg hover:scale-105 bg-gradient-to-r from-pink-600 to-sky-500">
          <!-- Light white overlay so the gradient shows through softly -->
        
          <div class="relative z-10 text-center">
            <!-- Gradient text for the heading -->
            <h1 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-yellow-500 to-pink-200 animate-slide-in">
              {{ __("Welcome, Pregnancy Mother, ") }} {{ Auth::user()->name }}
            </h1>
            <!-- Supporting paragraph with a light shade -->
            <p class="mt-4 text-lg text-gray-100">
              {{ __("We are here to support you through every stage of your pregnancy journey.") }}
            </p>
            @if(Auth::user()->motherData)
            <p class="mt-4 text-lg animate-fade-in">
                <span class="font-bold text-yellow-500">{{ __("Mother ID: ") }}</span>
                <span class="font-bold text-red-700">{{ Auth::user()->motherData->id }}</span>
              </p>
              
            @else
              <p class="mt-4 text-lg text-teal-100 animate-fade-in">
                {{ __("Your Mother ID is not assigned yet. Please register to receive your ID.") }}
              </p>
            @endif
          </div>
        </div>
      </div>
      

      <!-- Features Section -->
      <div class="grid grid-cols-1 gap-6 px-6 mt-12 md:grid-cols-3">
        <!-- Digital ID Access -->
        <div class="p-6 transition-all transform bg-white rounded-lg shadow-md hover:shadow-lg hover:scale-105">
          <div class="flex items-center space-x-4">
            <svg class="w-12 h-12 text-indigo-500 hover-bounce" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6M9 16h6M12 20l9-7-9-7-9 7-9 7z" />
            </svg>
            <h3 class="text-xl font-semibold text-gray-800">{{ __("Access Digital ID") }}</h3>
          </div>
          <p class="mt-2 text-base text-gray-600">
            {{ __("Enter a Mother ID to view your digital ID details.") }}
            <span class="text-red-500"> {{ __("Please update your profile picture before proceeding.") }}</span>
          </p>
          
          <form action="{{ route('mother.digitalId') }}" method="GET" class="mt-4">
            <div class="mb-4">
              <label for="mother_id" class="block text-sm font-medium text-gray-700">Mother ID</label>
              <input type="text" name="mother_id" id="mother_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-teal-500 focus:ring-teal-500 sm:text-sm" placeholder="e.g., M10002" required>
            </div>
            <div class="text-center">
              <button type="submit" class="inline-flex justify-center px-6 py-3 text-sm font-medium text-white transition duration-300 bg-teal-600 border border-transparent rounded-lg shadow-sm hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500">
                {{ __("Go to Digital ID") }}
              </button>
            </div>
          </form>
        </div>
        <!-- Baby Vaccinations -->
        <div class="p-6 transition-all transform bg-white rounded-lg shadow-md hover:shadow-lg hover:scale-105">
          <div class="flex items-center space-x-4">
            <svg class="w-12 h-12 text-green-500 hover-bounce" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m4 0v8m-4-8l-4 4m12-4l4 4" />
            </svg>
            <h3 class="text-xl font-semibold text-gray-800">{{ __("Baby Vaccinations") }}</h3>
          </div>
          <p class="mt-2 text-base text-gray-600">
            {{ __("Track and manage baby vaccination records efficiently.") }}
          </p>
          <button onclick="window.location.href='{{ route('baby-vaccinations.index') }}'" class="px-6 py-3 mt-4 text-white transition duration-300 bg-green-500 rounded-lg hover:bg-green-600">
            {{ __("View Vaccination Records") }}
          </button>
        </div>
        <!-- Baby Health Checkups -->
        <div class="p-6 transition-all transform bg-white rounded-lg shadow-md hover:shadow-lg hover:scale-105">
          <div class="flex items-center space-x-4">
            <svg class="w-12 h-12 text-blue-500 hover-bounce" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <h3 class="text-xl font-semibold text-gray-800">{{ __("Baby Health Checkups") }}</h3>
          </div>
          <p class="mt-2 text-base text-gray-600">
            {{ __("View and manage detailed baby health checkup records easily.") }}
          </p>
          <button onclick="window.location.href='{{ route('baby-health-checkups.index') }}'" class="px-6 py-3 mt-4 text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">
            {{ __("View Checkup Records") }}
          </button>
        </div>
      </div>

      <!-- Pregnancy Journey Timeline (Vertical Alternating Timeline) -->
      <div class="relative px-6 mt-12 bg-white border border-gray-100 shadow-md sm:px-10 rounded-xl">
        <h3 class="py-4 text-3xl font-semibold text-center text-gray-800">
          {{ __("Your Pregnancy Journey Timeline") }}
        </h3>
        <div class="relative">
          <!-- Vertical Line -->
          <div class="timeline-line"></div>
          <!-- Timeline Items -->
          <div class="space-y-12">
            <!-- Timeline Item 1: Week 1-4: Early Pregnancy -->
            <div class="relative flex flex-col items-center md:flex-row">
              <!-- Left Side (Text) -->
              <div class="text-right md:w-1/2 md:pr-8">
                <h4 class="text-2xl font-semibold text-pink-700 animate-slide-in">{{ __("Week 1-4: Early Pregnancy") }}</h4>
                <p class="mt-2 text-base text-pink-600 animate-fade-in">{{ __("Feeling unusually tired or moody?") }}</p>
              </div>
              <!-- Node Circle -->
              <div class="relative z-10 flex items-center justify-center w-12 h-12 text-white bg-pink-700 rounded-full shadow-md animate-bounce">
                1-4
              </div>
              <!-- Right Side (Content) -->
              <div class="md:w-1/2 md:pl-8">
                <div class="p-4 mt-4 rounded-lg shadow-sm bg-red-50">
                  <h5 class="font-semibold text-red-600">{{ __("Problem:") }}</h5>
                  <p class="text-red-500">{{ __("Fatigue, morning sickness, and mood changes are common. Heightened sensitivity may occur.") }}</p>
                </div>
                <div class="p-4 mt-4 rounded-lg shadow-sm bg-green-50">
                  <h5 class="font-semibold text-green-600">{{ __("Solution:") }}</h5>
                  <p class="text-green-500">{{ __("Focus on self-care, rest, hydration, and small, frequent meals. Consult your healthcare provider if needed.") }}</p>
                </div>
              </div>
            </div>
            <!-- Timeline Item 2: Week 5-12: First Trimester -->
            <div class="relative flex flex-col items-center md:flex-row">
              <!-- Alternate: Content on Left -->
              <div class="order-2 text-right md:w-1/2 md:pr-8 md:order-1">
                <h4 class="text-2xl font-semibold text-purple-700 animate-slide-in">{{ __("Week 5-12: First Trimester") }}</h4>
                <p class="mt-2 text-base text-purple-600 animate-fade-in">{{ __("Is morning sickness disrupting your routine?") }}</p>
              </div>
              <!-- Node Circle -->
              <div class="relative z-10 flex items-center justify-center order-1 w-12 h-12 text-white bg-purple-700 rounded-full shadow-md animate-bounce md:order-2">
                5-12
              </div>
              <!-- Alternate: Text on Right -->
              <div class="order-3 md:w-1/2 md:pl-8">
                <div class="p-4 mt-4 rounded-lg shadow-sm bg-red-50">
                  <h5 class="font-semibold text-red-600">{{ __("Problem:") }}</h5>
                  <p class="text-red-500">{{ __("Pronounced nausea, breast tenderness, fatigue, and mood swings may be overwhelming.") }}</p>
                </div>
                <div class="p-4 mt-4 rounded-lg shadow-sm bg-green-50">
                  <h5 class="font-semibold text-green-600">{{ __("Solution:") }}</h5>
                  <p class="text-green-500">{{ __("Light exercise (e.g., yoga or walking), ginger tea, and healthy snacks can help ease discomfort.") }}</p>
                </div>
              </div>
            </div>
            <!-- Timeline Item 3: Week 13-26: Second Trimester -->
            <div class="relative flex flex-col items-center md:flex-row">
              <!-- Text Left -->
              <div class="text-right md:w-1/2 md:pr-8">
                <h4 class="text-2xl font-semibold text-yellow-700 animate-slide-in">{{ __("Week 13-26: Second Trimester") }}</h4>
                <p class="mt-2 text-base text-yellow-600 animate-fade-in">{{ __("Noticing back discomfort or swelling?") }}</p>
              </div>
              <!-- Node Circle -->
              <div class="relative z-10 flex items-center justify-center w-12 h-12 text-white bg-yellow-700 rounded-full shadow-md animate-bounce">
                13-26
              </div>
              <!-- Content Right -->
              <div class="md:w-1/2 md:pl-8">
                <div class="p-4 mt-4 rounded-lg shadow-sm bg-red-50">
                  <h5 class="font-semibold text-red-600">{{ __("Problem:") }}</h5>
                  <p class="text-red-500">{{ __("Back pain, swelling, and discomfort may start. You might also experience vivid dreams or strong emotions.") }}</p>
                </div>
                <div class="p-4 mt-4 rounded-lg shadow-sm bg-green-50">
                  <h5 class="font-semibold text-green-600">{{ __("Solution:") }}</h5>
                  <p class="text-green-500">{{ __("Gentle exercise, supportive pillows, comfortable shoes, and elevating your feet can ease symptoms.") }}</p>
                </div>
              </div>
            </div>
            <!-- Timeline Item 4: Week 27-40: Third Trimester -->
            <div class="relative flex flex-col items-center md:flex-row">
              <!-- Alternate: Content on Left -->
              <div class="order-2 text-right md:w-1/2 md:pr-8 md:order-1">
                <h4 class="text-2xl font-semibold text-blue-700 animate-slide-in">{{ __("Week 27-40: Third Trimester") }}</h4>
                <p class="mt-2 text-base text-blue-600 animate-fade-in">{{ __("Feeling anxious or physically uncomfortable as your due date approaches?") }}</p>
              </div>
              <!-- Node Circle -->
              <div class="relative z-10 flex items-center justify-center order-1 w-12 h-12 text-white bg-blue-700 rounded-full shadow-md animate-bounce md:order-2">
                27-40
              </div>
              <!-- Alternate: Text on Right -->
              <div class="order-3 md:w-1/2 md:pl-8">
                <div class="p-4 mt-4 rounded-lg shadow-sm bg-red-50">
                  <h5 class="font-semibold text-red-600">{{ __("Problem:") }}</h5>
                  <p class="text-red-500">{{ __("Back pain, swelling, and anxiety about delivery intensify as your due date nears.") }}</p>
                </div>
                <div class="p-4 mt-4 rounded-lg shadow-sm bg-green-50">
                  <h5 class="font-semibold text-green-600">{{ __("Solution:") }}</h5>
                  <p class="text-green-500">{{ __("Relaxation techniques, prenatal massages, deep breathing exercises, and childbirth classes can reduce stress and prepare you for delivery.") }}</p>
                </div>
              </div>
            </div>
          </div>
          <!-- End Timeline Items -->
        </div>
      </div>
      <!-- End Pregnancy Journey Timeline -->

      <!-- Footer Section -->
              <!-- Footer Section -->
              <footer class="pt-8 mt-12 border-t border-gray-200">
                <div class="grid grid-cols-1 gap-8 md:grid-cols-3 lg:grid-cols-4">
                    <!-- About Section -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-bold text-gray-800">{{ __("About Us") }}</h3>
                        <p class="text-gray-600">
                            {{ __("Committed to improving maternal and child health through innovative care solutions.") }}
                        </p>
                        <div class="flex space-x-4">
                            <a href="#" class="text-blue-600 hover:text-blue-800">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                </svg>
                            </a>
                            <a href="#" class="text-blue-600 hover:text-blue-800" aria-label="Facebook">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                  <path d="M22.675 0h-21.35C.599 0 0 .6 0 1.326v21.348C0 23.4.599 24 1.325 24h11.495v-9.294H9.692v-3.622h3.128V8.413c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.466.099 2.797.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.762v2.31h3.587l-.467 3.622h-3.12V24h6.116c.727 0 1.325-.6 1.325-1.326V1.326C24 .6 23.402 0 22.675 0z"/>
                                </svg>
                              </a>
                            
                              <!-- LinkedIn Icon -->
                              <a href="#" class="text-blue-600 hover:text-blue-800" aria-label="LinkedIn">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                  <path d="M20.447 20.452h-3.554v-5.569c0-1.327-.027-3.036-1.851-3.036-1.851 0-2.135 1.445-2.135 2.939v5.666H9.356V9h3.414v1.561h.049c.476-.9 1.637-1.851 3.367-1.851 3.598 0 4.266 2.368 4.266 5.455v6.287zM5.337 7.433a2.067 2.067 0 110-4.134 2.067 2.067 0 010 4.134zM6.914 20.452H3.759V9h3.155v11.452zM22.225 0H1.771C.792 0 0 .771 0 1.723v20.554C0 23.229.792 24 1.771 24h20.451C23.207 24 24 23.229 24 22.277V1.723C24 .771 23.207 0 22.225 0z"/>
                                </svg>
                              </a>
                            
                              <!-- YouTube Icon -->
                              <a href="#" class="text-blue-600 hover:text-blue-800" aria-label="YouTube">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                  <path d="M23.498 6.186a2.969 2.969 0 00-2.087-2.102C19.64 3.5 12 3.5 12 3.5s-7.64 0-9.411.584a2.969 2.969 0 00-2.087 2.102A31.77 31.77 0 000 12a31.77 31.77 0 00.502 5.814 2.969 2.969 0 002.087 2.102C4.36 20.5 12 20.5 12 20.5s7.64 0 9.411-.584a2.969 2.969 0 002.087-2.102A31.77 31.77 0 0024 12a31.77 31.77 0 00-.502-5.814zM9.75 15.568V8.432L15.568 12l-5.818 3.568z"/>
                                </svg>
                              </a>
                            <!-- Add more social icons -->
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">{{ __("Quick Links") }}</h3>
                        <ul class="mt-4 space-y-2">
                            <li><a href="{{ route('users.index') }}" class="text-gray-600 hover:text-blue-600">{{ __("User Management") }}</a></li>
                            <li><a href="{{ route('mothersdatas.index') }}" class="text-gray-600 hover:text-blue-600">{{ __("Mothers Data") }}</a></li>
                            <li><a href="{{ route('fullcalendar') }}" class="text-gray-600 hover:text-blue-600">{{ __("Appointments") }}</a></li>
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">{{ __("Contact") }}</h3>
                        <ul class="mt-4 space-y-2">
                            <li class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                +94 772 124 468
                            </li>
                            <li class="flex items-center text-gray-600">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                support@mothercare.lk
                            </li>
                        </ul>
                    </div>

                    <!-- Health Resources -->
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">{{ __("Resources") }}</h3>
                        <ul class="mt-4 space-y-2">
                            <li><a href="#" class="text-gray-600 hover:text-blue-600">{{ __("Pregnancy Guidelines") }}</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-blue-600">{{ __("Vaccination Schedule") }}</a></li>
                            <li><a href="#" class="text-gray-600 hover:text-blue-600">{{ __("Nutrition Advice") }}</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Copyright Notice -->
                <div class="pt-8 mt-8 text-center border-t border-gray-200">
                    <p class="text-sm text-gray-600">
                        © {{ date('Y') }}CraddleSoft. {{ __("All rights reserved.") }}
                    </p>
                    <div class="mt-2">
                        <a href="#" class="text-sm text-gray-600 hover:text-blue-600">{{ __("Privacy Policy") }}</a>
                        <span class="mx-2">|</span>
                        <a href="#" class="text-sm text-gray-600 hover:text-blue-600">{{ __("Terms of Service") }}</a>
                    </div>
                </div>
            </footer>
    </div>
  </div>
  @endrole
</body>
</html>


@endif

            
        
</x-app-layout>
