<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Sixma News - Latest Updates</title>
</head>
<body>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            800: '#075985',
                            900: '#0c4a6e',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50">
    
<nav class="bg-primary-700 p-4 text-white sticky top-0 z-50 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <div class="flex items-center">
            <span class="text-2xl font-bold mr-8">SIXMA NEWS</span>
            <div class="hidden md:flex space-x-6">
                <a href="{{ route('home') }}" class="hover:text-primary-200 font-semibold">Home</a>
                <a href="{{ route('about') }}" class="hover:text-primary-200 font-semibold">About</a>
                <a href="{{ route('news.index') }}" class="hover:text-primary-200 font-semibold">Berita</a>
                <a href="{{ route('faq') }}" class="hover:text-primary-200 font-semibold">FAQ</a>
            </div>
        </div>

        <div class="flex items-center space-x-4">
            <div class="hidden md:flex items-center space-x-4">
                <input type="search" 
                       placeholder="Search news..." 
                       class="px-4 py-2 rounded-lg bg-primary-600 text-white placeholder-primary-200 focus:outline-none focus:ring-2 focus:ring-primary-400 w-64"
                >
                <button class="px-4 py-2 bg-primary-600 rounded-lg hover:bg-primary-800 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
            <button class="md:hidden p-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <div class="hidden md:block">
            @auth
                <form action="{{ route('logout') }}" method="POST" class="inline ml-4">
                    @csrf
                    <button type="submit" class="bg-primary-600 px-4 py-2 rounded-lg hover:bg-primary-800 transition">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="bg-primary-600 px-4 py-2 rounded-lg hover:bg-primary-800 transition">Login</a>
            @endauth
        </div>
    </div>
</nav>

<!-- Breaking News Ticker -->
<div class="bg-primary-800 text-white py-2 px-4">
    <div class="container mx-auto flex items-center">
        <span class="font-bold mr-4 whitespace-nowrap">BREAKING:</span>
        <div class="overflow-hidden">
            <div class="animate-marquee whitespace-nowrap">
                <span class="mr-8">⚡ Indonesia's economy grows 5.1% in Q2 2023</span>
                <span class="mr-8">⚡ New climate agreement reached at global summit</span>
                <span class="mr-8">⚡ Tech giant announces revolutionary AI breakthrough</span>
                <span class="mr-8">⚡ Sports team wins championship after 20-year drought</span>
            </div>
        </div>
    </div>
</div>

<!-- Hero Section -->
<div class="relative bg-gradient-to-r from-primary-700 to-primary-600 text-white">
    <div class="container mx-auto px-4 py-16">
        <div class="grid md:grid-cols-2 gap-8 items-center">
            <div class="space-y-6">
                <div class="flex space-x-2">
                    <span class="bg-white text-primary-700 px-3 py-1 rounded-full text-sm font-bold">TRENDING</span>
                    <span class="bg-primary-500 text-white px-3 py-1 rounded-full text-sm font-bold">POLITICS</span>
                </div>
                <h1 class="text-4xl md:text-5xl font-bold leading-tight">Global Leaders Gather for Climate Summit Amid Rising Concerns</h1>
                <p class="text-lg text-primary-100">Exclusive coverage as world leaders debate urgent climate action with new proposals on the table.</p>
                <div class="flex items-center space-x-4 text-sm">
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        15 min ago
                    </span>
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        24.5k views
                    </span>
                </div>
                <div class="space-x-4 pt-2">
                    <a href="{{ route('news.index') }}" class="inline-block bg-white text-primary-700 px-6 py-3 rounded-lg font-semibold hover:bg-primary-100 transition">Browse News</a>
                    <a href="#latest" class="inline-block border-2 border-white px-6 py-3 rounded-lg font-semibold hover:bg-primary-700 transition">Latest Stories</a>
                </div>
            </div>
            <div class="relative">
                <div class="absolute -inset-4 bg-primary-800 rounded-lg transform rotate-3"></div>
                <img src="https://images.unsplash.com/photo-1563986768609-322da13575f3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                     alt="News Coverage" 
                     class="relative rounded-lg shadow-xl w-full h-96 object-cover">
            </div>
        </div>
    </div>
    <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-gray-50"></div>
</div>

