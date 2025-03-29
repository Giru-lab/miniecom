<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>
    
    <div class="py-10">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md sm:rounded-lg p-6 flex items-center justify-center">
                <p class="text-gray-900 dark:text-gray-100 text-lg font-medium">
                    {{ __("Welcome back, you're logged in!") }}
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
