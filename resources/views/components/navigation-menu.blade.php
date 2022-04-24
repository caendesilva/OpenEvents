<nav class="w-full px-6 pb-12 antialiased  relative z-50 h-24 select-none " x-data="{ showMenu: false }">
    <div class="container relative  max-w-7xl flex flex-wrap items-center justify-between h-24 mx-auto overflow-hidden font-medium border-gray-200 md:overflow-visible lg:justify-center sm:px-4 md:px-2">
        <div class="flex items-center justify-start w-1/4 h-full pr-4">
            <a href="/" class="inline-flex items-center py-4 md:py-0 ui-sans">
                <span class="p-1 text-xl font-black leading-none text-gray-900">
                    <span>{{ config('app.name') }}</span><span class="text-indigo-600">.</span>
                </span>
                <span class="px-2 py-1 ml-1 text-xs font-medium leading-tight text-white bg-green-400 rounded-full">Beta</span>
            </a>
        </div>
        <div class="top-0 left-0 items-start hidden w-full h-full p-4 text-sm bg-gray-900 bg-opacity-50 md:items-center md:w-3/4 lg:text-base md:bg-transparent md:p-0 md:relative md:flex" :class="{'flex fixed': showMenu, 'hidden': !showMenu }">
            <div class="flex-col w-full h-auto justify-end overflow-hidden bg-white rounded-lg md:bg-transparent md:overflow-visible md:rounded-none md:relative md:flex md:flex-row">
                <a href="/" class="inline-flex items-center w-auto h-16 px-6 text-xl font-black leading-none text-gray-900 md:hidden"
                    >{{ config('app.name') }}<span class="text-indigo-600">.</span>
                </a>
                <ul class="flex flex-col items-start justify-end w-full text-center  md:w-2/3 md:mt-0 md:flex-row md:items-center">
                    <x-dyn-nav-link for="home" />
                    <x-dyn-nav-link for="explore" />

                        <div class="md:hidden w-full border-t mx-6 my-2"></div>

                        <span class="hidden   md:inline  w-fit mr-2 select-none opacity-50">
                            |
                        </span>

                    @auth
                    <li class="md:hidden  px-6">
                        <div class="block pt-2 pb-1 text-xs text-gray-400">
                            {{ __('Welcome back, ' . Auth::user()->name . '!') }}
                        </div>
                    </li>
                    <x-dyn-nav-link for="dashboard" />
                    <li class="hidden md:inline">
                        @include('components.navigation-menu-account-dropdown')
                    </li>
                    <li class="md:hidden">
                        <ul>
                            <x-dyn-nav-link class="pt-1.5 pb-1.5" for="profile.show" name="Account Settings" />
                            <x-dyn-nav-link class="pt-1.5 pb-1.5" for="api-tokens.index" name="API Tokens" />

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data class="mb-2">
                                @csrf
                                <x-dyn-nav-link for="logout" name="Log Out" @click.prevent="$root.submit();" />
                            </form>
                        </ul>
                    </li>
                    @endauth
                    @guest
                    <a href="{{ route('login') }}" class="w-full inline-flex px-6 py-2 mr-0 text-gray-700 md:px-0 lg:pl-2 md:mr-4 lg:mr-5 md:w-auto">Sign In</a>
                    <a href="{{ route('register') }}" class="inline-flex items-center w-full px-6 py-3 text-sm font-medium leading-4 text-white bg-indigo-600 md:px-3 md:w-auto md:rounded-full lg:px-5 hover:bg-indigo-500 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-indigo-600 mt-2">Sign Up</a>
                    @endguest
                </ul>
            </div>
        </div>
        <div @click="showMenu = !showMenu" class="absolute right-0 flex flex-col items-center justify-center w-10 h-10 bg-white rounded-full cursor-pointer md:hidden hover:bg-gray-100">
            <svg class="w-6 h-6 text-gray-700" x-show="!showMenu" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" x-cloak="">
                <path d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
            <svg class="w-6 h-6 text-gray-700" x-show="showMenu" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" x-cloak="">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </div>
    </div>
</nav>