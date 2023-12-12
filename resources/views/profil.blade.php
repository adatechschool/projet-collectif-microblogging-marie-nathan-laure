<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Votre profil :") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="font-semibold p-6 text-gray-900 dark:text-gray-100">
                    <p class='text-lg pb-4'>Biographie</p>
                    <p class=''>{{$user->biography}}</p>
                </div>
            </div>
        </div>
                        @if (count($profil) > 0)
                            <ul>
                                @foreach($profil as $post)
                                    <li>
                                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-6">
                                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                                <div class="font-semibold p-6 text-gray-900 dark:text-gray-100">
                                                    <p>{{ $post->content }}</p>
                                                    <small>Posted on {{ $post->created_at }}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-6">
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="font-semibold p-6 text-gray-900 dark:text-gray-100">
                                    <p>No posts found.</p>
                                </div>
                            </div>
                        </div>
                        @endif
    </div>
</x-app-layout>
