<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
{{-- <nav x-data="{ open: false }" class="bg-stone-700 border-b border-gray-100"> --}}
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    {{-- <a href="{{ route('dashboard') }}">
                    <a href="{{ route('tdps.index') }}"> --}}
                            <x-jet-application-mark class="block h-9 w-auto" />
                    {{-- </a> --}}
                </div>

                @canany(['permit_access'])
                    <div class=" space-x-8 px-4 ml-10 flex">
                        <x-jet-nav-link href="{{ route('permits.index') }}" :active="request()->routeIs('permits.*')">
                            {{ __('Permits') }}
                        </x-jet-nav-link>

                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-6 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                        Reports
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-52">
                                    <x-jet-dropdown-link href="{{ route('reports.permit-logging-method') }}">
                                        {{ __('R1: RIL, Non-RIL & Helicopter') }}
                                    </x-jet-dropdown-link>
    
                                    <x-jet-dropdown-link href="{{ route('reports.permit-summary') }}">
                                        {{ __('TDP Summary') }}
                                    </x-jet-dropdown-link>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endcanany

                @canany(['report_access', 'viewer_access'])
                    <div class=" space-x-8 px-4 ml-10 pt-4 flex">
                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                        Reports
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-52">
                                    <x-jet-dropdown-link href="{{ route('permits.report') }}">
                                        {{ __('Application Status') }}
                                    </x-jet-dropdown-link>
    
                                    <x-jet-dropdown-link href="{{ route('permits.report') }}">
                                        {{ __('TDP Summary') }}
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link href="{{ route('reports.permit-logging-method') }}">
                                        {{ __('R1: RIL, Non-RIL & Helicopter') }}
                                    </x-jet-dropdown-link>
    
                                    <x-jet-dropdown-link href="{{ route('reports.permit-summary') }}">
                                        {{ __('TDP Summary') }}
                                    </x-jet-dropdown-link>

                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endcanany

                @can('admin_access')
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-jet-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.*')">
                            Users Management
                        </x-jet-nav-link>
                    </div>   
                @endcan    

            </div>


            <div class="hidden sm:flex sm:items-center sm:ml-6">

                <!-- Setting Dropdown for Admin-->
                @canany(['admin_access','fo_access'])
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-dropdown align="right" width="60">
                        <x-slot name="trigger">
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                    Settings

                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                            </button>
                            </span>
                        </x-slot>

                        <x-slot name="content">
                            <div class="w-60">
                                <!-- Location Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Location Management') }}
                                </div>
                                <x-jet-dropdown-link href="{{ route('regions.index') }}">
                                    {{ __('Regions') }}
                                </x-jet-dropdown-link>

                                <x-jet-dropdown-link href="{{ route('districts.index') }}">
                                    {{ __('Districts') }}
                                </x-jet-dropdown-link>

                                <div class="border-t border-gray-100"></div>

                                <!-- Team Switcher -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Royalty Rates Factors') }}
                                </div>
                                <x-jet-dropdown-link href="{{ route('prices.index') }}">
                                    {{ __('Royalty Rates') }}
                                </x-jet-dropdown-link>
                                <x-jet-dropdown-link href="{{ route('logsizes.index') }}">
                                    {{ __('Log Sizes') }}
                                </x-jet-dropdown-link>
                                <x-jet-dropdown-link href="{{ route('species.index') }}">
                                    {{ __('Species') }}
                                </x-jet-dropdown-link>
                                <x-jet-dropdown-link href="{{ route('landtypes.index') }}">
                                    {{ __('Land Types') }}
                                </x-jet-dropdown-link>

                            </div>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
                @endcanany

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                        {{ Auth::user()->name }}
                                        {{ Auth::user()->licensee }}
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
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
            <x-jet-responsive-nav-link href="{{ route('welcome') }}" :active="request()->routeIs('dashboard')">
                {{ __('Home') }}
            </x-jet-responsive-nav-link>

            @can('admin_access')
                <x-jet-responsive-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.*')">
                    {{ __('Users Management') }}
                </x-jet-responsive-nav-link>
            @endcan    

            {{-- @can('permit_access')
                <x-jet-responsive-nav-link href="{{ route('permits.index') }}" :active="request()->routeIs('permits.*')">
                    {{ __('Permit') }}
                </x-jet-responsive-nav-link>
            @endcan --}}

            @can('reports_access')
                <x-jet-responsive-nav-link href="{{ route('permits.report') }}" :active="request()->routeIs('permits.*')">
                    Reports
                </x-jet-responsive-nav-link>
            @endcan

            @canany(['admin_access','fo_access'])
                <x-jet-responsive-nav-link href="{{ route('regions.index') }}" :active="request()->routeIs('regions.*')">
                    {{ __('Regions') }}
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link href="{{ route('districts.index') }}" :active="request()->routeIs('districts.*')">
                    {{ __('Districts') }}
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link href="{{ route('prices.index') }}" :active="request()->routeIs('prices.*')">
                    {{ __('Royalty Rates') }}
                </x-jet-responsive-nav-link>
                
                <x-jet-responsive-nav-link href="{{ route('logsizes.index') }}" :active="request()->routeIs('logsizes.*')">
                    {{ __('Log Sizes') }}
                </x-jet-responsive-nav-link>
                
                <x-jet-responsive-nav-link href="{{ route('species.index') }}" :active="request()->routeIs('species.*')">
                    {{ __('Species') }}
                </x-jet-responsive-nav-link>
                
                <x-jet-responsive-nav-link href="{{ route('landtypes.index') }}" :active="request()->routeIs('landtypes.*')">
                    {{ __('Land Types') }}
                </x-jet-responsive-nav-link>
            @endcanany

            @can('users_access')               
                <x-jet-responsive-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.*')">
                    Users
                </x-jet-responsive-nav-link>
            @endcan
            </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <div class="flex-shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    </div>
                @endif

                <div>
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-jet-responsive-nav-link>

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-jet-responsive-nav-link>

                    @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                        <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                            {{ __('Create New Team') }}
                        </x-jet-responsive-nav-link>
                    @endcan

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</nav>
