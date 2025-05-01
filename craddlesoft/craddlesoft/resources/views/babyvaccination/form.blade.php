<!DOCTYPE html>
<html>
<head>
    <title>Generate Baby Vaccination Report</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-100">
    <div class="container p-5 mx-auto mt-10">
        <div class="max-w-md p-6 mx-auto bg-white rounded-lg shadow-lg">
            <h2 class="mb-6 text-2xl font-bold text-center text-blue-700">Generate Baby Vaccination Report</h2>

            @if (session('error'))
                <div class="p-4 mb-4 text-red-700 bg-red-100 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('babyvaccination.report') }}" method="GET">
                <div class="mb-4">
                    <label for="mother_id" class="block mb-2 font-bold text-gray-700">Mother ID:</label>
                    <input
                        type="text"
                        id="mother_id"
                        name="mother_id"
                        placeholder="Enter Mother ID (e.g., M10002)"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"
                        required>
                </div>

                <button
                    type="submit"
                    class="w-full py-2 font-bold text-white transition duration-200 bg-blue-600 rounded-lg shadow-md hover:bg-blue-500">
                    Generate PDF
                </button>
            </form>
        </div>
    </div>
</body>
</html>
