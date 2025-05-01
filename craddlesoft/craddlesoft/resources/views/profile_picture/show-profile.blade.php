<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Mother Profile - {{ $mother->full_name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 bg-white shadow-md sm:rounded-lg">
                <h3 class="text-lg font-semibold">Profile Picture</h3>

                @if($profilePicture)
                    <img src="{{ asset('images/' . $profilePicture->filename) }}" alt="Profile Picture" class="w-32 h-32 rounded-md">
                @else
                    <p>No profile picture uploaded yet.</p>
                @endif

                <div class="mt-6">
                    <!-- Link to upload image form -->
                    <a href="{{ route('profile.uploadForm', ['mother_id' => $mother->id]) }}" class="btn btn-primary">Upload New Picture</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
