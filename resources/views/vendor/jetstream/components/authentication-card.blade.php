<div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 -mb-2 px-6 py-4 bg-orange-400 shadow-sm overflow-hidden sm:rounded-lg">
        <strong class="text-orange-900">
            Please note that registrations are currently closed during the beta stage.
        </strong>
        <span class="text-orange-900">
            Accounts need to be approved by an administrator to be activated.
        </span>
        <a href="/#about-beta" class="text-indigo-600">Learn more</a>
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
