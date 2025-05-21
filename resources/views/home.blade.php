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

    <!-- Latest News Section -->
<div class="mb-12" id="latest">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800 border-b pb-2">Berita Terbaru</h2>
        <a href="{{ route('news.index') }}" class="text-primary-700 hover:text-primary-900 font-medium">Lihat Semua →</a>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($latestNews as $item)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                @if ($item->image)
                    <!-- Perubahan utama di bagian src gambar -->
                    @if(Str::startsWith($item->image, ['http://', 'https://']))
                        <img src="{{ $item->image }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
                    @else
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
                    @endif
                @else
                    <!-- Placeholder jika gambar tidak ada -->
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-gray-500">No Image</span>
                    </div>
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
                        <a href="{{ route('news.show', $item->id) }}" class="text-primary-600 hover:text-primary-800 text-sm font-semibold">Baca Selengkapnya →</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center py-12 bg-white rounded-lg">
                <p class="text-gray-500 text-lg">Tidak ada berita terbaru saat ini.</p>
            </div>
        @endforelse
    </div>
</div>

   <!-- Popular News Section -->
<div class="mb-12">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800 border-b pb-2">Berita Populer</h2>
        <a href="" class="text-primary-700 hover:text-primary-900 font-medium">Lihat Semua →</a>
    </div>
    
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        @forelse ($popularNews as $item)
            @if ($loop->first)
                <!-- Featured Big Card -->
                <div class="lg:col-span-2 bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <div class="relative">
                        @if($item->image)
                            @if(Str::startsWith($item->image, ['http://', 'https://']))
                                <img src="{{ $item->image }}" alt="{{ $item->title }}" 
                                     class="w-full h-64 object-cover">
                            @else
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" 
                                     class="w-full h-64 object-cover">
                            @endif
                        @else
                            <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-500">No Image Available</span>
                            </div>
                        @endif
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-6">
                            <span class="text-xs font-semibold px-2 py-1 bg-primary-600 text-white rounded-full">
                                {{ strtoupper($item->section) }}
                            </span>
                            <h3 class="text-xl font-bold text-white mt-2">{{ $item->title }}</h3>
                            <div class="flex items-center text-white text-sm mt-2">
                                <span>{{ $item->user->name }}</span>
                                <span class="mx-2">•</span>
                                <span>{{ $item->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('news.index', $item->slug) }}" class="absolute inset-0" aria-label="Read more about {{ $item->title }}"></a>
                </div>
            
            @else
                <!-- Popular News List -->
                <div class="flex bg-white rounded-lg shadow-sm hover:shadow-md transition p-4">
                    <div class="w-24 h-24 flex-shrink-0">
                        @if($item->image)
                            @if(Str::startsWith($item->image, ['http://', 'https://']))
                                <img src="{{ $item->image }}" alt="{{ $item->title }}" 
                                     class="w-full h-full object-cover rounded">
                            @else
                                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" 
                                     class="w-full h-full object-cover rounded">
                            @endif
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center rounded">
                                <span class="text-gray-500 text-xs">No Image</span>
                            </div>
                        @endif
                    </div>
                    <div class="ml-4 flex flex-col justify-between">
                        <div>
                            <span class="text-xs font-semibold px-2 py-1 bg-primary-100 text-primary-700 rounded-full">
                                {{ strtoupper($item->section) }}
                            </span>
                            <h4 class="font-bold text-gray-800 mt-1 hover:text-primary-600">
                                <a href="{{ route('news.index', $item->slug) }}">{{ $item->title }}</a>
                            </h4>
                        </div>
                        <div class="flex items-center text-gray-500 text-xs mt-1">
                            <span>{{ $item->user->name }}</span>
                            <span class="mx-2">•</span>
                            <span>{{ $item->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                </div>
            @endif
        @empty
            <div class="col-span-4 text-center py-12 bg-white rounded-lg">
                <p class="text-gray-500 text-lg">Tidak ada berita populer saat ini.</p>
            </div>
        @endforelse
    </div>
</div>
            
        </div>
    </div>
    
</div>

<!-- Kegiatan Ekstrakurikuler -->
<div class="py-12 px-4 max-w-6xl mx-auto bg-gray-50">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-3xl font-bold text-gray-900">Kegiatan Ekstrakurikuler</h2>
            <p class="text-gray-600 mt-2">Temukan berbagai kegiatan ekstrakurikuler yang mendukung pengembangan bakat dan minat siswa.</p>
        </div>
        <a href="#" class="text-primary-700 hover:text-primary-900 font-medium text-lg">Lihat Semua →</a>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse ($extracurricularNews as $item)
            <div class="bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition duration-300">
                <div class="relative">
                    <img src="{{ $item->image ? asset('storage/' . $item->image) : 'https://via.placeholder.com/300x200' }}" 
                         alt="{{ $item->title }}" 
                         class="w-full h-48 object-cover">
                    <span class="absolute top-4 left-4 text-xs font-semibold px-2 py-1 bg-primary-600 text-white rounded-full">
                        {{ strtoupper($item->category ?? 'EKSTRAKURIKULER') }}
                    </span>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-primary-700 mb-2 hover:text-primary-900">{{ $item->title }}</h3>
                    <p class="text-gray-600 text-sm mb-4">{{ Str::limit($item->content, 100) }}</p>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <div class="w-8 h-8 bg-gray-300 rounded-full mr-2"></div>
                            <span class="text-sm text-gray-600">{{ $item->user->name }}</span>
                        </div>
                        <a href="#" class="text-primary-600 hover:text-primary-800 text-sm font-semibold">Baca Selengkapnya →</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-4 text-center py-12 bg-white rounded-lg shadow-md">
                <p class="text-gray-500 text-lg">Tidak ada kegiatan ekstrakurikuler saat ini.</p>
            </div>
        @endforelse
    </div>
</div>

<!-- Daftar Guru -->
<div class="container mx-auto px-4 py-8">
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-800 mb-2">Daftar Guru</h2>
        <p class="text-gray-600">Tenaga pendidik profesional yang mendedikasikan diri untuk masa depan siswa</p>
    </div>

    <div class="relative">
        <button id="scroll-left" class="absolute left-0 top-1/2 transform -translate-y-1/2 bg-blue-600 text-white p-2 rounded-full hover:bg-blue-700 z-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <button id="scroll-right" class="absolute right-0 top-1/2 transform -translate-y-1/2 bg-blue-600 text-white p-2 rounded-full hover:bg-blue-700 z-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>

        <div id="teacher-container" class="flex overflow-x-auto space-x-6 pb-4 snap-x snap-mandatory scrollbar">
            <!-- Guru 1 -->
            <div class="card bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 flex-shrink-0 w-80 snap-center">
                <div class="relative pb-[130%]">
                    <img src="https://i.guim.co.uk/img/media/59baecefbc73d3bcf4a47b017453a27f19b55175/331_488_2481_1489/master/2481.jpg?width=1200&height=900&quality=85&auto=format&fit=crop&s=285e4f639f1c71cbdf27c57315394bb1" alt="Foto Guru" class="absolute w-full h-full object-cover">
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-xl text-gray-800 mb-1">Budi Santoso, M.Pd</h3>
                    <p class="text-blue-600 font-medium mb-2">Matematika</p>
                    <p class="text-gray-600 text-sm mb-3">10 tahun pengalaman mengajar, lulusan Universitas Indonesia</p>
                    <div class="flex items-center text-sm text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>budi.santoso@sixma.edu</span>
                    </div>
                </div>
            </div>

            <!-- Guru 2 -->
            <div class="card bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 flex-shrink-0 w-80 snap-center">
                <div class="relative pb-[130%]">
                    <img src="https://t3.ftcdn.net/jpg/02/65/18/30/360_F_265183061_NkulfPZgRxbNg3rvYSNGGwi0iD7qbmOp.jpg" alt="Foto Guru" class="absolute w-full h-full object-cover">
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-xl text-gray-800 mb-1">Siti Aminah, S.Pd</h3>
                    <p class="text-blue-600 font-medium mb-2">Bahasa Indonesia</p>
                    <p class="text-gray-600 text-sm mb-3">8 tahun pengalaman mengajar, lulusan Universitas Gadjah Mada</p>
                    <div class="flex items-center text-sm text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>siti.aminah@sixma.edu</span>
                    </div>
                </div>
            </div>

            <!-- Guru 3 -->
            <div class="card bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 flex-shrink-0 w-80 snap-center">
                <div class="relative pb-[130%]">
                    <img src="https://d19r1twe1senfi.cloudfront.net/uploads/avr/image_event_online/image/f1db7a32-d6b5-4579-8065-d62ef4add297/user_crop_Adelaide_Hero_Image.jpg?ts=1730168169" alt="Foto Guru" class="absolute w-full h-full object-cover">
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-xl text-gray-800 mb-1">Ahmad Rizki, M.Sc</h3>
                    <p class="text-blue-600 font-medium mb-2">Fisika</p>
                    <p class="text-gray-600 text-sm mb-3">5 tahun pengalaman mengajar, lulusan Institut Teknologi Bandung</p>
                    <div class="flex items-center text-sm text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>ahmad.rizki@sixma.edu</span>
                    </div>
                </div>
            </div>

            <!-- Guru 4 -->
            <div class="card bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 flex-shrink-0 w-80 snap-center">
                <div class="relative pb-[130%]">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ0976ln5ihSXouHbCOAZ_ZAqVDY90rtYKVig&s" alt="Foto Guru" class="absolute w-full h-full object-cover">
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-xl text-gray-800 mb-1">Dewi Anggraini, S.Pd</h3>
                    <p class="text-blue-600 font-medium mb-2">Biologi</p>
                    <p class="text-gray-600 text-sm mb-3">7 tahun pengalaman mengajar, lulusan Universitas Airlangga</p>
                    <div class="flex items-center text-sm text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>dewi.anggraini@sixma.edu</span>
                    </div>
                </div>
            </div>

            <!-- Guru 5 -->
            <div class="card bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 flex-shrink-0 w-80 snap-center">
                <div class="relative pb-[130%]">
                    <img src="https://media.newyorker.com/photos/66d2358f1f531aabeb7b00d4/1:1/w_2000,h_2000,c_limit/Kang-English-Teacher-02_GALLERY_EVAN_0028.jpg" alt="Foto Guru" class="absolute w-full h-full object-cover">
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-xl text-gray-800 mb-1">Andi Wijaya, M.Pd</h3>
                    <p class="text-blue-600 font-medium mb-2">Kimia</p>
                    <p class="text-gray-600 text-sm mb-3">9 tahun pengalaman mengajar, lulusan Universitas Padjadjaran</p>
                    <div class="flex items-center text-sm text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>andi.wijaya@sixma.edu</span>
                    </div>
                </div>
            </div>

            <!-- Guru 6 -->
            <div class="card bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 flex-shrink-0 w-80 snap-center">
                <div class="relative pb-[130%]">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQmeEGMG-mmNvjejHnOJIwgDl3A0aPhkXY0Jg&s" alt="Foto Guru" class="absolute w-full h-full object-cover">
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-xl text-gray-800 mb-1">Nurul Hidayah, S.Pd</h3>
                    <p class="text-blue-600 font-medium mb-2">Bahasa Inggris</p>
                    <p class="text-gray-600 text-sm mb-3">6 tahun pengalaman mengajar, lulusan Universitas Brawijaya</p>
                    <div class="flex items-center text-sm text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>nurul.hidayah@sixma.edu</span>
                    </div>
                </div>
            </div>

            <!-- Guru 7 -->
            <div class="card bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 flex-shrink-0 w-80 snap-center">
                <div class="relative pb-[130%]">
                    <img src="https://lh6.googleusercontent.com/proxy/dKxGEA5aaDzFZhxupnfySK7sdYIIdQ-15SOyXsOhWN6ApviU64U2sWwnMHjbwatgGLkARtT-XnADUYlZ43DsS6pfbUG8nY6sUOfD9MYCCRiOgOTSJcoclu79pW4Yfonu-1PLLuCfrQ" alt="Foto Guru" class="absolute w-full h-full object-cover">
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-xl text-gray-800 mb-1">Hadi Prasetyo, M.Ed</h3>
                    <p class="text-blue-600 font-medium mb-2">Sejarah</p>
                    <p class="text-gray-600 text-sm mb-3">11 tahun pengalaman mengajar, lulusan Universitas Sebelas Maret</p>
                    <div class="flex items-center text-sm text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>hadi.prasetyo@sixma.edu</span>
                    </div>
                </div>
            </div>

            <!-- Guru 8 -->
            <div class="card bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 flex-shrink-0 w-80 snap-center">
                <div class="relative pb-[130%]">
                    <img src="https://www.vivi.io/wp-content/uploads/2024/12/AdobeStock_608709985.jpeg" alt="Foto Guru" class="absolute w-full h-full object-cover">
                </div>
                <div class="p-5">
                    <h3 class="font-bold text-xl text-gray-800 mb-1">Maya Sari, S.Pd</h3>
                    <p class="text-blue-600 font-medium mb-2">Ekonomi</p>
                    <p class="text-gray-600 text-sm mb-3">4 tahun pengalaman mengajar, lulusan Universitas Diponegoro</p>
                    <div class="flex items-center text-sm text-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>maya.sari@sixma.edu</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .scrollbar::-webkit-scrollbar {
        height: 8px;
    }
    .scrollbar::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 4px;
    }
    .scrollbar::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 4px;
    }
    .scrollbar::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
    .card {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.5s ease, transform 0.5s ease;
    }
    .card.visible {
        opacity: 1;
        transform: translateY(0);
    }
