<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Vos photos :") }}
        </h2>
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="font-normal p-6 text-gray-900 dark:text-gray-100">
                    <p class='text-lg font-bold pb-4'>Images</p>
                </div>
            </div>
        </div>
        <div class="container">
            <h3>View all image</h3><hr>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Image id</th>
                  <th scope="col">Image</th>
                </tr>
              </thead>
              <tbody>
                @foreach($imageData as $data)
                <tr>
                  <td>{{$data->id}}</td>
                  <td>
                 <img src="{{ url('image/'.$data->image) }}"
         style="height: 100px; width: 150px;">
              </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
    </div>
</x-app-layout>
