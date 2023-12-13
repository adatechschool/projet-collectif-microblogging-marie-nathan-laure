<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Biographie") }}
        </h2>
        <div class="font-normal p-6 text-gray-900 dark:text-gray-100">
            <p class='text-justify'>{{$user->biography}}</p>
        </div>
    </x-slot>

    <div class="">
        @if (count($profil) > 0)
            <ul>
                @foreach($profil as $post)
                    <li>
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-6">
                            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="font-normal p-6 text-gray-900 text-justify dark:text-gray-100">
                                    <img src="{{ asset('image/' . $post->image->image) }}" alt="Image">
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
