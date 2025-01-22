<x-layout-app>
   
    <section class="  bg-center bg-cover bg-no-repeat bg-gray-300 bg-blend-multiply min-h-screen w-full" style="background-image: url('https://ibb.co.com/sjxnYCb');">
        <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl">Official Website PGI Kota Malang</h1>
            <p class="mb-8 text-lg font-normal text-gray-300 lg:text-xl sm:px-16 lg:px-48">Kami berkomitmen mengembangkan golf di Indonesia, mencetak atlet berprestasi, serta mempererat persaudaraan. Lebih dari sekadar kompetisi, golf adalah tentang karakter, sportivitas, dan kebersamaan.</p>
            
        </div>
    </section>
    <section class="my-5">
        <div class="flex justify-center my-10">
            <a href="/blogs">
                <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">PGI Malang's Activity</h1>
            </a>
        </div>
    
        <div class="flex flex-wrap justify-around max-w-screen-lg mx-auto">
            @if ($latestBlogs->isEmpty())
                @for ($i = 0; $i < 2; $i++)
                <article class="p-1 mb-5 w-fit">
                    <div class="max-w-sm min-h-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col">
                        <a href="/blogs">
                            <img class="rounded-t-lg" src="https://plus.unsplash.com/premium_photo-1679710943658-1565004c00ac?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8Z29sZnxlbnwwfHwwfHx8MA%3D%3D" alt=""/>
                        </a>
                        <div class="p-5 flex-grow">
                            <a href="/blogs">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">No Post yet..</h5>
                                <div>
                                    <a href="/">
                                        <div class="badge badge-outline mb-2">empty</div>
                                    </a>
                                    <a href="/">
                                        <div class="badge badge-outline mb-2">empty</div>
                                    </a>
                                </div>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Sorry, we have no post yet</p>
                        </div>
                        <div class="flex justify-end p-4 bg-white dark:bg-gray-800 bottom-0">
                            <a href="/blogs" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Read more
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
                @endfor
            @else
                @foreach ($latestBlogs as $blog)
                    <article class="p-1 mb-5 w-fit">
                        <div class="max-w-sm min-h-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col">
                            <a href="/blogs/{{$blog['slug']}}">
                                <img class="rounded-t-lg" src="{{ asset('storage/'.$blog['image']) }}" alt="{{ $blog->alt }}" />
                            </a>
                            <div class="p-5 flex-grow">
                                <a href="/blogs/{{$blog['slug']}}">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $blog['title'] }}</h5>
                                    <div>
                                        <a href="?category_id={{ $blog->category->id }}">
                                            <div class="badge badge-outline mb-2">{{ $blog->category->category }}</div>
                                        </a>
                                        <a href="?author_id={{ $blog->user->id }}">
                                            <div class="badge badge-outline mb-2">{{ $blog->user->name }}</div>
                                        </a>
                                    </div>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ Str::limit($blog['body'], 100) }}</p>
                            </div>
                            <div class="flex justify-end p-4 bg-white dark:bg-gray-800 bottom-0">
                                <a href="/blogs/{{$blog['slug']}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Read more
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            @endif
        </div>
    </section>
    
    <section class="">
        <div class="flex justify-center my-10">
            <a href="/gallery">
                <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">PGI Malang's Gallery</h1>
            </a>
        </div>
        <div class="flex justify-center">
            <div class="w-1/2 grid grid-cols-2 md:grid-cols-4 gap-4">
                @if ($latestImages->isEmpty())
                    @for ($i = 0; $i < 4; $i++) {{-- Adjusted to 4 for better grid balance --}}
                        <div>
                            <img class="h-auto max-w-full rounded-lg" src="https://picsum.photos/200/300?random={{ $i }}" alt="Placeholder Image">
                        </div>
                    @endfor
                @else
                    @foreach ($latestImages as $image)
                        <div>
                            <img class="h-auto max-w-full rounded-lg" src="{{ asset('storage/' . $image->image) }}" alt="{{ $image->alt }}">
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    

  
</x-layout-app>