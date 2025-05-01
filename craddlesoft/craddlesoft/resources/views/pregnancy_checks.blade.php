<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pregnancy Medical Checkups</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.13.5/cdn.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body class="text-gray-800 bg-gray-50">
    <div class="container px-4 py-10 mx-auto">
        <!-- Header Section with enhanced styling -->
        <header class="mb-10 text-center">
            <div class="flex items-center justify-center mb-4">
                <i class="mr-3 text-4xl text-blue-600 fas fa-heartbeat"></i>
                <h1 class="text-5xl font-extrabold tracking-tight text-blue-600">Pregnancy Medical Checkups</h1>
            </div>
            <p class="max-w-2xl mx-auto mt-3 text-lg text-gray-600">Monitor and manage pregnancy health records at various stages with comprehensive tracking and analysis.</p>
        </header>

        <!-- Enhanced Checkup Cards Section -->
        <section class="grid grid-cols-1 gap-8 mb-12 md:grid-cols-3">
            <!-- 3-Month Checkups with hover effects -->
            <div class="p-6 transition-all duration-300 transform bg-white rounded-lg shadow-lg hover:scale-105 hover:shadow-xl">
                <div class="flex items-center mb-3">
                    <i class="mr-2 text-xl text-blue-600 fas fa-calendar-alt"></i>
                    <h2 class="text-2xl font-bold text-blue-600">3-Month Checkups</h2>
                </div>
                <p class="mb-6 text-gray-600">Track early pregnancy health with comprehensive initial assessments.</p>
                <div class="flex justify-center space-x-4">
                    <a href="/health-checks-after3-months" class="flex items-center px-5 py-2 text-white transition bg-blue-500 rounded-lg hover:bg-blue-600">
                        <i class="mr-2 fas fa-list-alt"></i>View Records
                    </a>
                    <a href="/health-checks-after3-months/create" class="flex items-center px-5 py-2 text-white transition bg-green-500 rounded-lg hover:bg-green-600">
                        <i class="mr-2 fas fa-plus"></i>Add Record
                    </a>
                </div>
            </div>

            <!-- 6-Month Checkups -->
            <div class="p-6 transition-all duration-300 transform bg-white rounded-lg shadow-lg hover:scale-105 hover:shadow-xl">
                <div class="flex items-center mb-3">
                    <i class="mr-2 text-xl text-green-600 fas fa-calendar-check"></i>
                    <h2 class="text-2xl font-bold text-green-600">6-Month Checkups</h2>
                </div>
                <p class="mb-6 text-gray-600">Monitor mid-pregnancy health with detailed progress tracking.</p>
                <div class="flex justify-center space-x-4">
                    <a href="/health-checks-after6-months" class="flex items-center px-5 py-2 text-white transition bg-green-500 rounded-lg hover:bg-green-600">
                        <i class="mr-2 fas fa-list-alt"></i>View Records
                    </a>
                    <a href="/health-checks-after6-months/create" class="flex items-center px-5 py-2 text-white transition bg-blue-500 rounded-lg hover:bg-blue-600">
                        <i class="mr-2 fas fa-plus"></i>Add Record
                    </a>
                </div>
            </div>

            <!-- 9-Month Checkups -->
            <div class="p-6 transition-all duration-300 transform bg-white rounded-lg shadow-lg hover:scale-105 hover:shadow-xl">
                <div class="flex items-center mb-3">
                    <i class="mr-2 text-xl text-red-600 fas fa-calendar-week"></i>
                    <h2 class="text-2xl font-bold text-red-600">9-Month Checkups</h2>
                </div>
                <p class="mb-6 text-gray-600">Prepare for delivery with final health assessments and monitoring.</p>
                <div class="flex justify-center space-x-4">
                    <a href="/health-checks-after9-months" class="flex items-center px-5 py-2 text-white transition bg-red-500 rounded-lg hover:bg-red-600">
                        <i class="mr-2 fas fa-list-alt"></i>View Records
                    </a>
                    <a href="/health-checks-after9-months/create" class="flex items-center px-5 py-2 text-white transition bg-green-500 rounded-lg hover:bg-green-600">
                        <i class="mr-2 fas fa-plus"></i>Add Record
                    </a>
                </div>
            </div>
        </section>

        <!-- Enhanced Recent Checkups Section with Alpine.js -->
        <section x-data="{ activeTab: '3-month' }">
            <div class="flex items-center mb-6">
                <i class="mr-3 text-3xl text-gray-800 fas fa-clock"></i>
                <h2 class="text-4xl font-bold text-gray-800">Recent Checkups</h2>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-lg">
                <!-- Enhanced Tab Navigation -->
                <ul class="flex justify-center mb-6 border-b">
                    <li class="mr-6">
                        <button 
                            @click="activeTab = '3-month'"
                            :class="{ 'text-blue-500 border-blue-500': activeTab === '3-month' }"
                            class="pb-2 font-semibold transition-all duration-300 border-b-4 border-transparent hover:text-blue-700 focus:outline-none">
                            <i class="mr-2 fas fa-baby-carriage"></i>3-Month
                        </button>
                    </li>
                    <li class="mr-6">
                        <button 
                            @click="activeTab = '6-month'"
                            :class="{ 'text-green-500 border-green-500': activeTab === '6-month' }"
                            class="pb-2 font-semibold transition-all duration-300 border-b-4 border-transparent hover:text-green-700 focus:outline-none">
                            <i class="mr-2 fas fa-child"></i>6-Month
                        </button>
                    </li>
                    <li class="mr-6">
                        <button 
                            @click="activeTab = '9-month'"
                            :class="{ 'text-red-500 border-red-500': activeTab === '9-month' }"
                            class="pb-2 font-semibold transition-all duration-300 border-b-4 border-transparent hover:text-red-700 focus:outline-none">
                            <i class="mr-2 fas fa-hospital"></i>9-Month
                        </button>
                    </li>
                </ul>

                <!-- Enhanced Tab Content -->
                <div x-show="activeTab === '3-month'" class="transition-all duration-300">
                    <h3 class="flex items-center mb-4 text-xl font-bold text-blue-600">
                        <i class="mr-2 fas fa-stethoscope"></i>3-Month Checkups
                    </h3>
                    <div class="overflow-x-auto">
                        <table class="w-full border border-collapse rounded-lg bg-blue-50">
                            <thead class="bg-blue-200">
                                <tr>
                                    <th class="px-4 py-3 font-semibold text-left">Mother ID</th>
                                    <th class="px-4 py-3 font-semibold text-left">Checkup Date</th>
                                    <th class="px-4 py-3 font-semibold text-left">Weight</th>
                                    <th class="px-4 py-3 font-semibold text-left">Blood Pressure</th>
                                    <th class="px-4 py-3 font-semibold text-left">Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="transition-colors duration-150 hover:bg-blue-100">
                                    <td class="px-4 py-3">M10001</td>
                                    <td class="px-4 py-3">2025-01-01</td>
                                    <td class="px-4 py-3">65.0 kg</td>
                                    <td class="px-4 py-3">120/80</td>
                                    <td class="px-4 py-3">Routine checkup.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div x-show="activeTab === '6-month'" class="transition-all duration-300" x-cloak>
                    <h3 class="flex items-center mb-4 text-xl font-bold text-green-600">
                        <i class="mr-2 fas fa-stethoscope"></i>6-Month Checkups
                    </h3>
                    <div class="overflow-x-auto">
                        <table class="w-full border border-collapse rounded-lg bg-green-50">
                            <thead class="bg-green-200">
                                <tr>
                                    <th class="px-4 py-3 font-semibold text-left">Mother ID</th>
                                    <th class="px-4 py-3 font-semibold text-left">Checkup Date</th>
                                    <th class="px-4 py-3 font-semibold text-left">Weight</th>
                                    <th class="px-4 py-3 font-semibold text-left">Blood Pressure</th>
                                    <th class="px-4 py-3 font-semibold text-left">Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="transition-colors duration-150 hover:bg-green-100">
                                    <td class="px-4 py-3">M10002</td>
                                    <td class="px-4 py-3">2025-03-01</td>
                                    <td class="px-4 py-3">68.5 kg</td>
                                    <td class="px-4 py-3">118/76</td>
                                    <td class="px-4 py-3">Healthy progress.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div x-show="activeTab === '9-month'" class="transition-all duration-300" x-cloak>
                    <h3 class="flex items-center mb-4 text-xl font-bold text-red-600">
                        <i class="mr-2 fas fa-stethoscope"></i>9-Month Checkups
                    </h3>
                    <div class="overflow-x-auto">
                        <table class="w-full border border-collapse rounded-lg bg-red-50">
                            <thead class="bg-red-200">
                                <tr>
                                    <th class="px-4 py-3 font-semibold text-left">Mother ID</th>
                                    <th class="px-4 py-3 font-semibold text-left">Checkup Date</th>
                                    <th class="px-4 py-3 font-semibold text-left">Weight</th>
                                    <th class="px-4 py-3 font-semibold text-left">Blood Pressure</th>
                                    <th class="px-4 py-3 font-semibold text-left">Risk</th>
                                    <th class="px-4 py-3 font-semibold text-left">Notes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="transition-colors duration-150 hover:bg-red-100">
                                    <td class="px-4 py-3">M10003</td>
                                    <td class="px-4 py-3">2025-06-01</td>
                                    <td class="px-4 py-3">72.0 kg</td>
                                    <td class="px-4 py-3">122/78</td>
                                    <td class="px-4 py-3">Low Risk</td>
                                    <td class="px-4 py-3">Ready for delivery.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>