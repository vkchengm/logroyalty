<nav x-data="{ open: false }" class="bg-white dark:bg-stone-700 border-b border-gray-100">
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
                    <div class=" space-x-8 px-4 ml-10 pt-4 flex">

                        <x-jet-nav-link class="py-4 text-white dark:hover:text-gray-200" href="{{ route('permits.index') }}" :active="request()->routeIs('permits.*')">
                            {{-- {{ __('Permits') }} --}}
                            {{ __('TDP') }}
                        </x-jet-nav-link>

                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-white bg-white dark:bg-inherit hover:bg-gray-50 hover:text-gray-700 hover:text-gray-700 dark:hover:text-gray-200 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                    {{-- <button type="button" class="inline-flex items-center px-3 py-6 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition"> --}}
                                        Reports
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-52">
                                    <x-jet-dropdown-link href="{{ route('reports.r1-permit-logging-method') }}">
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
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-white bg-white dark:bg-inherit hover:bg-gray-50 hover:text-gray-700 hover:text-gray-700 dark:hover:text-gray-200 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                        {{-- <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition"> --}}
                                        Reports
                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                </button>
                                </span>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-52">
                                    {{-- <x-jet-dropdown-link href="{{ route('permits.report') }}">
                                        {{ __('Application Status') }}
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link href="{{ route('permits.report') }}">
                                        {{ __('TDP Summary') }}
                                    </x-jet-dropdown-link> --}}

                                    <x-jet-dropdown-link href="{{ route('reports.permit-summary') }}">
                                        {{ __('TDP Summary') }}
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link href="{{ route('reports.r1-permit-logging-method') }}">
                                        {{ __('R1: RIL, Non-RIL & Helicopter') }}
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link href="{{ route('reports.r2-permit-licensee') }}">
                                        {{ __('R2 Accumulated Production By Licnesee') }}
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link href="{{ route('reports.r3-permit-landtype-diameter') }}">
                                        {{ __('R3 Accumulated Production By Land Type and Diameter') }}
                                    </x-jet-dropdown-link>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endcanany

{{--                payment reports --}}
                <div class=" space-x-8 px-4 ml-10 pt-4 flex">
                    <x-jet-dropdown align="right" width="60">
                        <x-slot name="trigger">
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-white bg-white dark:bg-inherit hover:bg-gray-50 hover:text-gray-700 hover:text-gray-700 dark:hover:text-gray-200 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                    {{-- <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition"> --}}
                                    Payment Reports
                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </span>
                        </x-slot>

                        <x-slot name="content">
                            <div class="w-52">
                                <x-jet-dropdown-link href="{{ route('payment-reports.r1-permit-logging-method') }}">
                                    {{ __('R1: RIL and Non-RIL') }}
                                </x-jet-dropdown-link>

                                <x-jet-dropdown-link href="{{ route('payment-reports.r2-permit-licensee') }}">
                                    {{ __('R2: Accumulated Production By Licensee') }}
                                </x-jet-dropdown-link>

                                <x-jet-dropdown-link href="{{ route('payment-reports.r3-permit-land-used-diameter') }}">
                                    {{ __('R3: Accumulated Production By Land Type and Diameter') }}
                                </x-jet-dropdown-link>

                                <x-jet-dropdown-link href="{{ route('payment-reports.r4-permit-land-used-volume') }}">
                                    {{ __('R4: Accumulated Production By Land Type and Volume') }}
                                </x-jet-dropdown-link>

                                <x-jet-dropdown-link href="{{ route('payment-reports.r5-permit-land-species-volume') }}">
                                    {{ __('R5: Permits By Land Type, Species and Volume') }}
                                </x-jet-dropdown-link>

                                <x-jet-dropdown-link href="{{ route('payment-reports.r6-permit-logs-production') }}">
                                    {{ __('R6: Permits By Logs Production') }}
                                </x-jet-dropdown-link>

                                <x-jet-dropdown-link href="{{ route('payment-reports.r7-permit-logs-production-by-market') }}">
                                    {{ __('R7: Permits By Logs Production Market') }}
                                </x-jet-dropdown-link>

                                <x-jet-dropdown-link href="{{ route('payment-reports.r8-permit-log-production-by-revenue') }}">
                                    {{ __('R8: Permits By Logs Production Revenue') }}
                                </x-jet-dropdown-link>

                                <x-jet-dropdown-link href="{{ route('payment-reports.r9-permit-logs-summary-by-land') }}">
                                    {{ __('R9: Permits Logs Summary By Land') }}
                                </x-jet-dropdown-link>

                                <x-jet-dropdown-link href="{{ route('payment-reports.r10-permit-production-logging') }}">
                                    {{ __('R10: Permits Production Logging') }}
                                </x-jet-dropdown-link>

                                <x-jet-dropdown-link href="{{ route('payment-reports.r11-permit-land-by-region') }}">
                                    {{ __('R11: Permits Land By Region') }}
                                </x-jet-dropdown-link>

                                <x-jet-dropdown-link href="{{ route('payment-reports.rk3-permit-receipt-listing') }}">
                                    {{ __('RK3: Receipt Listing') }}
                                </x-jet-dropdown-link>
                            </div>
                        </x-slot>
                    </x-jet-dropdown>
                </div>

                @can('admin_access')
                    {{-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-jet-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.*')">
                            Users Management
                        </x-jet-nav-link>
                    </div>  --}}

                    <div class=" space-x-8 px-4 ml-10 pt-4 flex">

                    <x-jet-dropdown align="right" width="60" >
                        <x-slot name="trigger">
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-white bg-white dark:bg-inherit hover:bg-gray-50 hover:text-gray-700 hover:text-gray-700 dark:hover:text-gray-200 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
                                    User Management
                                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                            </button>
                            </span>
                        </x-slot>

                        <x-slot name="content">
                            <div class="w-52">
                                <x-jet-dropdown-link href="{{ route('users.index-internal') }}">
                                    {{ __('Internal') }}
                                </x-jet-dropdown-link>

                                <x-jet-dropdown-link href="{{ route('users.index-external') }}">
                                    {{ __('External') }}
                                </x-jet-dropdown-link>
                            </div>
                        </x-slot>
                    </x-jet-dropdown>
                    </div>
                @endcan

            </div>

            {{-- <div class="flex items-center justify-center mx-auto absolute top-5 right-0 left-1/3"> --}}

                <div class="flex justify-end items-center space-x-2 mx-auto relative">

                    <button
                    id="theme-toggle"
                    type="button"
                    class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5"
                  >
                    <svg
                      id="theme-toggle-dark-icon"
                      class="w-5 h-5 hidden"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"
                      ></path>
                    </svg>
                    <svg
                      id="theme-toggle-light-icon"
                      class="w-5 h-5 hidden"
                      fill="currentColor"
                      viewBox="0 0 20 20"
                      xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                      ></path>
                    </svg>
                  </button>

                </div>
            {{-- </div> --}}

            <script>
                var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
                var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

                // Change the icons inside the button based on previous settings
                if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                    themeToggleLightIcon.classList.remove('hidden');
                } else {
                    themeToggleDarkIcon.classList.remove('hidden');
                }

                var themeToggleBtn = document.getElementById('theme-toggle');

                themeToggleBtn.addEventListener('click', function() {

                    // toggle icons inside button
                    themeToggleDarkIcon.classList.toggle('hidden');
                    themeToggleLightIcon.classList.toggle('hidden');

                    // if set via local storage previously
                    if (localStorage.getItem('color-theme')) {
                        if (localStorage.getItem('color-theme') === 'light') {
                            document.documentElement.classList.add('dark');
                            localStorage.setItem('color-theme', 'dark');
                        } else {
                            document.documentElement.classList.remove('dark');
                            localStorage.setItem('color-theme', 'light');
                        }

                    // if NOT set via local storage previously
                    } else {
                        if (document.documentElement.classList.contains('dark')) {
                            document.documentElement.classList.remove('dark');
                            localStorage.setItem('color-theme', 'light');
                        } else {
                            document.documentElement.classList.add('dark');
                            localStorage.setItem('color-theme', 'dark');
                        }
                    }

                });
            </script>








            <div class="hidden sm:flex sm:items-center sm:ml-6">

                <!-- Setting Dropdown for Admin-->
                @canany(['admin_access','fo_access','hammer_access'])
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-dropdown align="right" width="60">
                        <x-slot name="trigger">
                            <span class="inline-flex rounded-md">
                                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-white bg-white dark:bg-stone-700 hover:bg-gray-50 hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition">
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
                                {{-- <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Location Management') }}
                                </div> --}}
                                {{-- <x-jet-dropdown-link href="{{ route('licensemasters.index') }}">
                                    {{ __('License Master') }}
                                </x-jet-dropdown-link> --}}
                                @can('admin_access')
                                    <x-jet-dropdown-link href="{{ route('licensees.index') }}">
                                        {{ __('Licensees') }}
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link href="{{ route('regions.index') }}">
                                        {{ __('Regions') }}
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link href="{{ route('districts.index') }}">
                                        {{ __('Districts') }}
                                    </x-jet-dropdown-link>

                                    {{-- <div class="border-t border-gray-100"></div> --}}

                                    <!-- Team Switcher -->
                                    {{-- <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Royalty Rates Factors') }}
                                    </div> --}}
                                    {{-- <x-jet-dropdown-link href="{{ route('prices.index') }}">
                                        {{ __('Royalty Prices') }}
                                    </x-jet-dropdown-link> --}}
                                    <x-jet-dropdown-link href="{{ route('logsizes.index') }}">
                                        {{ __('Log Sizes') }}
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('species.index') }}">
                                        {{ __('Species') }}
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('landtypes.index') }}">
                                        {{ __('Land Types') }}
                                    </x-jet-dropdown-link>
                                @endcan

                                @canany(['admin_access', 'fo_access'])
                                    <x-jet-dropdown-link href="{{ route('royalties.index') }}">
                                        {{ __('Royalties') }}
                                    </x-jet-dropdown-link>
                                    <x-jet-dropdown-link href="{{ route('premiums.index') }}">
                                        {{ __('Premiums') }}
                                    </x-jet-dropdown-link>                                    
                                @endcanany

                                @canany(['admin_access', 'hammer_access'])
                                    <x-jet-dropdown-link href="{{ route('hammermarks.index') }}">
                                        {{ __('Hammer Marks') }}
                                    </x-jet-dropdown-link>
                                @endcanany

                            </div>
                        </x-slot>
                    </x-jet-dropdown>
                </div>
                @endcanany

                <!-- Settings Dropdown -->
                <div class="ml-3 relative">
                    <x-jet-dropdown align="right" width="48" >
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-white bg-white dark:bg-stone-700 hover:text-gray-700 focus:outline-none transition">
                                        {{ Auth::user()->name }}
                                        @if (Auth::user()->roles()->first()->title == 'Applicant')
                                            @isset(Auth::user()->licensee)
                                                {{ Auth::user()->licensee->name }}
                                            @endisset
                                        @endif
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



