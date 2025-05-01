<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - Mother's Details</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Include Chart.js -->
</head>
<body class="font-sans bg-gray-100">
    <div class="container p-5 mx-auto mt-10">
       <!-- Header Section -->
<div class="mb-8 text-center">
    <h2 class="text-4xl font-extrabold tracking-wide text-blue-800">
        Mother's Medical Details
    </h2>
    <p class="mt-2 text-lg font-medium text-gray-600">
        Comprehensive information and health tracking progress.
    </p>
</div>

@role('admin|midwives|mohdoctor')

        <div class="flex justify-center mb-20">
            <div class="w-full max-w-md">
                <div class="p-6 text-center text-white rounded-lg shadow-lg bg-gradient-to-r from-blue-400 to-blue-500">
                    <h3 class="mb-4 text-xl font-bold">Generate Medical Report</h3>
                    <p class="mb-6 text-sm font-medium">
                        Download a detailed medical report for the mother, including health tracking information and progress charts.
                    </p>
                    <form action="{{ route('mother.medical.report', $mother->id) }}" method="GET">
                        @csrf
                        <button type="submit" 
                                class="w-full px-6 py-2 text-lg font-semibold text-blue-500 bg-white rounded-lg shadow-md hover:bg-gray-100 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-400">
                            Download Report
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endrole
        
        <!-- Health Tracking Charts -->
        <div class="mb-8">
            <h3 class="mb-4 text-xl font-bold text-gray-700 border-b-4 border-blue-700">Health Progress Charts</h3>

            <!-- Chart for 3 Months -->
            <div class="mb-8">
                <h4 class="mb-4 text-lg font-semibold text-blue-600">3 Months</h4>
                <canvas id="chart3Months" class="w-full max-w-4xl mx-auto bg-white rounded-lg shadow-lg"></canvas>
            </div>

            <!-- Chart for 6 Months -->
            <div class="mb-8">
                <h4 class="mb-4 text-lg font-semibold text-blue-600">6 Months</h4>
                <canvas id="chart6Months" class="w-full max-w-4xl mx-auto bg-white rounded-lg shadow-lg"></canvas>
            </div>

            <!-- Chart for 9 Months -->
            <div class="mb-8">
                <h4 class="mb-4 text-lg font-semibold text-blue-600">9 Months</h4>
                <canvas id="chart9Months" class="w-full max-w-4xl mx-auto bg-white rounded-lg shadow-lg"></canvas>
            </div>
        </div>

        <!-- Health Tracking Details Table -->
        <div class="mb-8">
            <h3 class="mb-4 text-xl font-bold text-gray-700 border-b-4 border-blue-700">Health Tracking Details</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white divide-y divide-gray-200 rounded-lg shadow-md">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Month</th>
                            <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Weight (kg)</th>
                            <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Systolic BP</th>
                            <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Diastolic BP</th>
                            <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Glucose Level (mg/dL)</th>
                            <th class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Hemoglobin Level (g/dL)</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr class="transition-colors hover:bg-gray-50">
                            <td class="px-4 py-3 whitespace-nowrap">3 Months</td>
                            <td class="px-4 py-3">{{ optional($mother->healthTrackingsAfter3Month->first())->weight ?? 'N/A' }}</td>
                            <td class="px-4 py-3">
                                {{ optional($mother->healthTrackingsAfter3Month->first())->blood_pressure ? explode('/', optional($mother->healthTrackingsAfter3Month->first())->blood_pressure)[0] : 'N/A' }}
                            </td>
                            <td class="px-4 py-3">
                                {{ optional($mother->healthTrackingsAfter3Month->first())->blood_pressure ? explode('/', optional($mother->healthTrackingsAfter3Month->first())->blood_pressure)[1] : 'N/A' }}
                            </td>
                            <td class="px-4 py-3">{{ optional($mother->healthTrackingsAfter3Month->first())->glucose_level ?? 'N/A' }}</td>
                            <td class="px-4 py-3">{{ optional($mother->healthTrackingsAfter3Month->first())->hemoglobin_level ?? 'N/A' }}</td>
                        </tr>
                        <tr class="transition-colors hover:bg-gray-50">
                            <td class="px-4 py-3 whitespace-nowrap">6 Months</td>
                            <td class="px-4 py-3">{{ optional($mother->healthTrackingsAfter6Month->first())->weight ?? 'N/A' }}</td>
                            <td class="px-4 py-3">
                                {{ optional($mother->healthTrackingsAfter6Month->first())->blood_pressure ? explode('/', optional($mother->healthTrackingsAfter6Month->first())->blood_pressure)[0] : 'N/A' }}
                            </td>
                            <td class="px-4 py-3">
                                {{ optional($mother->healthTrackingsAfter6Month->first())->blood_pressure ? explode('/', optional($mother->healthTrackingsAfter6Month->first())->blood_pressure)[1] : 'N/A' }}
                            </td>
                            <td class="px-4 py-3">{{ optional($mother->healthTrackingsAfter6Month->first())->glucose_level ?? 'N/A' }}</td>
                            <td class="px-4 py-3">{{ optional($mother->healthTrackingsAfter6Month->first())->hemoglobin_level ?? 'N/A' }}</td>
                        </tr>
                        <tr class="transition-colors hover:bg-gray-50">
                            <td class="px-4 py-3 whitespace-nowrap">9 Months</td>
                            <td class="px-4 py-3">{{ optional($mother->healthTrackingsAfter9Month->first())->weight ?? 'N/A' }}</td>
                            <td class="px-4 py-3">
                                {{ optional($mother->healthTrackingsAfter9Month->first())->blood_pressure ? explode('/', optional($mother->healthTrackingsAfter9Month->first())->blood_pressure)[0] : 'N/A' }}
                            </td>
                            <td class="px-4 py-3">
                                {{ optional($mother->healthTrackingsAfter9Month->first())->blood_pressure ? explode('/', optional($mother->healthTrackingsAfter9Month->first())->blood_pressure)[1] : 'N/A' }}
                            </td>
                            <td class="px-4 py-3">{{ optional($mother->healthTrackingsAfter9Month->first())->glucose_level ?? 'N/A' }}</td>
                            <td class="px-4 py-3">{{ optional($mother->healthTrackingsAfter9Month->first())->hemoglobin_level ?? 'N/A' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Back Button -->
        <div class="text-center">
            <a href="{{ route('mother.details.form') }}" 
               class="inline-block px-4 py-2 font-bold text-white transition duration-300 bg-gray-600 rounded-lg shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                Back
            </a>
        </div>
    </div>
    



    <!-- Footer -->
    <footer class="py-5 mt-10 text-sm text-center text-gray-700 bg-gray-200">
        <p>&copy; 2025 CraddleSoft Health System. All rights reserved.</p>

    </footer>

    <!-- Chart.js Scripts -->
    <script>
        const healthData = {
            threeMonths: {
                weight: @json(optional($mother->healthTrackingsAfter3Month->first())->weight ?? 0),
                bloodPressureSystolic: @json(optional($mother->healthTrackingsAfter3Month->first())->blood_pressure ? explode('/', optional($mother->healthTrackingsAfter3Month->first())->blood_pressure)[0] : 0),
                bloodPressureDiastolic: @json(optional($mother->healthTrackingsAfter3Month->first())->blood_pressure ? explode('/', optional($mother->healthTrackingsAfter3Month->first())->blood_pressure)[1] : 0),
                glucoseLevel: @json(optional($mother->healthTrackingsAfter3Month->first())->glucose_level ?? 0),
                hemoglobinLevel: @json(optional($mother->healthTrackingsAfter3Month->first())->hemoglobin_level ?? 0),
            },
            sixMonths: {
                weight: @json(optional($mother->healthTrackingsAfter6Month->first())->weight ?? 0),
                bloodPressureSystolic: @json(optional($mother->healthTrackingsAfter6Month->first())->blood_pressure ? explode('/', optional($mother->healthTrackingsAfter6Month->first())->blood_pressure)[0] : 0),
                bloodPressureDiastolic: @json(optional($mother->healthTrackingsAfter6Month->first())->blood_pressure ? explode('/', optional($mother->healthTrackingsAfter6Month->first())->blood_pressure)[1] : 0),
                glucoseLevel: @json(optional($mother->healthTrackingsAfter6Month->first())->glucose_level ?? 0),
                hemoglobinLevel: @json(optional($mother->healthTrackingsAfter6Month->first())->hemoglobin_level ?? 0),
            },
            nineMonths: {
                weight: @json(optional($mother->healthTrackingsAfter9Month->first())->weight ?? 0),
                bloodPressureSystolic: @json(optional($mother->healthTrackingsAfter9Month->first())->blood_pressure ? explode('/', optional($mother->healthTrackingsAfter9Month->first())->blood_pressure)[0] : 0),
                bloodPressureDiastolic: @json(optional($mother->healthTrackingsAfter9Month->first())->blood_pressure ? explode('/', optional($mother->healthTrackingsAfter9Month->first())->blood_pressure)[1] : 0),
                glucoseLevel: @json(optional($mother->healthTrackingsAfter9Month->first())->glucose_level ?? 0),
                hemoglobinLevel: @json(optional($mother->healthTrackingsAfter9Month->first())->hemoglobin_level ?? 0),
            },
        };

        // Function to Create Line Chart
        function createLineChart(canvasId, label, data, colors) {
            const ctx = document.getElementById(canvasId).getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Weight', 'Systolic BP', 'Diastolic BP', 'Glucose Level', 'Hemoglobin Level'],
                    datasets: [
                        {
                            label: label,
                            data: data,
                            borderColor: colors[0],
                            backgroundColor: colors[1],
                            borderWidth: 2,
                            fill: false,
                        },
                    ],
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        },
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Health Parameters',
                            },
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Values',
                            },
                        },
                    },
                },
            });
        }

        // Create Line Charts for Each Time Period
        createLineChart('chart3Months', '3 Months', [
            healthData.threeMonths.weight,
            healthData.threeMonths.bloodPressureSystolic,
            healthData.threeMonths.bloodPressureDiastolic,
            healthData.threeMonths.glucoseLevel,
            healthData.threeMonths.hemoglobinLevel,
        ], ['rgba(75, 192, 192, 1)', 'rgba(75, 192, 192, 0.2)']);

        createLineChart('chart6Months', '6 Months', [
            healthData.sixMonths.weight,
            healthData.sixMonths.bloodPressureSystolic,
            healthData.sixMonths.bloodPressureDiastolic,
            healthData.sixMonths.glucoseLevel,
            healthData.sixMonths.hemoglobinLevel,
        ], ['rgba(54, 162, 235, 1)', 'rgba(54, 162, 235, 0.2)']);

        createLineChart('chart9Months', '9 Months', [
            healthData.nineMonths.weight,
            healthData.nineMonths.bloodPressureSystolic,
            healthData.nineMonths.bloodPressureDiastolic,
            healthData.nineMonths.glucoseLevel,
            healthData.nineMonths.hemoglobinLevel,
        ], ['rgba(255, 99, 132, 1)', 'rgba(255, 99, 132, 0.2)']);
    </script>
</body>
</html>
