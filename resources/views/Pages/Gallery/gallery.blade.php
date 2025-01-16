<x-layout-app>
    <div class="flex justify-center my-5">
        <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $event }}</h1>
    </div>

    <section class="">
        
        <div class="flex justify-center">
            <div class="w-3/4 grid grid-cols-2 md:grid-cols-4 gap-4">
                @foreach ($images as $image)
                    <div>
                        <img class="h-auto max-w-full rounded-lg" src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->alt }}">
                    </div>
                @endforeach
            </div>
        </div>
        
    </section>

</x-layout-app>

