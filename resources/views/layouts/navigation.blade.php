<style type="text/css">
    .text-theme-yellow {
        color: #fdc02f;
    }
    .text-theme-blue {
        color: #0047ab;
    }
    .text-theme-gray {
        color: #343a40;
    }
</style>

<nav x-data="{ open: false }" class="lg:h-screen bg-[#0047ab] w-full lg:w-[15%] lg:fixed z-[999]">
    <!-- Primary Navigation Menu -->
    <div class="min-h-screen hidden lg:flex flex-col justify-between items-start px-4 border-r border-r-[#0047ab]">
        <div class="flex flex-col w-full ">
            <!-- Logo -->
            <div class="shrink-0 inline-flex items-center justify-center text-center pt-5 pb-7">
                <a href="{{ route('dashboard') }}" class="pr-3">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                </a>
                <h5 class="font-normal text-xs text-gray-700 pl-3 flex flex-col items-start border-l border-l-[#ffffff7a]">
                    <span class="text-white">Department of</span>
                    <span class="text-theme-yellow">Foreign</span>
                    <span class="text-theme-yellow">Affairs</span>
                </h5>
            </div>

            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:flex sm:flex-col mb-3 relative">
                <button type="button" class="inline-flex items-center px-2 py-2 rounded bg-transparent w-full border-transparent text-lg md:text-xs font-medium leading-5 text-white hover:text-[#0047ab] hover:border-gray-300 hover:bg-[#fdc02f] focus:outline-none transition duration-150 ease-in-out hover:scale-105" aria-controls="dashboard-dropdown" data-collapse-toggle="dashboard-dropdown">
                      <x-icons.icon-dashboard class="h-5"></x-icons.icon-dashboard>
                      <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-xs lg:text-sm">{{ __('Dashboard') }}</span>
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                      </svg>
                </button>
                <ul id="dashboard-dropdown" class="hidden pt-3 space-y-3">
                      <li>
                        <x-sub-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-xs lg:text-sm">
                            Countries
                        </x-sub-nav-link>
                      </li>
                      <li>
                        <x-sub-nav-link :href="route('dashboard.regional')" :active="request()->routeIs('dashboard.regional')" class="text-xs lg:text-sm">
                            Regions
                        </x-sub-nav-link>
                      </li>
                </ul>
            </div>
            <div class="hidden space-x-8 sm:flex sm:flex-col mb-3 relative">
                <button type="button" class="inline-flex items-center px-2 py-2 rounded bg-transparent w-full border-transparent text-lg md:text-xs font-medium leading-5 text-white hover:text-[#0047ab] hover:border-gray-300 hover:bg-[#fdc02f] focus:outline-none transition duration-150 ease-in-out hover:scale-105" aria-controls="reports-dropdown" data-collapse-toggle="reports-dropdown">
                      <x-icons.icon-files class="h-5"></x-icons.icon-files>
                      <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-xs lg:text-sm">{{ __('Reports') }}</span>
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                      </svg>
                </button>
                <ul id="reports-dropdown" class="hidden pt-3 space-y-3">
                      <li>
                        <x-sub-nav-link :href="route('reports.accomplishments')" :active="request()->routeIs('reports.accomplishments')" class="text-xs lg:text-sm">
                            Accomplishments
                        </x-sub-nav-link>
                      </li>
                      <li>
                        <x-sub-nav-link :href="route('reports.events')" :active="request()->routeIs('reports.events')" class="text-xs lg:text-sm">
                            Events
                        </x-sub-nav-link>
                      </li>
                      <li class="relative">
                        <x-sub-nav-link :href="route('reports.translations')" :active="request()->routeIs('reports.translations')" class="text-xs lg:text-sm">
                            Translations
                        </x-sub-nav-link>
                      </li>
                </ul>
            </div>
            <div class="hidden space-x-8 sm:flex sm:flex-col mb-2 relative">
                <button type="button" class="inline-flex items-center px-2 py-2 rounded bg-transparent w-full border-transparent text-lg md:text-xs font-medium leading-5 text-white hover:text-[#0047ab] hover:border-gray-300 hover:bg-[#fdc02f] focus:outline-none transition duration-150 ease-in-out hover:scale-105" aria-controls="settings-dropdown" data-collapse-toggle="settings-dropdown">
                      <x-icons.icon-settings class="h-5"></x-icons.icon-settings>
                      <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-xs lg:text-sm">{{ __('Data Management') }}</span>
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                         <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                      </svg>
                </button>
                <ul id="settings-dropdown" class="hidden pt-3 space-y-3">
                  <li>
                    <x-sub-nav-link :href="route('settings.accomplishments')" :active="request()->routeIs('settings.accomplishments')" class="text-xs lg:text-sm">
                        Accomplishments
                    </x-sub-nav-link>
                  </li>
                  <li>
                    <x-sub-nav-link :href="route('settings.events')" :active="request()->routeIs('settings.events')" class="text-xs lg:text-sm">
                        Events
                    </x-sub-nav-link>
                  </li>
                  <li class="relative">
                    <x-sub-nav-link :href="route('settings.translations')" :active="request()->routeIs('settings.translations')" class="text-xs lg:text-sm">
                        Translations
                    </x-sub-nav-link>
                  </li>
                </ul>
            </div>
        </div>

        <!-- Settings Dropdown -->
        <div class="hidden sm:flex mb-4">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white hover:hover:text-[#fdc02f] focus:outline-none transition ease-in-out duration-150">
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
                    <x-dropdown-link :href="route('profile.edit')" class="inline-flex items-center">
                        <x-icons.icon-user-outline class="h-6 w-6 mr-1"></x-icons.icon-user-outline>
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();" class="inline-flex items-center">
                            <x-icons.icon-back class="h-5 w-5 mr-2"></x-icons.icon-back>
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>

            </x-dropdown>
        </div>

        <!-- Hamburger -->
        <div class="-me-2 flex items-center sm:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                <x-icons.icon-burger></x-icons.icon-burger>
            </button>
        </div>

    </div>

    <!-- Secondary/Responsive Navigation Menu -->
    <div class="w-full bg-white inline-flex lg:hidden">
        <nav class="w-full bg-[#0047ab] dark:bg-gray-800 dark:border-gray-700">
          <div class="flex flex-wrap items-center justify-between mx-auto p-4">
            <!-- Logo -->
            <div class="shrink-0 inline-flex items-center justify-center text-center">
                <a href="{{ route('dashboard') }}" class="pr-3">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                </a>
                <h5 class="font-normal text-xs text-gray-700 pl-3 flex flex-col items-start border-l border-l-[#ffffff7a]">
                    <span class="text-white">Department of</span>
                    <span class="text-theme-yellow">Foreign</span>
                    <span class="text-theme-yellow">Affairs</span>
                </h5>
            </div>
            <button data-collapse-toggle="navbar-hamburger" type="button" class="inline-flex items-center justify-center p-2 w-10 h-10 text-sm text-theme-yellow rounded-lg hover:bg-[#fdc02f] hover:text-[#0047ab] focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-hamburger" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
              </svg>
            </button>
            <div class="hidden w-full" id="navbar-hamburger">

                <!-- Navigation Links -->
                <div class="space-x-8 flex flex-col mb-2 relative pt-4">
                    <button type="button" class="inline-flex items-center px-2 py-2 rounded bg-transparent w-full border-transparent text-lg md:text-xs font-medium leading-5 text-white hover:text-[#0047ab] hover:border-gray-300 hover:bg-[#fdc02f] focus:outline-none transition duration-150 ease-in-out hover:scale-105" aria-controls="dashboard-dropdown-sub" data-collapse-toggle="dashboard-dropdown-sub">
                          <x-icons.icon-dashboard class="h-5"></x-icons.icon-dashboard>
                          <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-xs lg:text-sm">{{ __('Dashboard') }}</span>
                          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                             <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                          </svg>
                    </button>
                    <ul id="dashboard-dropdown-sub" class="hidden py-2 space-y-2">
                          <li>
                            <x-sub-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-gray-400 text-xs lg:text-sm">
                                Countries
                            </x-sub-nav-link>
                          </li>
                          <li>
                            <x-sub-nav-link :href="route('dashboard.regional')" :active="request()->routeIs('dashboard.regional')" class="text-gray-400 text-xs lg:text-sm">
                                Regions
                            </x-sub-nav-link>
                          </li>
                    </ul>
                </div>
                <div class="space-x-8 flex flex-col mb-2 relative">
                    <button type="button" class="inline-flex items-center px-2 py-2 rounded bg-transparent w-full border-transparent text-lg md:text-xs font-medium leading-5 text-white hover:text-[#0047ab] hover:border-gray-300 hover:bg-[#fdc02f] focus:outline-none transition duration-150 ease-in-out hover:scale-105" aria-controls="reports-dropdown-sub" data-collapse-toggle="reports-dropdown-sub">
                          <x-icons.icon-files class="h-5"></x-icons.icon-files>
                          <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-xs lg:text-sm">{{ __('Reports') }}</span>
                          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                             <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                          </svg>
                    </button>
                    <ul id="reports-dropdown-sub" class="hidden py-2 space-y-2">
                          <li>
                            <x-sub-nav-link :href="route('reports.accomplishments')" :active="request()->routeIs('reports.accomplishments')" class="text-gray-400 text-xs lg:text-sm">
                                Accomplishments
                            </x-sub-nav-link>
                          </li>
                          <li>
                            <x-sub-nav-link :href="route('reports.events')" :active="request()->routeIs('reports.events')" class="text-gray-400 text-xs lg:text-sm">
                                Events
                            </x-sub-nav-link>
                          </li>
                          <li class="relative">
                            <x-sub-nav-link :href="route('reports.translations')" :active="request()->routeIs('reports.translations')" class="text-gray-400 text-xs lg:text-sm">
                                Translations
                            </x-sub-nav-link>
                          </li>
                    </ul>
                </div>
                <div class="space-x-8 flex flex-col mb-2 relative">
                    <button type="button" class="inline-flex items-center px-2 py-2 rounded bg-transparent w-full border-transparent text-lg md:text-xs font-medium leading-5 text-white hover:text-[#0047ab] hover:border-gray-300 hover:bg-[#fdc02f] focus:outline-none transition duration-150 ease-in-out hover:scale-105" aria-controls="settings-dropdown-sub" data-collapse-toggle="settings-dropdown-sub">
                          <x-icons.icon-settings class="h-5"></x-icons.icon-settings>
                          <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap text-xs lg:text-sm">{{ __('Data Management') }}</span>
                          <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                             <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                          </svg>
                    </button>
                    <ul id="settings-dropdown-sub" class="hidden py-2 space-y-2">
                      <li>
                        <x-sub-nav-link :href="route('settings.accomplishments')" :active="request()->routeIs('settings.accomplishments')" class="text-gray-400 text-xs lg:text-sm">
                            Accomplishments
                        </x-sub-nav-link>
                      </li>
                      <li>
                        <x-sub-nav-link :href="route('settings.events')" :active="request()->routeIs('settings.events')" class="text-gray-400 text-xs lg:text-sm">
                            Events
                        </x-sub-nav-link>
                      </li>
                      <li class="relative">
                        <x-sub-nav-link :href="route('settings.translations')" :active="request()->routeIs('settings.translations')" class="text-gray-400 text-xs lg:text-sm">
                            Translations
                        </x-sub-nav-link>
                      </li>
                    </ul>
                </div>

            </div>
          </div>
        </nav>
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
