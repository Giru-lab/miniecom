<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 dark:text-gray-100 leading-tight">
            {{ __('Seller Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg p-6 flex items-center justify-center">
                <p class="text-gray-900 dark:text-gray-100 text-lg font-medium">
                    {{ __("You're logged in!") }}
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
