<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Doctors') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto space-y-6 sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Doctors') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">A list of all the registered doctors with their details.</p>
                        </div>
                        @role('admin|midwives|mohdoctor')
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a href="{{ route('doctors.create') }}" class="block px-3 py-2 text-sm font-semibold text-center text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                Add New
                            </a>
                        </div>
                        @endrole
                    </div>

                    <!-- Responsive Table -->
                    <div class="flow-root mt-8">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-300">
                                <thead class="bg-gray-100">
                                    <tr>
                                        <th class="px-6 py-3 text-xs font-semibold text-left text-gray-700 uppercase">No</th>
                                        <th class="px-6 py-3 text-xs font-semibold text-left text-gray-700 uppercase">Full Name</th>
                                        <th class="px-6 py-3 text-xs font-semibold text-left text-gray-700 uppercase">Specialty</th>
                                        <th class="px-6 py-3 text-xs font-semibold text-left text-gray-700 uppercase">Contact</th>
                                        <th class="px-6 py-3 text-xs font-semibold text-left text-gray-700 uppercase">Email</th>
                                        <th class="px-6 py-3 text-xs font-semibold text-left text-gray-700 uppercase">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($doctors as $doctor)
                                        <tr class="even:bg-gray-50">
                                            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ ++$i }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-600">{{ $doctor->full_name }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-600">{{ $doctor->specialty }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-600">{{ $doctor->contact_number }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-600">{{ $doctor->email }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-900">
                                                <div class="flex items-center space-x-2">
                                                    <a href="{{ route('doctors.show', $doctor->id) }}" class="text-blue-600 hover:underline">Show</a>
                                                    @role('admin|midwives|mohdoctor')
                                                    <a href="{{ route('doctors.edit', $doctor->id) }}" class="text-green-600 hover:underline">Edit</a>
                                                    <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this doctor?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                                    </form>
                                                    @endrole
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-4">
                        {!! $doctors->withQueryString()->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
