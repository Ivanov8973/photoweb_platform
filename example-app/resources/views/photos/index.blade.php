<x-layout>

    <section>
        <div class="mt-10 mr-5 flex justify-end">
            
            <a href="{{ route('photos.create') }}" class="mr-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Add Photo</a>
      
            <a href="{{ route('register') }}" class="mr-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Register</a>

            <a href="{{ route('login') }}" class="mr-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Login</a>
        </div>
    </section>

<h1 class="flex ml-6 items-center text-5xl font-extrabold dark:text-white">Our Latest
    <span class="mt-1 ml-5 bg-blue-100 text-blue-800 text-2xl font-semibold me-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-2">PHOTOS</span></h1>

    <ul>
        <div class="mt-10 grid grid-cols-5 md:grid-cols-3 gap-4">

            @foreach ($photos as $photo )
                    
                    <div class=" p-5">
                        <h5 class="ml-3 mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $photo->name }}</h5>
                
                        <h4 class="ml-3 mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            Uploaded : <br> {{ date('F j, Y / g:i a', strtotime($photo->created_at));}}</h4>

                    <a href="/photos/{{ $photo->id }}" 
                     class="group block max-w-xs mx-auto rounded-lg bg-white ring-1 ring-slate-900/5 shadow-lg space-y-3 hover:bg-sky-500 hover:ring-sky-500"
                    >
                        <img class="h-auto max-w-full rounded-lg" src="{{ asset($photo->image) }}" alt="{{ $photo->name }}" />
                    </a>
                </div>

              @endforeach
        </div>
    </ul>

    <!-- PAGINATION-->
      <ul class="inline-flex m-10 -space-x-px text-base h-10">

             <a href="{{$photos->previousPageUrl()}}" class="flex items-center justify-center px-4 h-10 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
            
            @for( $i=1; $i<=$photos->lastPage(); $i++)

                 <a href="{{$photos->url($i)}}" 
               
                    class="flex  items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                    >
                    {{ $i }}
                </a>
         @endfor

            <a href="{{$photos->nextPageUrl()}}" class="flex items-center justify-center px-4 h-10 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
        </a>
      </ul>
</x-layout>

