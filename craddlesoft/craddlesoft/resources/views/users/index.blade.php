<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold leading-tight text-gray-800">
            {{ __('Users Management') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="mx-auto space-y-8 max-w-7xl sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="flex items-center justify-between p-6 bg-white rounded-lg shadow-md">
                <h3 class="text-xl font-bold text-gray-700">
                    {{ __('Manage Users') }}
                </h3>
                <a href="{{ route('users.create') }}"
                   class="inline-block px-6 py-3 font-medium text-white transition duration-150 bg-green-600 rounded-lg shadow-md hover:bg-green-700 focus:ring-2 focus:ring-green-400 focus:ring-opacity-50">
                    + Add New User
                </a>
            </div>

            <!-- Role Filter Buttons -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <div class="flex items-center justify-center space-x-6">
                    <button id="show-doctors" 
                            class="px-8 py-3 font-semibold text-white transition duration-150 bg-blue-500 rounded-lg shadow-md hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                        Show Doctors (<span id="count-doctors">{{ $users->filter(fn($user) => $user->roles->contains('name', 'mohdoctor'))->count() }}</span>)
                    </button>
                    <button id="show-mothers" 
                            class="px-8 py-3 font-semibold text-white transition duration-150 bg-green-500 rounded-lg shadow-md hover:bg-green-600 focus:ring-2 focus:ring-green-400 focus:ring-opacity-50">
                        Show Mothers (<span id="count-mothers">{{ $users->filter(fn($user) => $user->roles->contains('name', 'mother'))->count() }}</span>)
                    </button>
                    <button id="show-midwives" 
                            class="px-8 py-3 font-semibold text-white transition duration-150 bg-purple-500 rounded-lg shadow-md hover:bg-purple-600 focus:ring-2 focus:ring-purple-400 focus:ring-opacity-50">
                        Show Midwives (<span id="count-midwives">{{ $users->filter(fn($user) => $user->roles->contains('name', 'midwives'))->count() }}</span>)
                    </button>
                </div>
            </div>

            <!-- Users Table -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <div class="overflow-hidden border border-gray-200 rounded-lg">
                    <table id="users-table" class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-4 text-sm font-medium text-left text-gray-600 uppercase">
                                    Name
                                </th>
                                <th class="px-6 py-4 text-sm font-medium text-left text-gray-600 uppercase">
                                    Email
                                </th>
                                <th class="px-6 py-4 text-sm font-medium text-left text-gray-600 uppercase">
                                    Roles
                                </th>
                                <th class="px-6 py-4 text-sm font-medium text-left text-gray-600 uppercase">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($users as $user)
                                <tr data-roles="{{ implode(',', $user->roles->pluck('name')->toArray()) }}">
                                    <td class="px-6 py-4 text-sm font-medium text-gray-800 whitespace-nowrap">
                                        <a href="{{ route('users.show', $user->id) }}" class="hover:text-blue-600">
                                            {{ $user->name }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">
                                        {{ $user->email }}
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">
                                        {{ implode(', ', $user->roles->pluck('name')->toArray()) }}
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium whitespace-nowrap">
                                        <a href="{{ route('users.edit', $user->id) }}" 
                                           class="text-yellow-500 hover:text-yellow-600">Edit</a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="ml-4 text-red-500 hover:text-red-600">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Role buttons
            const buttons = {
                doctors: document.getElementById('show-doctors'),
                mothers: document.getElementById('show-mothers'),
                midwives: document.getElementById('show-midwives')
            };

            // Count spans
            const counts = {
                doctors: document.getElementById('count-doctors'),
                mothers: document.getElementById('count-mothers'),
                midwives: document.getElementById('count-midwives')
            };

            // Table rows
            const rows = document.querySelectorAll('#users-table tbody tr');

            // Event listeners for buttons
            buttons.doctors.addEventListener('click', () => filterTable('mohdoctor'));
            buttons.mothers.addEventListener('click', () => filterTable('mother'));
            buttons.midwives.addEventListener('click', () => filterTable('midwives'));

            // Function to filter table by role
            function filterTable(role) {
                let visibleCount = 0;

                rows.forEach(row => {
                    const roles = row.dataset.roles.split(',');
                    if (roles.includes(role)) {
                        row.style.display = '';
                        visibleCount++;
                    } else {
                        row.style.display = 'none';
                    }
                });

                // Update counts dynamically
                if (role === 'mohdoctor') counts.doctors.textContent = visibleCount;
                if (role === 'mother') counts.mothers.textContent = visibleCount;
                if (role === 'midwives') counts.midwives.textContent = visibleCount;
            }
        });
    </script>
</x-app-layout>
