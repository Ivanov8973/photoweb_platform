
<x-layout>

        <div class="max-w-2xl mx-auto my-16 p-4 bg-slate-200 dark:bg-slate-900 rounded-lg">

            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{ $photo->name }}
            </h5>

             <img class="h-auto max-w-full rounded-lg" src="{{ asset($photo -> image) }}" alt="{{ $photo -> name }}" />
        </div>

        <div class="mt-5 flex justify-center">    
            
            <form action="{{ route('photos.destroy', $photo) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
            </form>
        </div>
</x-layout>