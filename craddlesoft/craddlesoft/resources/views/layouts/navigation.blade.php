<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('images/logo1.png') }}" alt="Custom Logo" class="w-16 h-16">
                    </a>
                </div>
                

                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="flex items-center space-x-2 text-gray-700 transition duration-300 ease-in-out hover:text-blue-600">
                        <i class="text-xl fas fa-tachometer-alt hover:text-blue-500"></i>
                        <span>{{ __('Dashboard') }}</span>
                    </x-nav-link>
                </div>
                
                @role('admin')
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')" class="flex items-center space-x-2 text-gray-700 transition duration-300 ease-in-out hover:text-green-600">
                        <i class="text-xl fas fa-users hover:text-green-500"></i>
                        <span>{{ __('Users') }}</span>
                    </x-nav-link>
                </div>
                @endrole
                
                @role('mother')
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('mothersdatas.index')" :active="request()->routeIs('mothersdatas.index')" class="flex items-center space-x-2 text-gray-700 transition duration-300 ease-in-out hover:text-yellow-600">
                        <i class="text-xl fas fa-clipboard-list hover:text-yellow-500"></i>
                        <span>{{ __('Registration Mothers') }}</span>
                    </x-nav-link>
                </div>
                @endrole
                
                @role('admin|midwives|mohdoctor')
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('mothersdatas.index')" :active="request()->routeIs('mothersdatas.index')" class="flex items-center space-x-2 text-gray-700 transition duration-300 ease-in-out hover:text-teal-600">
                        <i class="text-xl fas fa-users-medical hover:text-teal-500"></i>
                        <span>{{ __('Registered Mothers') }}</span>
                    </x-nav-link>
                </div>
                @endrole
                
                @role('admin|midwives')
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('pregnancy-checks.index')" :active="request()->routeIs('pregnancy-checks.index')" class="flex items-center space-x-2 text-gray-700 transition duration-300 ease-in-out hover:text-purple-600">
                        <i class="text-xl fas fa-stethoscope hover:text-purple-500"></i>
                        <span>{{ __('Pregnancy Medical Checkups') }}</span>
                    </x-nav-link>
                </div>
                @endrole
                
                @role('admin|midwives|mohdoctor')
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('mother.details.form')" :active="request()->routeIs('mother.details.form')" class="flex items-center space-x-2 text-gray-700 transition duration-300 ease-in-out hover:text-indigo-600">
                        <i class="text-xl fas fa-heartbeat hover:text-indigo-500"></i>
                        <span>{{ __('Mother Details') }}</span>
                    </x-nav-link>
                </div>
                @endrole
                @role('admin')
<div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
    <!-- Add the new View Contacts route -->
    <x-nav-link :href="route('view.contacts')" :active="request()->routeIs('view.contacts')" class="flex items-center space-x-2 text-gray-700 transition duration-300 ease-in-out hover:text-indigo-600">
        <i class="text-xl fas fa-users hover:text-indigo-500"></i>
        <span>{{ __('Get in Touch (msg)') }}</span>
    </x-nav-link>
</div>
@endrole

                
                @role('midwives|mohdoctor')
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('fullcalendar')" :active="request()->routeIs('fullcalendar')" class="flex items-center space-x-2 text-gray-700 transition duration-300 ease-in-out hover:text-pink-600">
                        <i class="text-xl fas fa-calendar-alt hover:text-pink-500"></i>
                        <span>{{ __('Appointments Calendar') }}</span>
                    </x-nav-link>
                </div>
                @endrole
                
                @role('mother')
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('baby-details.index')" :active="request()->routeIs('baby-details.*')" class="flex items-center space-x-2 text-gray-700 transition duration-300 ease-in-out hover:text-red-600">
                        <i class="text-xl fas fa-baby hover:text-red-500"></i>
                        <span>{{ __('Baby Details') }}</span>
                    </x-nav-link>
                </div>
                @endrole
                
                @role('mother|mohdoctor')
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('mother.details.form')" :active="request()->routeIs('mother.details.form')" class="flex items-center space-x-2 text-gray-700 transition duration-300 ease-in-out hover:text-orange-600">
                        <i class="text-xl fas fa-heartbeat hover:text-orange-500"></i>
                        <span>{{ __('Mother Details') }}</span>
                    </x-nav-link>
                </div>
                @endrole
                
                @role('mother')
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('motherapo')" :active="request()->routeIs('motherapo')" class="flex items-center space-x-2 text-gray-700 transition duration-300 ease-in-out hover:text-green-600">
                        <i class="text-xl fas fa-calendar-check hover:text-green-500"></i>
                        <span>{{ __('Appointments') }}</span>
                    </x-nav-link>
                </div>
                
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('doctors.index')" :active="request()->routeIs('doctors.index')" class="flex items-center space-x-2 text-gray-700 transition duration-300 ease-in-out hover:text-blue-600">
                        <i class="text-xl fas fa-user-md hover:text-blue-500"></i>
                        <span>{{ __('Current Doctors Details') }}</span>
                    </x-nav-link>
                </div>
                @endrole
                
                @role('mohdoctor')
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('doctors.create')" :active="request()->routeIs('doctors.create')" class="flex items-center space-x-2 text-gray-700 transition duration-300 ease-in-out hover:text-yellow-600">
                        <i class="text-xl fas fa-user-plus hover:text-yellow-500"></i>
                        <span>{{ __('Registration Doctors') }}</span>
                    </x-nav-link>
                </div>
                @endrole
                
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -me-2 sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
