<!-- resources/views/users/confirm-delete.blade.php -->
<x-app-layout>
  <x-slot name="header">
      <h2 class="text-xl font-semibold leading-tight text-gray-800">
          {{ __('Delete User') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
          <div class="p-6 bg-white shadow sm:rounded-lg">
              <!-- Confirmation message -->
              <h3 class="text-lg font-semibold text-gray-900">Are you sure you want to delete this user?</h3>
              <p class="mt-4 text-gray-600">This action cannot be undone.</p>

              <!-- Action buttons -->
              <div class="flex mt-6 space-x-4">
                  <!-- Cancel Button -->
                  <a href="{{ route('users.index') }}" 
                     class="px-4 py-2 text-white bg-gray-500 rounded-md hover:bg-gray-600">
                      Cancel
                  </a>

                  <!-- Delete Button, triggers JavaScript confirmation -->
                  <button type="button" onclick="confirmDelete()" class="px-4 py-2 text-white bg-red-500 rounded-md hover:bg-red-600">
                      Confirm Deletion
                  </button>
              </div>
          </div>
      </div>
  </div>

  <script>
      function confirmDelete() {
          // JavaScript confirmation dialog
          var confirmation = confirm("Are you sure you want to delete this user? This action cannot be undone.");
          if (confirmation) {
              // If confirmed, submit the form
              document.getElementById('deleteForm').submit();
          }
      }
  </script>

  <!-- Delete Form (hidden initially, triggered by confirmation) -->
  <form id="deleteForm" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:none;">
      @csrf
      @method('DELETE')
  </form>

</x-app-layout>
