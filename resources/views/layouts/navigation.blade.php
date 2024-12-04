<nav x-data="{ open: false }" class="h-screen bg-white w-[15%] fixed z-[999]">
    <!-- Primary Navigation Menu -->
    <div class="min-h-screen flex flex-col justify-between items-start px-4 border-r border-r-gray-200">
        <div class="flex flex-col w-full ">
            <!-- Logo -->
            <div class="shrink-0 inline-flex items-center justify-center text-center pt-5 pb-7">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                </a>
                <h5 class="font-normal text-xs text-gray-700 pl-2 flex flex-col items-start">
                    <span>Department of</span>
                    <span>Foreign</span>
                    <span>Affairs</span>
                </h5>
            </div>

            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:flex sm:flex-col mb-2 relative">
                <button type="button" class="inline-flex items-center px-2 py-2 rounded bg-transparent w-full border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 hover:bg-gray-100 focus:outline-none transition duration-150 ease-in-out hover:scale-105" aria-controls="dashboard-dropdown" data-collapse-toggle="dashboard-dropdown">
                      <x-icons.icon-home class="h-5"></x-icons.icon-home>
                      <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">{{ __('Dashboard') }}</span>
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                      </svg>
                </button>
                <ul id="dashboard-dropdown" class="hidden py-2 space-y-2">
                      <li>
                        <x-sub-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-gray-400">
                            Countries
                        </x-sub-nav-link>
                      </li>
                      <li>
                        <x-sub-nav-link :href="route('dashboard.regional')" :active="request()->routeIs('dashboard.regional')" class="text-gray-400">
                            Regions
                        </x-sub-nav-link>
                      </li>
                </ul>

                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="hidden text-gray-400">
                    <x-icons.icon-home class="h-5"></x-icons.icon-home>
                    <span class="pl-2">
                        {{ __('Dashboard') }}
                    </span>
                    <span class="absolute -right-4 top-2.5 bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Beta</span>
                </x-nav-link>

            </div>
            <div class="hidden space-x-8 sm:flex sm:flex-col mb-2 relative">
                <button type="button" class="inline-flex items-center px-2 py-2 rounded bg-transparent w-full border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 hover:bg-gray-100 focus:outline-none transition duration-150 ease-in-out hover:scale-105" aria-controls="reports-dropdown" data-collapse-toggle="reports-dropdown">
                      <x-icons.icon-files class="h-5"></x-icons.icon-files>
                      <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">{{ __('Reports') }}</span>
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                      </svg>
                </button>
                <ul id="reports-dropdown" class="hidden py-2 space-y-2">
                      <li>
                        <x-sub-nav-link :href="route('reports.accomplishments')" :active="request()->routeIs('reports-accomplishments')" class="text-gray-400">
                            Accomplishments
                        </x-sub-nav-link>
                      </li>
                      <li>
                        <x-sub-nav-link :href="route('reports.events')" :active="request()->routeIs('reports-events')" class="text-gray-400">
                            Events
                        </x-sub-nav-link>
                      </li>
                      <li class="relative">
                        <x-sub-nav-link :href="route('reports.translations')" :active="request()->routeIs('reports-translations')" class="text-gray-400">
                            Translations
                        </x-sub-nav-link>
                        <span class="absolute -right-4 top-2.5 bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Beta</span>
                      </li>
                </ul>
            </div>
            <div class="hidden space-x-8 sm:flex mb-2 relative">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('users')" class="text-gray-400">
                    <x-icons.icon-users class="h-5"></x-icons.icon-users>
                    <span class="pl-2">
                        {{ __('Users') }}
                    </span>
                    <span class="absolute -right-4 top-2.5 bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">Soon</span>
                </x-nav-link>
            </div>
            <div class="hidden space-x-8 sm:flex sm:flex-col mb-2 relative">
                <button type="button" class="inline-flex items-center px-2 py-2 rounded bg-transparent w-full border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 hover:bg-gray-100 focus:outline-none transition duration-150 ease-in-out hover:scale-105" aria-controls="settings-dropdown" data-collapse-toggle="settings-dropdown">
                      <x-icons.icon-settings class="h-5"></x-icons.icon-settings>
                      <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">{{ __('Data Settings') }}</span>
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                      </svg>
                </button>
                <ul id="settings-dropdown" class="hidden py-2 space-y-2">
                      <li>
                        <x-sub-nav-link :href="route('settings.accomplishments')" :active="request()->routeIs('settings-accomplishments')" class="text-gray-400">
                            Accomplishments
                        </x-sub-nav-link>
                      </li>
                      <li>
                        <x-sub-nav-link :href="route('settings.events')" :active="request()->routeIs('settings-events')" class="text-gray-400">
                            Events
                        </x-sub-nav-link>
                      </li>
                      <li class="relative">
                        <x-sub-nav-link :href="route('settings.translations')" :active="request()->routeIs('settings-translations')" class="text-gray-400">
                            Translations
                        </x-sub-nav-link>
                        <span class="absolute -right-4 top-2.5 bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Beta</span>
                      </li>
                </ul>
            </div>
        </div>

        <!-- Settings Dropdown -->
        <div class="hidden sm:flex mb-2">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        <div class="inline-flex items-center">
                            <x-icons.icon-user class="h-6 w-6 mr-2"></x-icons.icon-user>
                            {{ Auth::user()->name }}
                        </div>

                        <!-- <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div> -->
                        
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
        <div class="-me-2 flex items-center sm:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
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
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
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
