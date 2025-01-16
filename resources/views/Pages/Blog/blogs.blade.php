<x-layout-app>
    <div class="flex justify-center my-5">
        <h1 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">PGI Malang's Blog</h1>
    </div>
    
    {{-- Filters --}}
    <div class="flex justify-center my-4">
        <form method="GET" action="{{ route('blogs.index') }}" class="flex space-x-4">
            {{-- Category Filter --}}
            <select name="category_id" class="border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white">
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->category }}
                    </option>
                @endforeach
            </select>
    
            {{-- Submit Button --}}
            <button type="submit" class="px-4 py-2 text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Filter
            </button>
        </form>
    </div>
    
    {{-- Blog Posts --}}
    <div class="flex flex-wrap justify-around max-w-screen-lg mx-auto">
        @foreach ($blogs as $blog)
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
    </div>
    
    <div class="flex justify-center">
        <nav aria-label="Page navigation example">
            <ul class="inline-flex -space-x-px text-sm">
                {{-- Previous Page Link --}}
                @if ($blogs->onFirstPage())
                    <li>
                        <span class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                            Previous
                        </span>
                    </li>
                @else
                    <li>
                        <a href="{{ $blogs->previousPageUrl() }}" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            Previous
                        </a>
                    </li>
                @endif
        
                {{-- Pagination Elements --}}
                @foreach ($blogs->links()->elements[0] as $page => $url)
                    @if ($page == $blogs->currentPage())
                        <li>
                            <span aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">
                                {{ $page }}
                            </span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $url }}" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                {{ $page }}
                            </a>
                        </li>
                    @endif
                @endforeach
        
                {{-- Next Page Link --}}
                @if ($blogs->hasMorePages())
                    <li>
                        <a href="{{ $blogs->nextPageUrl() }}" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            Next
                        </a>
                    </li>
                @else
                    <li>
                        <span class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                            Next
                        </span>
                    </li>
                @endif
            </ul>
        </nav>
        
    </div>
</x-layout-app>