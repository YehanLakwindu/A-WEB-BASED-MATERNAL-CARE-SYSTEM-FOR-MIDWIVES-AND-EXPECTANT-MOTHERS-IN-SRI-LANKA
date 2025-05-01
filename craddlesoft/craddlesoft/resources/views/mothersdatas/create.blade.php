<x-app-layout>
    <x-slot name="header">
        @role('admin|midwives|mohdoctor')
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Mother Details') }}
            @endrole
            @role('mother')
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('First Time Registration') }}
                @endrole
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto space-y-6 sm:px-6 lg:px-8">
            <!-- Card Container -->
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="w-full">
                    <!-- Header Section -->
                    <div class="justify-between sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            @role('admin|midwives|mohdoctor')
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('Create Mothersdata') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">
                                {{ __('Add a new Mothersdata record.') }}
                            </p>
                            @endrole
                            @role('mother')
                            <h1 class="text-base font-semibold leading-6 text-gray-900">{{ __('New Registration') }}</h1>
                            <p class="mt-2 text-sm text-gray-700">
                                {{ __(' To access our CraddleSoft platform, Registration is a must.') }}
                            </p>
                            @endrole
                        </div>
                        <div class="mt-4 sm:mt-0">
                            <a href="{{ route('mothersdatas.index') }}"
                               class="block px-3 py-2 text-sm font-semibold text-center text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus:outline-none focus-visible:ring focus-visible:ring-indigo-500 focus-visible:ring-offset-2">
                                {{ __('Back') }}
                            </a>
                        </div>
                    </div>

                    <!-- Form Section -->
                    <div class="mt-8">
                        <div class="max-w-xl">
                            <form method="POST" action="{{ route('mothersdatas.store') }}" enctype="multipart/form-data">
                                @csrf

                                <!-- Include the Form Fields -->
                                @include('mothersdatas.form')
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
