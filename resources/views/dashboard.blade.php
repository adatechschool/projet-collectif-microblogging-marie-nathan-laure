<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Fil d'actualité") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mx-auto px-4 py-6">
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Nouvelle publication</h2>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ url('/post/store') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

                        <div class="mb-4">
                            <textarea class="mt-1 block w-full border rounded-md shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 dark:bg-gray-900 dark:border-gray-600 dark:focus:border-primary-400 dark:focus:ring-dark dark:text-gray-100"
                                id="content" name="content" rows="4" required>{{ old('content') }}</textarea>
                        </div>

                        <!-- Autres champs du formulaire -->

                        <x-primary-button>{{ __('Publier') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
