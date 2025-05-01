<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="flex items-center gap-3 text-2xl font-bold text-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-indigo-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M21 12a9 9 0 1 1-9-9c2.52 0 4.83 1 6.5 2.5" />
                    <path d="M21 3v9h-9" />
                </svg>
                International Health Digital ID
            </h2>
            <div class="flex items-center gap-4">
                <span class="px-3 py-1 text-sm font-semibold text-indigo-700 bg-indigo-100 rounded-full">ID: {{ str_pad($mother->id, 8, '0', STR_PAD_LEFT) }}</span>
                <a href="{{ route('mother.downloadDigitalId', ['mother_id' => $mother->id]) }}" class="flex items-center gap-2 px-4 py-2 text-white transition-colors bg-indigo-600 rounded-lg hover:bg-indigo-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                    Export ID (PDF)
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl rounded-2xl">
                <!-- Header Banner -->
                <div class="px-8 py-6 bg-gradient-to-r from-indigo-600 to-blue-600">
                    <div class="flex items-center justify-between text-white">
                        <div>
                            <h3 class="text-xl font-semibold opacity-80">International Health Digital Identity</h3>
                            <p class="mt-1 text-sm opacity-60">Issued: {{ now()->format('d M Y') }}</p>
                        </div>
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="p-8">
                    <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                        <!-- Profile Section -->
                        <div class="flex flex-col items-center text-center">
                            @if($profilePicture)
                                <div class="relative">
                                    <img src="{{ asset('images/' . $profilePicture->filename) }}" 
                                         alt="Profile Picture" 
                                         class="object-cover w-48 h-48 border-4 border-indigo-600 rounded-full shadow-xl">
                                    <div class="absolute p-2 bg-green-500 rounded-full -bottom-2 -right-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </div>
                            @else
                                <div class="flex items-center justify-center w-48 h-48 bg-gray-100 border-4 border-gray-200 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-20 h-20 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            @endif
                            <h3 class="mt-4 text-2xl font-bold text-gray-900">{{ $mother->full_name }}</h3>
                            <p class="text-gray-600">{{ $mother->occupation ?? 'Occupation not specified' }}</p>
                        </div>

                        <!-- Personal Information -->
                        <div class="space-y-6 md:col-span-2">
                            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                                <div class="p-4 rounded-lg bg-gray-50">
                                    <p class="text-sm font-medium text-gray-500">National ID</p>
                                    <p class="mt-1 text-lg font-semibold text-gray-900">{{ $mother->national_id }}</p>
                                </div>
                                <div class="p-4 rounded-lg bg-gray-50">
                                    <p class="text-sm font-medium text-gray-500">Contact Number</p>
                                    <p class="mt-1 text-lg font-semibold text-gray-900">{{ $mother->mother_contact_number }}</p>
                                </div>
                                <div class="p-4 rounded-lg bg-gray-50">
                                    <p class="text-sm font-medium text-gray-500">Email Address</p>
                                    <p class="mt-1 text-lg font-semibold text-gray-900">{{ $mother->email ?? 'Not provided' }}</p>
                                </div>
                                <div class="p-4 rounded-lg bg-gray-50">
                                    <p class="text-sm font-medium text-gray-500">Date of Birth</p>
                                    <p class="mt-1 text-lg font-semibold text-gray-900">{{ $mother->date_of_birth ?? 'Not provided' }}</p>
                                </div>
                                <div class="p-4 rounded-lg bg-gray-50 sm:col-span-2">
                                    <p class="text-sm font-medium text-gray-500">Residential Address</p>
                                    <p class="mt-1 text-lg font-semibold text-gray-900">{{ $mother->address ?? 'Not provided' }}</p>
                                    <p class="mt-1 text-sm text-gray-600">Nearest Landmark: {{ $mother->nearest_landmark ?? 'Not specified' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Medical Information -->
                    <div class="p-6 mt-8 bg-gray-50 rounded-xl">
                        <h4 class="flex items-center gap-2 text-xl font-bold text-gray-900">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                            </svg>
                            Health Information
                        </h4>
                        <div class="grid grid-cols-1 gap-4 mt-4 sm:grid-cols-2 lg:grid-cols-3">
                            <div class="p-3 bg-white rounded-lg shadow-sm">
                                <p class="text-sm font-medium text-gray-500">Blood Type</p>
                                <p class="mt-1 text-lg font-semibold text-gray-900">{{ $mother->blood_type ?? 'Not specified' }}</p>
                            </div>
                            <div class="p-3 bg-white rounded-lg shadow-sm">
                                <p class="text-sm font-medium text-gray-500">RH Factor</p>
                                <p class="mt-1 text-lg font-semibold text-gray-900">{{ $mother->rh_factor ?? 'Not specified' }}</p>
                            </div>
                            <div class="p-3 bg-white rounded-lg shadow-sm">
                                <p class="text-sm font-medium text-gray-500">Medical Conditions</p>
                                <p class="mt-1 text-lg font-semibold text-gray-900">{{ $mother->known_medical_conditions ?? 'None reported' }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- QR Code Section -->
                    <div class="flex flex-col items-center mt-8">
                        <div class="p-4 bg-white border-2 border-gray-200 shadow-lg rounded-xl">
                            <img src="data:image/png;base64,{{ $qrCodeBase64 }}" 
                                 alt="QR Code" 
                                 class="w-32 h-32">
                        </div>
                        <p class="mt-4 text-sm text-center text-gray-600">Scan to verify digital identity</p>
                    </div>
                </div>

                <!-- Footer -->
                <div class="px-8 py-4 border-t border-gray-200 bg-gray-50">
                    <div class="flex items-center justify-between text-sm text-gray-500">
                        <p>Valid until: {{ now()->addYears(5)->format('d M Y') }}</p>
                        <p>ID Version: 2.0</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
