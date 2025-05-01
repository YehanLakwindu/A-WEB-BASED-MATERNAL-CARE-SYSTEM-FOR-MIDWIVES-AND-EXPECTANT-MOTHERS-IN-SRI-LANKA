<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Upload Profile Picture for {{ $mother->full_name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 bg-white shadow-md sm:rounded-lg">
                <h3 class="text-lg font-semibold">Upload Profile Picture</h3>

                @if(session('success'))
                    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
                        {{ session('success') }}
                        @if(session('image'))
                            <div class="mt-2">
                                <img src="{{ asset('images/' . session('image')) }}" 
                                     alt="Uploaded profile picture"
                                     class="object-cover w-32 h-32 rounded-full">
                            </div>
                        @endif
                    </div>
                @endif

                <form action="{{ route('profile.store', ['mother_id' => $mother->id]) }}" 
                      method="POST" 
                      enctype="multipart/form-data"
                      class="mt-4">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="profile_picture">
                            Profile Picture:
                        </label>
                        <input type="file" 
                               name="profile_picture" 
                               id="profile_picture" 
                               class="mt-1 block w-full text-sm text-gray-500
                                      file:mr-4 file:py-2 file:px-4
                                      file:rounded-full file:border-0
                                      file:text-sm file:font-semibold
                                      file:bg-indigo-50 file:text-indigo-700
                                      hover:file:bg-indigo-100
                                      @error('profile_picture') border-red-500 @enderror"
                               accept="image/*"
                               required>

                        @error('profile_picture')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    @if($mother->profilePicture) <!-- Assuming 'profilePicture' is the relationship name -->
                    <div class="mb-4">
                        <h4 class="text-lg font-semibold">Current Profile Picture:</h4>
                        <img src="{{ asset('images/' . $mother->profilePicture->filename) }}" 
                             alt="Current Profile Picture" 
                             class="object-cover w-32 h-32 rounded-full">
                    </div>
                @else
                    <p>No profile picture uploaded yet.</p>
                @endif

                    <div class="flex items-center justify-start mt-4">
                        <button type="submit" 
                                class="px-4 py-2 text-white bg-indigo-600 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Upload
                        </button>

                        <a href="{{ url('/enter-mother-id') }}" 
                           class="px-4 py-2 ml-4 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                            Back
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>