{{--
            <div class="flex justify-end items-center space-x-2 mx-auto relative">
                <button
                id="theme-toggle"
                type="button"
                class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5"
              >
                <svg
                  id="theme-toggle-dark-icon"
                  class="w-5 h-5 hidden"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"
                  ></path>
                </svg>
                <svg
                  id="theme-toggle-light-icon"
                  class="w-5 h-5 hidden"
                  fill="currentColor"
                  viewBox="0 0 20 20"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                    d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                  ></path>
                </svg>
              </button>

            </div>   --}}

            {{-- <script>
                var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
                var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

                // Change the icons inside the button based on previous settings
                if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                    themeToggleLightIcon.classList.remove('hidden');
                } else {
                    themeToggleDarkIcon.classList.remove('hidden');
                }

                var themeToggleBtn = document.getElementById('theme-toggle');

                themeToggleBtn.addEventListener('click', function() {

                    // toggle icons inside button
                    themeToggleDarkIcon.classList.toggle('hidden');
                    themeToggleLightIcon.classList.toggle('hidden');

                    // if set via local storage previously
                    if (localStorage.getItem('color-theme')) {
                        if (localStorage.getItem('color-theme') === 'light') {
                            document.documentElement.classList.add('dark');
                            localStorage.setItem('color-theme', 'dark');
                        } else {
                            document.documentElement.classList.remove('dark');
                            localStorage.setItem('color-theme', 'light');
                        }

                    // if NOT set via local storage previously
                    } else {
                        if (document.documentElement.classList.contains('dark')) {
                            document.documentElement.classList.remove('dark');
                            localStorage.setItem('color-theme', 'light');
                        } else {
                            document.documentElement.classList.add('dark');
                            localStorage.setItem('color-theme', 'dark');
                        }
                    }

                });
            </script> --}}






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
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden  ">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link class="dark:text-gray-300 dark:hover:text-gray-800" href="{{ route('welcome') }}" :active="request()->routeIs('dashboard')">
                {{ __('Home') }}
            </x-jet-responsive-nav-link>

            @can('admin_access')
                <x-jet-responsive-nav-link class="dark:text-gray-300 dark:hover:text-gray-800" href="{{ route('users.index') }}" :active="request()->routeIs('users.*')">
                    {{ __('Users Management') }}
                </x-jet-responsive-nav-link>
            @endcan

            {{-- @can('permit_access')
                <x-jet-responsive-nav-link href="{{ route('permits.index') }}" :active="request()->routeIs('permits.*')">
                    {{ __('Permit') }}
                </x-jet-responsive-nav-link>
            @endcan --}}

            @can('reports_access')
                <x-jet-responsive-nav-link class="dark:text-gray-300 dark:hover:text-gray-800" href="{{ route('permits.report') }}" :active="request()->routeIs('permits.*')">
                    Reports
                </x-jet-responsive-nav-link>
            @endcan

            @canany(['admin_access','fo_access'])

                <x-jet-responsive-nav-link class="dark:text-gray-300 dark:hover:text-gray-800" href="{{ route('regions.index') }}" :active="request()->routeIs('regions.*')">
                    {{ __('Regions') }}
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link class="dark:text-gray-300 dark:hover:text-gray-800" href="{{ route('districts.index') }}" :active="request()->routeIs('districts.*')">
                    {{ __('Districts') }}
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link class="dark:text-gray-300 dark:hover:text-gray-800" href="{{ route('prices.index') }}" :active="request()->routeIs('prices.*')">
                    {{ __('Royalty Rates') }}
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link class="dark:text-gray-300 dark:hover:text-gray-800" href="{{ route('logsizes.index') }}" :active="request()->routeIs('logsizes.*')">
                    {{ __('Log Sizes') }}
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link class="dark:text-gray-300 dark:hover:text-gray-800" href="{{ route('species.index') }}" :active="request()->routeIs('species.*')">
                    {{ __('Species') }}
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link class="dark:text-gray-300 dark:hover:text-gray-800" href="{{ route('landtypes.index') }}" :active="request()->routeIs('landtypes.*')">
                    {{ __('Land Types') }}
                </x-jet-responsive-nav-link>
            @endcanany

            @can('users_access')
                <x-jet-responsive-nav-link class="dark:text-gray-300 dark:hover:text-gray-800" href="{{ route('users.index') }}" :active="request()->routeIs('users.*')">
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
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500 dark:text-gray-300">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link class="dark:text-gray-300 dark:hover:text-gray-800" href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
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

                    <x-jet-responsive-nav-link class="dark:text-gray-300 dark:hover:text-gray-800" href="{{ route('logout') }}"
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
