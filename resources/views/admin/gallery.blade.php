<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Галерея') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                
                <div class="p-6 lg:p-8 bg-white dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent border-b border-gray-200 dark:border-gray-700">

                    <div class="col-span-6 sm:col-span-4 mb-6">
                        <form action="{{ route('addGallery') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            
                            <div class="px-4 py-5 bg-white dark:bg-gray-800 sm:p-6 shadow {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
                                <div class="grid grid-cols-6 gap-6">
                                    
                                    <div class="col-span-6 sm:col-span-4">
                                        <input type="file" 
                                            multiple="true"
                                            accept=".jpg,.png,.jpeg" 
                                            name="image[]" />
                                    </div>
    
                                    <div class="col-span-6 sm:col-span-4">
                                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150">Добавить</button>
                                    </div>
    
                                </div>
                            </div>
    
                        </form>
                    </div>
                    
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Изображение</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($gallery as $galleryItem)
                                <tr>
                                    <td>{{ $galleryItem->id }}</td>
                                    <td>
                                        <img src="/storage/{{ $galleryItem->image }}" width="150" />
                                    </td>
                                    <td>
                                        <form action="{{ route('deleteGallery', $galleryItem->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-red-500" type="submit">Удалить</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
        <style>
            table {
                width: 100%;
                text-align: left;
                color: white;
            }
            table tr {
                border-bottom: 1px solid white;
            }
        </style>
    </div>
</x-app-layout>