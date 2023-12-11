<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Fil d'actualité") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("Bienvenue !") }}
                </div>
            </div>
        </div>
    </div>
    <!-- Où tu veux utiliser le composant -->
    <div>
        <x-card-post 
    title="{{ $latestPost->title }}" 
    image="{{ $latestPost->image }}" 
    description="{{ $latestPost->description }}" 
    userId="{{ $latestPost->user_id }}" 
    createdAt="{{ $latestPost->created_at }}" 
/>
        {{-- <img class="w-full" src="{{ asset($image) }}" alt="{{ $title }}">
 --}}
        @yield('content')
    </div>
</x-app-layout>