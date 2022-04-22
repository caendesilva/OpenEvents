<x-jet-form-section submit="updateProjectIdentifier">
    <x-slot name="title">
        {{ __('Project Identifier') }}
    </x-slot>

    <x-slot name="description">
        {{ __('This is the identifier used for your event metrics dashboard as well as your API endpoint.') }}
    </x-slot>

    <x-slot name="form">
        <!-- ID -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="id">
                {{ __('Your Project ID') }} <sup title="Input is readonly unless you press the change button">(readonly)</sup>
            </x-jet-label>
            <x-jet-input id="id" type="text" class="mt-1 block w-full" value="{{ Auth::user()->humanoID() }}" readonly/>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Changed.') }}
        </x-jet-action-message>

        <x-jet-warning-button wire:loading.attr="disabled" onclick="confirm('Are you sure you want to do this? Any existing integrations and links will break.')">
            {{ __('@todo: Change') }}
        </x-jet-warning-button>
    </x-slot>
</x-jet-form-section>