<!-- Main Content -->
<div class="container mx-auto py-8 px-4">
    <!-- Featured Categories -->
    <div class="mb-12">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-2">Browse Categories</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 lg:grid-cols-7 gap-4">
            <a href="#" class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition text-center">
                <div class="bg-primary-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                    </svg>
                </div>
                <span class="font-medium text-gray-700">Politics</span>
            </a>
            <a href="#" class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition text-center">
                <div class="bg-primary-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <span class="font-medium text-gray-700">Technology</span>
            </a>
            <a href="#" class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition text-center">
                <div class="bg-primary-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <span class="font-medium text-gray-700">Business</span>
            </a>
            <a href="#" class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition text-center">
                <div class="bg-primary-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                </div>
                <span class="font-medium text-gray-700">Science</span>
            </a>
            <a href="#" class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition text-center">
                <div class="bg-primary-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M17 4v16M3 8h4m10 0h4M3 12h18M3 16h4m10 0h4M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z" />
                    </svg>
                </div>
                <span class="font-medium text-gray-700">Entertainment</span>
            </a>
            <a href="#" class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition text-center">
                <div class="bg-primary-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <span class="font-medium text-gray-700">Health</span>
            </a>
            <a href="#" class="bg-white p-4 rounded-lg shadow-sm hover:shadow-md transition text-center">
                <div class="bg-primary-100 w-12 h-12 rounded-full flex items-center justify-center mx-auto mb-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z" />
                    </svg>
                </div>
                <span class="font-medium text-gray-700">Weather</span>
            </a>
        </div>
    </div>

    <!-- Latest News Section -->
    <div class="mb-12" id="latest">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800 border-b pb-2">Latest News</h2>
            <a href="{{ route('news.index') }}" class="text-primary-700 hover:text-primary-900 font-medium">View All →</a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($news as $item)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    @if ($item->image)
                        <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}" 
                             class="w-full h-48 object-cover">
                    @endif
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-xs font-semibold px-2 py-1 bg-primary-100 text-primary-700 rounded-full">
                                {{ $item->status }}
                            </span>
                            <span class="text-sm text-gray-500">
                                {{ $item->created_at->format('M d, Y') }}
                            </span>
                        </div>
                        <h3 class="text-xl font-bold mb-2 hover:text-primary-600 transition">{{ $item->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($item->content, 100) }}</p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-gray-300 rounded-full mr-2"></div>
                                <span class="text-sm text-gray-600">{{ $item->user->name }}</span>
                            </div>
                            <a href="#" class="text-primary-600 hover:text-primary-800 text-sm font-semibold">Read More →</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12 bg-white rounded-lg">
                    <p class="text-gray-500 text-lg">No news available at the moment.</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Popular News Section -->
    <div class="mb-12">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800 border-b pb-2">Most Popular</h2>
            <a href="#" class="text-primary-700 hover:text-primary-900 font-medium">View All →</a>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <!-- Featured Big Card -->
            <div class="lg:col-span-2 bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1581092921461-39b2f2f8a1e6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                         alt="Tech News" 
                         class="w-full h-64 object-cover">
                    <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-6">
                        <span class="text-xs font-semibold px-2 py-1 bg-primary-600 text-white rounded-full">
                            TECHNOLOGY
                        </span>
                        <h3 class="text-xl font-bold text-white mt-2">New AI Breakthrough Could Revolutionize Healthcare Industry</h3>
                        <div class="flex items-center text-white text-sm mt-2">
                            <span>John Doe</span>
                            <span class="mx-2">•</span>
                            <span>2 hours ago</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Popular News List -->
            <div class="lg:col-span-2 space-y-6">
                <div class="flex bg-white rounded-lg shadow-sm hover:shadow-md transition p-4">
                    <div class="w-24 h-24 flex-shrink-0">
                        <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                             alt="News" 
                             class="w-full h-full object-cover rounded">
                    </div>
                    <div class="ml-4">
                        <span class="text-xs font-semibold px-2 py-1 bg-primary-100 text-primary-700 rounded-full">
                            BUSINESS
                        </span>
                        <h4 class="font-bold text-gray-800 mt-1 hover:text-primary-600">Major Merger Creates New Market Leader in Tech Sector</h4>
                        <div class="flex items-center text-gray-500 text-xs mt-1">
                            <span>Jane Smith</span>
                            <span class="mx-2">•</span>
                            <span>4 hours ago</span>
                        </div>
                    </div>
                </div>
                
                <div class="flex bg-white rounded-lg shadow-sm hover:shadow-md transition p-4">
                    <div class="w-24 h-24 flex-shrink-0">
                        <img src="https://images.unsplash.com/photo-1506126613408-eca07ce68773?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" 
                             alt="News" 
                             class="w-full h-full object-cover rounded">
                    </div>
                    <div class="ml-4">
                        <span class="text-xs font-semibold px-2 py-1 bg-primary-100 text-primary-700 rounded-full">
                            SPORTS
                        </span>
                        <h4 class="font-bold text-gray-800 mt-1 hover:text-primary-600">National Team Advances to Finals After Dramatic Win</h4>
                        <div class="flex items-center text-gray-500 text-xs mt-1">
                            <span>Mike Johnson</span>
                            <span class="mx-2">•</span>
                            <span>6 hours ago</span>
                        </div>
                    </div>
                </div>
                
                <div class="flex bg-white rounded-lg shadow-sm hover:shadow-md transition p-4">
                    <div class="w-24 h-24 flex-shrink-0">
                        <img src="https://images.unsplash.com/photo-1575505586569-646b2ca898fc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1586&q=80" 
                             alt="News" 
                             class="w-full h-full object-cover rounded">
                    </div>
                    <div class="ml-4">
                        <span class="text-xs font-semibold px-2 py-1 bg-primary-100 text-primary-700 rounded-full">
                            HEALTH
                        </span>
                        <h4 class="font-bold text-gray-800 mt-1 hover:text-primary-600">New Study Reveals Benefits of Mediterranean Diet</h4>
                        <div class="flex items-center text-gray-500 text-xs mt-1">
                            <span>Sarah Williams</span>
                            <span class="mx-2">•</span>
                            <span>8 hours ago</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Video News Section -->
    <div class="mb-12">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800 border-b pb-2">Video News</h2>
            <a href="#" class="text-primary-700 hover:text-primary-900 font-medium">View All →</a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1571115177098-24ec42ed204d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1587&q=80" 
                         alt="Video News" 
                         class="w-full h-40 object-cover">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-12 h-12 bg-primary-600 rounded-full flex items-center justify-center opacity-90 hover:opacity-100 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <span class="text-xs font-semibold px-2 py-1 bg-primary-100 text-primary-700 rounded-full">
                        TECHNOLOGY
                    </span>
                    <h3 class="font-bold text-gray-800 mt-2 hover:text-primary-600">Hands-on with the Latest Smartphone Release</h3>
                    <div class="flex items-center text-gray-500 text-xs mt-2">
                        <span>1.2M views</span>
                        <span class="mx-2">•</span>
                        <span>2 days ago</span>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                         alt="Video News" 
                         class="w-full h-40 object-cover">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-12 h-12 bg-primary-600 rounded-full flex items-center justify-center opacity-90 hover:opacity-100 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <span class="text-xs font-semibold px-2 py-1 bg-primary-100 text-primary-700 rounded-full">
                        SCIENCE
                    </span>
                    <h3 class="font-bold text-gray-800 mt-2 hover:text-primary-600">Exploring the Depths: New Ocean Species Discovered</h3>
                    <div class="flex items-center text-gray-500 text-xs mt-2">
                        <span>850K views</span>
                        <span class="mx-2">•</span>
                        <span>3 days ago</span>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1498837167922-ddd27525d352?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                         alt="Video News" 
                         class="w-full h-40 object-cover">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-12 h-12 bg-primary-600 rounded-full flex items-center justify-center opacity-90 hover:opacity-100 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <span class="text-xs font-semibold px-2 py-1 bg-primary-100 text-primary-700 rounded-full">
                        FOOD
                    </span>
                    <h3 class="font-bold text-gray-800 mt-2 hover:text-primary-600">5 Easy Recipes for Busy Weeknights</h3>
                    <div class="flex items-center text-gray-500 text-xs mt-2">
                        <span>1.5M views</span>
                        <span class="mx-2">•</span>
                        <span>5 days ago</span>
                    </div>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
                         alt="Video News" 
                         class="w-full h-40 object-cover">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-12 h-12 bg-primary-600 rounded-full flex items-center justify-center opacity-90 hover:opacity-100 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <span class="text-xs font-semibold px-2 py-1 bg-primary-100 text-primary-700 rounded-full">
                        BUSINESS
                    </span>
                    <h3 class="font-bold text-gray-800 mt-2 hover:text-primary-600">How to Start a Successful Online Business</h3>
                    <div class="flex items-center text-gray-500 text-xs mt-2">
                        <span>2.3M views</span>
                        <span class="mx-2">•</span>
                        <span>1 week ago</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter Subscription -->
<div class="bg-primary-700 text-white py-12">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-4">Stay Updated</h2>
        <p class="text-lg text-primary-100 mb-8 max-w-2xl mx-auto">Subscribe to our newsletter to receive the latest news and updates directly to your inbox.</p>
        <div class="max-w-md mx-auto flex">
            <input type="email" 
                   placeholder="Your email address" 
                   class="flex-grow px-4 py-3 rounded-l-lg focus:outline-none text-gray-800">
            <button class="bg-primary-900 hover:bg-primary-800 px-6 py-3 rounded-r-lg font-semibold transition">
                Subscribe
            </button>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-gray-800 text-gray-300 py-12">
</body>
</html>
    