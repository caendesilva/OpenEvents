<x-guest-layout>
    <!-- Components by Tails -->
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
    <!-- Section 1 -->
    <section class="w-full px-6 pb-12 antialiased bg-white">
        <div class="">
            <nav class="relative z-50 h-24 select-none" x-data="{ showMenu: false }">
                <div class="container relative max-w-full flex flex-wrap items-center justify-between h-24 mx-auto overflow-hidden font-medium border-b border-gray-200 md:overflow-visible lg:justify-center sm:px-4 md:px-2">
                    <div class="flex items-center justify-start w-1/4 h-full pr-4">
                        <a href="#_" class="inline-block py-4 md:py-0">
                            <span class="p-1 text-xl font-black leading-none text-gray-900">
                                <span>{{ config('app.name') }}</span><span class="text-indigo-600">.</span>
                            </span>
                        </a>
                    </div>
                    <div class="top-0 left-0 items-start hidden w-full h-full p-4 text-sm bg-gray-900 bg-opacity-50 md:items-center md:w-3/4 lg:text-base md:bg-transparent md:p-0 md:relative md:flex" :class="{'flex fixed': showMenu, 'hidden': !showMenu }">
                        <div class="flex-col w-full h-auto justify-end overflow-hidden bg-white rounded-lg md:bg-transparent md:overflow-visible md:rounded-none md:relative md:flex md:flex-row">
                            <a href="#_" class="inline-flex items-center w-auto h-16 px-6 text-xl font-black leading-none text-gray-900 md:hidden"
                                >{{ config('app.name') }}<span class="text-indigo-600">.</span>
                            </a>
                            <div class="flex flex-col items-start justify-end w-full space-x-6 text-center lg:space-x-8 md:w-2/3 md:mt-0 md:flex-row md:items-center">
                                <a href="/" class="inline-block w-full py-2 mx-0 ml-6 font-medium text-left text-indigo-600 md:ml-0 md:w-auto md:px-0 md:mx-2 lg:mx-3 md:text-center">Home</a>
                                <a href="{{ route('projects.index') }}" class="inline-block w-full py-2 mx-0 font-medium text-left text-gray-700 md:w-auto md:px-0 md:mx-2 hover:text-indigo-600 lg:mx-3 md:text-center">Explore</a>
                                @auth
                                <a href="{{ route('dashboard') }}" class="inline-block w-full py-2 mx-0 font-medium text-left text-gray-700 md:w-auto md:px-0 md:mx-2 hover:text-indigo-600 lg:mx-3 md:text-center">Dashboard</a>
                                @endauth
                            </div>
                            @guest

                            <div class="flex flex-col items-start justify-end w-full pt-4 pl-8 md:items-center md:w-fit md:flex-row md:py-0">
                                <a href="{{ route('login') }}" class="w-full px-6 py-2 mr-0 text-gray-700 md:px-0 lg:pl-2 md:mr-4 lg:mr-5 md:w-auto">Sign In</a>
                                <a href="{{ route('register') }}" class="inline-flex items-center w-full px-6 py-3 text-sm font-medium leading-4 text-white bg-indigo-600 md:px-3 md:w-auto md:rounded-full lg:px-5 hover:bg-indigo-500 focus:outline-none md:focus:ring-2 focus:ring-0 focus:ring-offset-2 focus:ring-indigo-600">Sign Up</a>
                            </div>
                            @endguest
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
            <!-- Main Hero Content -->
            <div class="container max-w-lg px-4 py-32 lg:py-40 mx-auto text-left md:max-w-none md:text-center">
                <h1 class="text-5xl font-extrabold leading-10 tracking-tight text-left text-gray-900 md:text-center sm:leading-none md:text-6xl lg:text-7xl">
                    <span class="inline md:block">Free Event-Driven</span>
                    <span class="relative mt-2 text-transparent bg-clip-text bg-gradient-to-br from-indigo-600 to-indigo-500 md:inline-block"> Analytics Platform</span>
                </h1>
                <div class="mx-auto mt-5 text-gray-500 md:mt-12 md:max-w-lg md:text-center lg:text-lg">
                    Fully transparent and open-source analytics. <br />
                    100% free for personal and open source projects.
                </div>
                <div class="flex flex-row justify-center items-center mt-12 text-center">
                    <span class="relative inline-flex w-full mx-2 md:w-auto">
                        <a href="#about" class="inline-flex items-center justify-center w-full px-4 py-3 text-base font-bold leading-6 text-indigo-600 border-indigo-600 border border-transparent rounded-full md:w-auto hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600"> Learn More </a>
                    </span>
                    <span class="relative inline-flex w-full mx-2 md:w-auto">
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center w-full px-4 py-3 text-base font-bold leading-6 text-white bg-indigo-600 border border-transparent rounded-full md:w-auto hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600"> Sign Up </a>
                        <a href="#about-pricing" class="absolute top-0 right-0 px-2 py-1 -mt-3 -mr-6 text-xs font-medium leading-tight text-white bg-green-400 rounded-full">It's free*</a>
                    </span>
                </div>
            </div>
            <!-- End Main Hero Content -->
        </div>
    </section>
    <!-- Section 2 -->
    <section id="about" class="relative py-16 bg-white min-w-screen animation-fade animation-delay">
        <div class="container px-8 mx-auto sm:px-12 xl:px-5">
            <p class="text-xs font-bold text-left text-pink-500 uppercase sm:mx-6 sm:text-center sm:text-normal sm:font-bold">Got a Question? We’ve got answers.</p>
            <h3 class="text-2xl font-bold text-left text-gray-800 sm:text-3xl md:text-4xl lg:text-5xl sm:text-center sm:mx-0 mt-4">Frequently Asked Questions</h3>
            <div class="w-full px-6 py-6 mx-auto mt-10 bg-white border border-gray-200 rounded-lg sm:px-8 md:px-12 sm:py-8 sm:shadow lg:w-5/6 xl:w-2/3">
                <h3 class="text-lg font-bold text-purple-500 sm:text-xl md:text-2xl mb-3">How does it work?</h3>
                {!! \App\Core\MarkdownSection::parse('faq/how-does-it-work', 'max-w-fit') !!}
            </div>
            <div id="about-pricing" class="w-full px-6 py-6 mx-auto mt-10 bg-white border border-gray-200 rounded-lg sm:px-8 md:px-12 sm:py-8 sm:shadow lg:w-5/6 xl:w-2/3">
                <h3 class="text-lg font-bold text-purple-500 sm:text-xl md:text-2xl mb-3">What does it cost?</h3>
                {!! \App\Core\MarkdownSection::parse('faq/what-does-it-cost', 'max-w-fit') !!}
            </div>
            <div class="w-full px-6 py-6 mx-auto mt-10 bg-white border border-gray-200 rounded-lg sm:px-8 md:px-12 sm:py-8 sm:shadow lg:w-5/6 xl:w-2/3">
                <h3 class="text-lg font-bold text-purple-500 sm:text-xl md:text-2xl mb-3">How do I get started?</h3>
                {!! \App\Core\MarkdownSection::parse('faq/how-do-i-get-started', 'max-w-fit') !!}
            </div>
            <div class="w-full px-6 py-6 mx-auto mt-10 bg-white border border-gray-200 rounded-lg sm:px-8 md:px-12 sm:py-8 sm:shadow lg:w-5/6 xl:w-2/3">
                <h3 class="text-lg font-bold text-purple-500 sm:text-xl md:text-2xl mb-3">What data can I submit?</h3>
                {!! \App\Core\MarkdownSection::parse('faq/what-data-can-i-submit', 'max-w-fit') !!}
            </div>
        </div>
    </section>
</x-guest-layout>