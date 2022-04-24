<div class="relative text-left">
    <x-jet-dropdown align="right" width="48">
        <x-slot name="trigger">
            <span class="inline-flex rounded-md">
                <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent focus:outline-none transition font-medium text-gray-700 hover:text-indigo-600" style="background: none; border: none;">
                    {{ Auth::user()->name }}

                    <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </span>
        </x-slot>

        <x-slot name="content">
            <!-- Account Management -->
            <div class="block px-4 py-2 text-xs text-gray-400">
                {{ __('Manage Account') }}
            </div>

            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                {{ __('Account Settings') }}
            </x-jet-dropdown-link>

            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                {{ __('API Tokens') }}
            </x-jet-dropdown-link>

            <div class="border-t border-gray-100"></div>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf

                <x-jet-dropdown-link href="{{ route('logout') }}"
                         @click.prevent="$root.submit();">
                    {{ __('Log Out') }}
                </x-jet-dropdown-link>
            </form>
        </x-slot>
    </x-jet-dropdown>
</div>