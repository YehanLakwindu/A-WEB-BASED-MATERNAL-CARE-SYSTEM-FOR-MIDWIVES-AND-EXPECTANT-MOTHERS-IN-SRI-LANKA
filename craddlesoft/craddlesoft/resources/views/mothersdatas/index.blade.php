<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold leading-tight text-gray-900">
            @role('admin|midwives|mohdoctor')
                {{ __('Mothers Data') }}
            @endrole
            @role('mother')
                {{ __('New Registration') }}
            @endrole
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 bg-white shadow-md sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center sm:justify-between">
                        <div class="sm:flex-auto">
                            @role('admin|midwives|mohdoctor')
                                <h1 class="text-xl font-semibold text-gray-800">{{ __('Mothers Data') }}</h1>
                                <p class="mt-2 text-gray-600">A complete list of all registered mothers.</p>
                            @endrole

                            @role('mother')
                                <h1 class="text-xl font-semibold text-gray-800">{{ __('New Registration') }}</h1>
                                <p class="mt-2 text-gray-600">
                                    Welcome to CraddleSoft! To access our platform, registration is a must. 
                                    <br>Let’s make pregnancy care smarter together. 💙
                                </p>
                            @endrole
                        </div>

                        @role('mother')
                        <div class="mt-4 sm:mt-0 sm:flex-none">
                            <a href="{{ route('mothersdatas.create') }}"
                               class="inline-flex items-center px-4 py-2 text-white bg-indigo-600 rounded-md shadow-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                + First Time Registration
                            </a>
                        </div>
                        @endrole
                    </div>

                    @role('admin|midwives|mohdoctor')
                    <div class="p-6 mt-8 border border-gray-200 rounded-md shadow-sm bg-gray-50">
                        <label for="motherIdInput" class="block text-sm font-medium text-gray-700">
                            Enter Mother's ID
                        </label>
                        <div class="mt-2">
                            <input type="text" id="motherIdInput" placeholder="Enter Mother's ID"
                                   class="block w-full px-4 py-2 border rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <button id="generatePdfBtn"
                                class="inline-flex justify-center w-full px-4 py-2 mt-4 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Generate PDF
                        </button>

                        <script>
                            document.getElementById('generatePdfBtn').addEventListener('click', function () {
                                var motherId = document.getElementById('motherIdInput').value;

                                if (motherId) {
                                    window.location.href = '{{ route("generate.pdf", ":id") }}'.replace(':id', motherId);
                                } else {
                                    alert('Please enter a valid ID.');
                                }
                            });
                        </script>
                    </div>

                    <div class="flow-root mt-8">
                        <div class="overflow-x-auto">
                            <table class="min-w-full border border-gray-200 divide-y divide-gray-200 rounded-lg">
                                <thead class="bg-indigo-100">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            No
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            Mother's ID
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            Full Name
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            National ID
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            Date of Birth
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            Email
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            Address
                                        </th>
                                        
                                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-700 uppercase">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($mothersdatas as $mothersdata)
                                    <tr>
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900 whitespace-nowrap">
                                            {{ ++$i }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900 whitespace-nowrap">
                                            {{ $mothersdata->id }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">
                                            {{ $mothersdata->full_name }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">
                                            {{ $mothersdata->national_id }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">
                                            {{ $mothersdata->date_of_birth }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">
                                            {{ $mothersdata->email }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">
                                            {{ $mothersdata->address }}
                                        </td>
                                        <td class="flex px-6 py-4 space-x-2 whitespace-nowrap">
                                            <a href="{{ route('mothersdatas.show', $mothersdata->id) }}"
                                               class="px-3 py-1 text-blue-600 bg-blue-100 rounded-md hover:bg-blue-200">
                                                Show
                                            </a>
                                            <a href="{{ route('mothersdatas.edit', $mothersdata->id) }}"
                                               class="px-3 py-1 text-indigo-600 bg-indigo-100 rounded-md hover:bg-indigo-200">
                                                Edit
                                            </a>
                                            <form action="{{ route('mothersdatas.destroy', $mothersdata->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="px-3 py-1 text-red-600 bg-red-100 rounded-md hover:bg-red-200">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endrole
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
