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
            
            <!-- Main Hero Content -->
            <div class="container max-w-lg px-4 py-32 lg:py-38 mx-auto text-left md:max-w-none md:text-center">
                <h1 class="text-5xl font-extrabold leading-10 tracking-tight text-left text-gray-900 md:text-center sm:leading-none md:text-6xl lg:text-7xl">
                    <span class="block mb-2 sm:mb-0 text-4xl md:text-5xl lg:text-6xl">Free Event-Driven</span>
                    <span class="relative mt-2 text-transparent bg-clip-text bg-gradient-to-br from-indigo-600 to-indigo-500 md:inline-block py-4"> Analytics Platform</span>
                </h1>
                <div class="mx-auto mt-5 text-gray-500 md:mt-8 md:max-w-lg md:text-center lg:text-lg">
                    Fully transparent and open-source analytics. <br />
                    100% free for personal and open source projects.
                </div>
                <div class="flex flex-row justify-center items-center mt-10 text-center">
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
            <div class="w-full px-6 py-6 mx-auto mt-10 bg-white border border-gray-200 rounded-lg sm:px-8 md:px-12 sm:py-8 sm:shadow lg:w-5/6 xl:w-2/3">
                <h3 class="text-lg font-bold text-purple-500 sm:text-xl md:text-2xl mb-3">Can I download my data?</h3>
                {!! \App\Core\MarkdownSection::parse('faq/can-i-download-my-data', 'max-w-fit') !!}
            </div>
        </div>
    </section>
</x-guest-layout>