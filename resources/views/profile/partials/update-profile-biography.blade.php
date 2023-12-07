<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Modifier la biographie') }}
        </h2>
    </header>

    <form>
        {{-- @TODO nous devons décommenter cette partie du code lorsque la route pour update sera --}}
    {{-- method="post" action="{{ route('biography.update') }}" class="mt-6 space-y-6"> --}}
        {{-- @csrf --}}
        {{-- @method('put') --}}

        <div>
            <x-input-label for="biography"/>

            <textarea
                id="biography"
                name="biography"
                rows="4"
                class="mt-1 block w-full border rounded-md shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 dark:bg-gray-900 dark:border-gray-600 dark:focus:border-primary-400 dark:focus:ring-dark"
            >{{ old('biography') }}</textarea>

            @error('biography')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-4 mt-6">
            <x-primary-button>{{ __('Enregistrer') }}</x-primary-button>

            @if (session('status') === 'biography-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Modification enregistrée.') }}</p>
            @endif
        </div>
    </form>
</section>
