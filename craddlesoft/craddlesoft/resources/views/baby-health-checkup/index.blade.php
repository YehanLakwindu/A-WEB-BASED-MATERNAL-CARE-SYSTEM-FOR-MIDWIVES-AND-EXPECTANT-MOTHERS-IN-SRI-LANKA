<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Baby Health Checkups') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-full mx-auto space-y-6 sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="w-full">
                    <!-- Header Section with Title and Add Button -->
                    <div class="sm:flex sm:items-center sm:justify-between">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Baby Health Checkups') }}</h1>
                        <a href="{{ route('baby-health-checkups.create') }}" class="block px-4 py-2 mt-4 text-white bg-indigo-600 rounded-md hover:bg-indigo-500">
                            Add New Checkup
                        </a>
                    </div>
                   
                     
                     

                    <!-- Filter Section -->
                    <div class="flex items-center justify-between mt-6 mb-6">
                        <form method="GET" action="{{ route('baby-health-checkups.index') }}" class="flex items-center space-x-4">
                            <!-- Mother ID Filter -->
                            <div>
                                <label for="mother_id" class="block text-sm font-medium text-gray-700">Filter by Mother ID</label>
                                <input
                                    type="text"
                                    name="mother_id"
                                    id="mother_id"
                                    value="{{ request()->input('mother_id') }}"
                                    class="px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Enter Mother ID"
                                />


                                      
                              
                                
                            </div>

                            <!-- Timeframe Filter -->
                            <div>
                                <label for="timeframe" class="block text-sm font-medium text-gray-700">Filter by Timeframe</label>
                                <select
                                    name="timeframe"
                                    id="timeframe"
                                    class="px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                                >
                                    <option value="" {{ request()->input('timeframe') === null ? 'selected' : '' }}>All</option>
                                    <option value="1_week" {{ request()->input('timeframe') === '1_week' ? 'selected' : '' }}>1 Week</option>
                                    <option value="2_weeks" {{ request()->input('timeframe') === '2_weeks' ? 'selected' : '' }}>2 Weeks</option>
                                    <option value="1_month" {{ request()->input('timeframe') === '1_month' ? 'selected' : '' }}>1 Month</option>
                                    <option value="2_months" {{ request()->input('timeframe') === '2_months' ? 'selected' : '' }}>2 Months</option>
                                    <option value="3_months" {{ request()->input('timeframe') === '3_months' ? 'selected' : '' }}>3 Months</option>
                                </select>
                            </div>

                            <!-- Filter Button -->
                            <button
                                type="submit"
                                class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600"
                            >
                                Filter
                            </button>
                        </form>
                    </div>

                    <!-- Chart Section -->
                    <div class="mt-8">
                        <h3 class="mb-4 text-lg font-semibold text-gray-700">Growth Chart</h3>
                        <canvas id="enhancedGrowthChart" class="w-full h-64"></canvas>
                    </div>

                    <!-- Table Section -->
                    <div class="flow-root mt-8">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-200">
                                    <tr>
                                        <th class="px-4 py-2 text-xs font-semibold text-left text-gray-500 uppercase">No</th>
                                        <th class="px-4 py-2 text-xs font-semibold text-left text-gray-500 uppercase">Baby ID</th>
                                        <th class="px-4 py-2 text-xs font-semibold text-left text-gray-500 uppercase">Checkup Date</th>
                                        <th class="px-4 py-2 text-xs font-semibold text-left text-gray-500 uppercase">Weight</th>
                                        <th class="px-4 py-2 text-xs font-semibold text-left text-gray-500 uppercase">Height</th>
                                        <th class="px-4 py-2 text-xs font-semibold text-left text-gray-500 uppercase">Head Circumference</th>
                                        <th class="px-4 py-2 text-xs font-semibold text-left text-gray-500 uppercase">Feeding Status</th>
                                        <th class="px-4 py-2 text-xs font-semibold text-left text-gray-500 uppercase">Notes</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($babyHealthCheckups as $checkup)
                                        <tr>
                                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                            <td class="px-4 py-2">{{ $checkup->baby_id }}</td>
                                            <td class="px-4 py-2">{{ $checkup->checkup_date }}</td>
                                            <td class="px-4 py-2">{{ $checkup->weight }}</td>
                                            <td class="px-4 py-2">{{ $checkup->height }}</td>
                                            <td class="px-4 py-2">{{ $checkup->head_circumference }}</td>
                                            <td class="px-4 py-2">{{ $checkup->feeding_status }}</td>
                                            <td class="px-4 py-2">{{ $checkup->notes }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="mt-4">
                            {{ $babyHealthCheckups->withQueryString()->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('enhancedGrowthChart').getContext('2d');
    const growthChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($babyHealthCheckups->pluck('checkup_date')), // Dates
            datasets: [
                {
                    label: 'Weight (kg)',
                    data: @json($babyHealthCheckups->pluck('weight')),
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 3,
                    pointRadius: 5,
                    pointHoverRadius: 8,
                    tension: 0.4
                },
                {
                    label: 'Height (cm)',
                    data: @json($babyHealthCheckups->pluck('height')),
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderWidth: 3,
                    pointRadius: 5,
                    pointHoverRadius: 8,
                    tension: 0.4
                },
                {
                    label: 'Head Circumference (cm)',
                    data: @json($babyHealthCheckups->pluck('head_circumference')),
                    borderColor: 'rgba(255, 206, 86, 1)',
                    backgroundColor: 'rgba(255, 206, 86, 0.2)',
                    borderWidth: 3,
                    pointRadius: 5,
                    pointHoverRadius: 8,
                    tension: 0.4
                },
                // Permanent Growth Line for Weight
                {
                    label: 'Permanent Growth Line for Weight',
                    data: new Array(@json($babyHealthCheckups->count())).fill(10), // Replace 10 with a value for weight growth line
                    borderColor: 'rgba(255, 0, 0, 1)', // Red line for weight
                    backgroundColor: 'rgba(255, 0, 0, 0.2)', // Slight background for red
                    borderWidth: 1, // Thin line
                    pointRadius: 0, // No points, just a line
                    borderDash: [5, 5], // Dashes to make the line small
                    tension: 0 // Keep the line straight
                },
                // Permanent Growth Line for Height
                {
                    label: 'Permanent Growth Line for Height',
                    data: new Array(@json($babyHealthCheckups->count())).fill(50), // Replace 50 with a value for height growth line
                    borderColor: 'rgba(255, 0, 0, 1)', // Red line for height
                    backgroundColor: 'rgba(255, 0, 0, 0.2)', // Slight background for red
                    borderWidth: 1, // Thin line
                    pointRadius: 0, // No points, just a line
                    borderDash: [5, 5], // Dashes to make the line small
                    tension: 0 // Keep the line straight
                },
                // Permanent Growth Line for Head Circumference
                {
                    label: 'Permanent Growth Line for Head Circumference',
                    data: new Array(@json($babyHealthCheckups->count())).fill(45), // Replace 45 with a value for head circumference growth line
                    borderColor: 'rgba(255, 0, 0, 1)', // Red line for head circumference
                    backgroundColor: 'rgba(255, 0, 0, 0.2)', // Slight background for red
                    borderWidth: 1, // Thin line
                    pointRadius: 0, // No points, just a line
                    borderDash: [5, 5], // Dashes to make the line small
                    tension: 0 // Keep the line straight
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        font: {
                            size: 14,
                            weight: 'bold'
                        }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.7)',
                    titleFont: {
                        size: 16,
                        weight: 'bold'
                    },
                    bodyFont: {
                        size: 14
                    },
                    padding: 10
                },
                title: {
                    display: true,
                    text: 'Baby Growth Over Time',
                    font: {
                        size: 18,
                        weight: 'bold'
                    }
                }
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Checkup Date',
                        font: {
                            size: 16,
                            weight: 'bold'
                        }
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Measurement',
                        font: {
                            size: 16,
                            weight: 'bold'
                        }
                    },
                    beginAtZero: true
                }
            }
        }
    });
</script>

    
</x-app-layout>
