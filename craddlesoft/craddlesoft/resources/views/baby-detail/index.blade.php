<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Baby Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto space-y-6 sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="w-full">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Baby Details') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">First pregnancy baby information {{ __('Baby Details') }}.</p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a type="button" href="{{ route('baby-details.create') }}" class="block px-3 py-2 text-sm font-semibold text-center text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Complete the first pregnancy baby information.</a>
                        </div>
                    </div>
                    @role('admin|midwives|mohdoctor')

                    <div class="flow-root">
                        <div class="mt-8 overflow-x-auto">
                            <div class="inline-block min-w-full py-2 align-middle">
                                <table class="w-full divide-y divide-gray-300">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">No</th>
                                        
									<th scope="col" class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">Mother Id</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">Baby Name</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">Gender</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">Date Of Birth</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">Birth Weight</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">Birth Length</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">Blood Type</th>
									<th scope="col" class="py-3 pl-4 pr-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase">Medical Conditions</th>

                                        <th scope="col" class="px-3 py-3 text-xs font-semibold tracking-wide text-left text-gray-500 uppercase"></th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($babyDetails as $babyDetail)
                                        <tr class="even:bg-gray-50">
                                            <td class="py-4 pl-4 pr-3 text-sm font-semibold text-gray-900 whitespace-nowrap">{{ ++$i }}</td>
                                            
										<td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $babyDetail->mother_id }}</td>
										<td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $babyDetail->baby_name }}</td>
										<td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $babyDetail->gender }}</td>
										<td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $babyDetail->date_of_birth }}</td>
										<td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $babyDetail->birth_weight }}</td>
										<td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $babyDetail->birth_length }}</td>
										<td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $babyDetail->blood_type }}</td>
										<td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">{{ $babyDetail->medical_conditions }}</td>

                                            <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap">
                                                <form action="{{ route('baby-details.destroy', $babyDetail->id) }}" method="POST">
                                                    <a href="{{ route('baby-details.show', $babyDetail->id) }}" class="mr-2 font-bold text-gray-600 hover:text-gray-900">{{ __('Show') }}</a>
                                                    <a href="{{ route('baby-details.edit', $babyDetail->id) }}" class="mr-2 font-bold text-indigo-600 hover:text-indigo-900">{{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('baby-details.destroy', $babyDetail->id) }}" class="font-bold text-red-600 hover:text-red-900" onclick="event.preventDefault(); confirm('Are you sure to delete?') ? this.closest('form').submit() : false;">{{ __('Delete') }}</a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                                <div class="px-4 mt-4">
                                    {!! $babyDetails->withQueryString()->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endrole
                </div>
            </div>
        </div>
    </div>
</x-app-layout>