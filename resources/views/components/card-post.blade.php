<div class="max-w-sm rounded overflow-hidden shadow-lg">

    <img class="w-full" src="{{ asset($image) }}" alt="{{ $description}}">
    <div class="px-6 py-4">
        <p class="text-gray-700 text-base">{{ $description }}</p>
    </div>
    <div class="px-6 py-4 pg-2">
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#Dog</span>
        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#Flowers</span>
    </div>
    <div class="px-6 py-4">
        <p class="text-gray-500 text-sm">Posté par User ID: {{ $userId }} le {{ $createdAt }}</p>
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Modifier
        </button>
        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
            Supprimer
        </button>
    </div>