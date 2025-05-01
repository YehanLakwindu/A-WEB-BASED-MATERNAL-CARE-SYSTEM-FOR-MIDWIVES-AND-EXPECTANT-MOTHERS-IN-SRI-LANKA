<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Baby Vaccinations') }}
        </h2>
    </x-slot>

    @role('admin|midwives|mohdoctor')

    <!-- Form to Generate Vaccination Report -->
    <div class="py-6">
        <div class="max-w-3xl mx-auto">
            <div class="p-6 bg-white shadow sm:rounded-lg">
                <h3 class="text-lg font-semibold text-gray-700">Generate Vaccination Report</h3>
                <form action="{{ route('babyvaccination.report') }}" method="GET" class="mt-4">
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
    </div>
  @endrole

    <!-- Vaccination Records -->
    <div class="py-12">
        <div class="max-w-full mx-auto space-y-6 sm:px-6 lg:px-8">
            <div class="p-6 bg-white shadow sm:rounded-lg">
                <div class="flex items-center justify-between mb-6">
                    <!-- Filter Form -->
                    <form method="GET" action="{{ route('baby-vaccinations.index') }}" class="flex items-center space-x-4">
                        <!-- Filter by Mother ID -->
                        <input
                            type="text"
                            name="mother_id"
                            placeholder="Filter by Mother ID"
                            value="{{ request()->input('mother_id') }}"
                            class="px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        />

                        <!-- Dropdown to Filter by Vaccine Name -->
                        <select
                            name="vaccine_name"
                            class="px-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                        >
                            <option value="">Select Vaccine</option>
                            <option value="BCG" {{ request()->input('vaccine_name') == 'BCG' ? 'selected' : '' }}>BCG</option>
                            <option value="OPV & Pentavalent" {{ request()->input('vaccine_name') == 'OPV & Pentavalent' ? 'selected' : '' }}>OPV & Pentavalent</option>
                            <option value="MMR" {{ request()->input('vaccine_name') == 'MMR' ? 'selected' : '' }}>MMR</option>
                        </select>

                        <button
                            type="submit"
                            class="px-4 py-2 ml-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">
                            Filter
                        </button>
                    </form>

                    <!-- Add New Vaccination Button -->
                    <a href="{{ route('baby-vaccinations.create') }}" class="block px-4 py-2 text-white bg-green-600 rounded-md hover:bg-green-500">
                        Add New Vaccination
                    </a>
                </div>

                <!-- Vaccination Records Table -->
                @if(request()->input('mother_id'))
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead>
                                <tr class="text-left text-gray-700 bg-gray-200">
                                    <th class="px-4 py-2">No</th>
                                    <th class="px-4 py-2">Mother ID</th>
                                    <th class="px-4 py-2">Baby Name</th>
                                    <th class="px-4 py-2">Vaccine Name</th>
                                    <th class="px-4 py-2">Vaccination Date</th>
                                    <th class="px-4 py-2">Dose</th>
                                    <th class="px-4 py-2">Milestone</th>
                                    <th class="px-4 py-2">Notes</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($babyVaccinations as $babyVaccination)
                                    <tr class="even:bg-gray-50">
                                        <td class="px-4 py-2">{{ ++$i }}</td>
                                        <td class="px-4 py-2">{{ $babyVaccination->baby->mother_id }}</td>
                                        <td class="px-4 py-2">{{ $babyVaccination->baby->baby_name }}</td>
                                        <td class="px-4 py-2">{{ $babyVaccination->vaccine_name }}</td>
                                        <td class="px-4 py-2">{{ $babyVaccination->vaccination_date }}</td>
                                        <td class="px-4 py-2">{{ $babyVaccination->dose }}</td>
                                        <td class="px-4 py-2">{{ $babyVaccination->milestone }}</td>
                                        <td class="px-4 py-2">{{ $babyVaccination->notes }}</td>
                                        <td class="px-4 py-2">
                                            <form action="{{ route('baby-vaccinations.destroy', $babyVaccination->id) }}" method="POST">
                                                <a href="{{ route('baby-vaccinations.show', $babyVaccination->id) }}" class="text-blue-500 hover:underline">Show</a>
                                                @role('admin')
                                                <a href="{{ route('baby-vaccinations.edit', $babyVaccination->id) }}" class="ml-2 text-yellow-500 hover:underline">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    type="submit"
                                                    class="ml-2 text-red-500 hover:underline"
                                                    onclick="return confirm('Are you sure?')">
                                                    Delete
                                                </button>
                                                @endrole
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="px-4 py-2 text-center text-gray-600">No vaccination records found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- Pagination -->
                        <div class="mt-4">
                            {!! $babyVaccinations->links() !!}
                        </div>
                    </div>
                @else
                    <div class="px-4 py-2 text-center text-gray-600">
                        <p>Please enter a Mother ID to view vaccination records.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
