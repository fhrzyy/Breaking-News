<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sixma News</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
</head>

<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 h-screen bg-gradient-to-b from-blue-800 to-blue-600 fixed left-0 top-0 shadow-xl">
            <div class="p-6">
                <a href="{{ route('dashboard') }}" class="text-2xl font-bold text-white hover:text-blue-200 transition duration-300 flex items-center">
                    <span class="mr-2"></span> Sixma News
                </a>
            </div>

            <!-- Sidebar Navigation -->
            <nav class="mt-6">
                <div class="px-6 py-4">
                    @auth
                    <div class="mb-4 bg-blue-900 bg-opacity-50 p-4 rounded-lg flex items-center">
                        <div class="w-12 h-12 rounded-full bg-blue-500 flex items-center justify-center mr-3">
                            <span class="text-white text-lg font-bold">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </span>
                        </div>
                        <div>
                            <div class="font-medium text-white">{{ Auth::user()->name }}</div>
                            <div class="text-blue-200 text-sm">{{ Auth::user()->role }}</div>
                        </div>
                    </div>
                    @endauth
                </div>

                <!-- Sidebar Menu -->
                <div class="px-6">
                    <a href="{{ route('dashboard') }}" class="block py-3 text-white hover:bg-blue-500 rounded-lg px-4 mb-2 transition duration-300 flex items-center">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Dashboard
                    </a>
                </div>
                <div class="px-6">
                    <a href="{{ route('news.index') }}" class="block py-3 text-white hover:bg-blue-500 rounded-lg px-4 mb-2 transition duration-300 flex items-center">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2" />
                        </svg>
                        Berita
                    </a>
                </div>

                <div x-data="{ open: false }" class="px-6">
                    <button @click="open = !open" class="w-full py-3 text-white hover:bg-blue-500 rounded-lg px-4 mb-2 transition duration-300 flex items-center justify-between">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            Settings
                        </div>
                        <svg class="w-4 h-4 transition-transform duration-200" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    
                    <div x-show="open" x-transition:enter="transition ease-out duration-200" 
                         x-transition:enter-start="opacity-0 transform -translate-y-2" 
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 transform translate-y-0"
                         x-transition:leave-end="opacity-0 transform -translate-y-2"
                         class="ml-4 space-y-2">
                        <a href="{{ route('settings') }}" class="block py-2 px-4 text-white hover:bg-blue-500 rounded-lg transition duration-300">
                            Edit Profile
                        </a>
                        <a href="{{ route('settings') }}" class="block py-2 px-4 text-white hover:bg-blue-500 rounded-lg transition duration-300">
                            Ganti Password
                        </a>
                    </div>
                </div>

                @auth
                <div class="px-6">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="block w-full py-3 text-white hover:bg-blue-500 rounded-lg px-4 mb-2 transition duration-300 flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            Logout
                        </button>
                    </form>
                </div>
                @endauth
            </nav>
        </div>

        <!-- Main Content -->
        <div class="ml-64 flex-1 p-8">
            @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg shadow-md">
                <div class="flex items-center">
                    <svg class="h-6 w-6 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    {{ session('success') }}
                </div>
            </div>
            @endif

            @yield('content')
        </div>
    </div>
</body>

</html>