</style>

<script>
    // Card animation with Intersection Observer
    const cards = document.querySelectorAll('.card');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('visible');
                }, index * 100); // Stagger animation by 100ms per card
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1
    });

    cards.forEach(card => observer.observe(card));

    // Smooth scroll navigation
    const container = document.getElementById('teacher-container');
    const scrollLeftBtn = document.getElementById('scroll-left');
    const scrollRightBtn = document.getElementById('scroll-right');

    scrollLeftBtn.addEventListener('click', () => {
        container.scrollBy({ left: -320, behavior: 'smooth' });
    });

    scrollRightBtn.addEventListener('click', () => {
        container.scrollBy({ left: 320, behavior: 'smooth' });
    });
</script>

<!-- Footer -->
<div class="bg-gray-100 mt-8">
    <div class="container mx-auto px-4 py-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Logo and Description -->
            <div>
                <h1 class="mb-4 font-bold">SIXMA NEWS</h1>
                <p class="text-gray-600 text-sm">Kami adalah institusi pendidikan yang berdedikasi untuk mencetak generasi unggul dengan pendidikan berkualitas.</p>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-bold text-gray-800 mb-4">Tautan Cepat</h3>
                <ul class="text-gray-600 text-sm space-y-2">
                    <li><a href="#" class="hover:text-blue-600 transition-colors duration-200">Beranda</a></li>
                    <li><a href="#" class="hover:text-blue-600 transition-colors duration-200">Tentang Kami</a></li>
                    <li><a href="#" class="hover:text-blue-600 transition-colors duration-200">Program Pendidikan</a></li>
                    <li><a href="#" class="hover:text-blue-600 transition-colors duration-200">Kontak</a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-lg font-bold text-gray-800 mb-4">Kontak Kami</h3>
                <ul class="text-gray-600 text-sm space-y-2">
                    <li class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>info@sixma.edu</span>
                    </li>
                    <li class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span>+62 123 456 7890</span>
                    </li>
                    <li class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>Jl. Pendidikan No. 123, Jakarta</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-gray-300 mt-8 pt-4 text-center">
            <p class="text-gray-600 text-sm">&copy; 2025 Sixma Education. All rights reserved.</p>
        </div>
    </div>
</div>


</body>
</html>
    