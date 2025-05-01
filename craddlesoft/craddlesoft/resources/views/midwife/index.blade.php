<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Midwives') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto space-y-6 sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Midwives') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">A list of all the {{ __('Midwives') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button" href="{{ route('midwives.create') }}" class="block px-3 py-2 text-sm font-semibold text-center text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add new</a>
                        </div>
                    </div>

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <table class="w-full divide-y divide-gray-300">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">No</th>
                                        
									<th scope="col" class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">Midwife Id</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">Full Name</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">Email</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">Contact Number</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">Specialty</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">Years Of Experience</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">Work Location</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">Address</th>

                                        <th scope="col" class="px-3 py-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($midwives as $midwife)
                                        <tr class="even:bg-gray-50">
                                            <td class="py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 whitespace-nowrap">{{ ++$i }}</td>
                                            
										<td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $midwife->midwife_id }}</td>
										<td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $midwife->full_name }}</td>
										<td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $midwife->email }}</td>
										<td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $midwife->contact_number }}</td>
										<td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $midwife->specialty }}</td>
										<td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $midwife->years_of_experience }}</td>
										<td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $midwife->work_location }}</td>
										<td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $midwife->address }}</td>

                                            <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                
                                                <a href="{{ route('midwives.show', $midwife->midwife_id) }}" class="mr-2 font-bold text-gray-600 hover:text-gray-900">{{ __('Show') }}</a>
                                                <a href="{{ route('midwives.edit', $midwife->midwife_id) }}" class="mr-2 font-bold text-indigo-600 hover:text-indigo-900">{{ __('Edit') }}</a>
                                                
                                                  
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="px-4 mt-4">
                                    {!! $midwives->withQueryString()->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>