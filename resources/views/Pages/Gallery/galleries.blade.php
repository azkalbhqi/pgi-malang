<x-layout-app>
    <div class="flex justify-center my-5">
        <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Gallery PGI Malang</h1>
    </div>
    <div class="flex flex-wrap justify-around px-10">
        @foreach ($datas as $data)
        <a class="w-fit px-8" href="{{ route('gallery.event', ['event' => $data['event']]) }}">
            <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl px-8 pb-8 pt-40 max-w-xs mx-auto mt-24">
                <!-- Image with dynamic source -->
                <img src="{{ asset('storage/' . $data['image']) }}" alt="{{ $data['event'] }}" class="absolute min-w-xs inset-0 h-full w-full object-cover">
                
                <!-- Gradient overlay for text contrast -->
                <div class="absolute  inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
                
                <!-- Event Title -->
                <h3 class="z-10 mt-3 text-3xl font-bold text-white">{{ $data['event'] }}</h3>
                
                <!-- Event Description (Placeholder or dynamic description) -->
                <div class="z-10 my-2 gap-y-1 badge badge-outline text-gray-300">
                    {{ $data['categories']->category ?? 'No description available' }} <!-- Example for a dynamic description -->
                </div>
            </article>
        </a>
        


        @endforeach
    </div>
</x-layout-app>
