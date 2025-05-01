{{-- resources/views/profile_picture/mother-id-form.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Enter Mother ID to Upload Profile Picture
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 bg-white shadow-md sm:rounded-lg">
                <h3 class="mb-4 text-lg font-semibold">Enter Mother ID</h3>

                @if($errors->any())
                    <div class="p-4 mb-4 text-red-700 bg-red-100 rounded-lg">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('profile.uploadForm', ['mother_id' => 'placeholder']) }}" 
                      method="GET"
                      onsubmit="event.preventDefault(); 
                               this.action = this.action.replace('placeholder', this.mother_id.value);
                               this.submit();">
                    <div class="mb-4">
                        <label for="mother_id" class="block text-sm font-medium text-gray-700">Mother ID</label>
                        <input 
                            type="text" 
                            name="mother_id" 
                            id="mother_id" 
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                            value="{{ old('mother_id') }}" 
                            placeholder="Enter Mother ID (e.g., M10001)" 
                            required
                        >
                    </div>

                    <div class="text-center">
                        <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Continue to Upload
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>