<x-app-layout>
  <x-slot name="header">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
          {{ __('Edit User') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
          <div class="p-6 bg-white border-b border-gray-200 shadow sm:rounded-lg">
              <form method="POST" action="{{ route('users.update', $user->id) }}">
                  @csrf
                  @method('PUT')

                  <!-- Name Field -->
                  <div class="mb-4">
                      <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                      <input type="text" name="name" id="name" value="{{ $user->name }}" 
                             class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                      @error('name')
                          <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>

                  <!-- Email Field -->
                  <div class="mb-4">
                      <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                      <input type="email" name="email" id="email" value="{{ $user->email }}" 
                             class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                      @error('email')
                          <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>

                  <!-- Role Dropdown -->
                  <div class="mb-4">
                      <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                      <select name="role" id="role" 
                              class="block w-full px-3 py-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                          @foreach($roles as $role)
                              <option value="{{ $role->name }}" {{ $user->roles->pluck('name')->contains($role->name) ? 'selected' : '' }}>
                                  {{ ucfirst($role->name) }}
                              </option>
                          @endforeach
                      </select>
                      @error('role')
                          <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                      @enderror
                  </div>

                  <!-- Submit Button -->
                  <div class="flex justify-end">
                      <button type="submit" 
                              class="px-6 py-2.5 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75 transition ease-in-out duration-150">
                          Update
                      </button>
                  </div>
              </form>
          </div>
      </div>
  </div>
</x-app-layout>
