<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Doctor Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="mb-6 sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-xl font-semibold leading-6 text-gray-900">{{ __('Doctor Details for ') }} {{ $doctor->full_name }}</h1>
                        <p class="mt-2 text-sm text-gray-700">{{ __('Below are the details of the selected doctor.') }}</p>
                    </div>
                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <a href="{{ route('doctors.index') }}" class="block px-3 py-2 text-sm font-semibold text-center text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                            {{ __('Back to List') }}
                        </a>
                    </div>
                </div>

                <div class="overflow-hidden bg-white shadow sm:rounded-lg">
                    <div class="divide-y divide-gray-100">
                        <dl>
                            <div class="px-4 py-5 sm:px-6">
                                <dt class="text-sm font-medium text-gray-900">{{ __('Full Name') }}</dt>
                                <dd class="mt-1 text-sm text-gray-600">{{ $doctor->full_name }}</dd>
                            </div>
                            <div class="px-4 py-5 sm:px-6">
                                <dt class="text-sm font-medium text-gray-900">{{ __('Date of Birth') }}</dt>
                                <dd class="mt-1 text-sm text-gray-600">{{ $doctor->date_of_birth }}</dd>
                            </div>
                            <div class="px-4 py-5 sm:px-6">
                                <dt class="text-sm font-medium text-gray-900">{{ __('Gender') }}</dt>
                                <dd class="mt-1 text-sm text-gray-600">{{ $doctor->gender }}</dd>
                            </div>
                            <div class="px-4 py-5 sm:px-6">
                                <dt class="text-sm font-medium text-gray-900">{{ __('Contact Number') }}</dt>
                                <dd class="mt-1 text-sm text-gray-600">{{ $doctor->contact_number }}</dd>
                            </div>
                            <div class="px-4 py-5 sm:px-6">
                                <dt class="text-sm font-medium text-gray-900">{{ __('Email') }}</dt>
                                <dd class="mt-1 text-sm text-gray-600">{{ $doctor->email }}</dd>
                            </div>
                            <div class="px-4 py-5 sm:px-6">
                                <dt class="text-sm font-medium text-gray-900">{{ __('Medical Registration Number') }}</dt>
                                <dd class="mt-1 text-sm text-gray-600">{{ $doctor->medical_registration_number }}</dd>
                            </div>
                            <div class="px-4 py-5 sm:px-6">
                                <dt class="text-sm font-medium text-gray-900">{{ __('Specialty') }}</dt>
                                <dd class="mt-1 text-sm text-gray-600">{{ $doctor->specialty }}</dd>
                            </div>
                            <div class="px-4 py-5 sm:px-6">
                                <dt class="text-sm font-medium text-gray-900">{{ __('Years of Experience') }}</dt>
                                <dd class="mt-1 text-sm text-gray-600">{{ $doctor->years_of_experience }}</dd>
                            </div>
                            <div class="px-4 py-5 sm:px-6">
                                <dt class="text-sm font-medium text-gray-900">{{ __('Work Location') }}</dt>
                                <dd class="mt-1 text-sm text-gray-600">{{ $doctor->work_location }}</dd>
                            </div>
                            <div class="px-4 py-5 sm:px-6">
                                <dt class="text-sm font-medium text-gray-900">{{ __('Address') }}</dt>
                                <dd class="mt-1 text-sm text-gray-600">{{ $doctor->address }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Action Buttons -->
                

                    <a href="{{ route('doctors.index') }}" class="px-4 py-2 text-white bg-gray-600 rounded-lg hover:bg-gray-700">
                        {{ __('Back to List') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
