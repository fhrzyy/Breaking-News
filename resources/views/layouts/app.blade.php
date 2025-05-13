<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Web</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 h-screen bg-gradient-to-b from-blue-800 to-blue-600 fixed left-0 top-0 shadow-xl">
            <div class="p-6">
                 <a href="{{ route('dashboard') }}" class="text-2xl font-bold text-white hover:text-blue-200 transition duration-300 flex items-center">
                    <span class="mr-2">📰</span> News Web
                </a>
            </div>
            
            <!-- Sidebar Navigation -->
            <nav class="mt-6">
                <div class="px-6 py-4">
                    @auth
                    <div class="mb-4 bg-blue-900 bg-opacity-50 p-4 rounded-lg">
                        <div class="font-medium text-white">{{ Auth::user()->name }}</div>
                        <div class="text-blue-200 text-sm">{{ Auth::user()->role }}</div>
                    </div>
                    @else
                    <a href="{{ route('login') }}" class="block w-full bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition duration-300 text-center shadow-md">
                        Login
                    </a>
                    @endauth
                </div>
                
                <!-- Sidebar Menu -->
                <div class="px-6">
                    <a href="{{ route('dashboard') }}" class="block py-3 text-white hover:bg-blue-500 rounded-lg px-4 mb-2 transition duration-300 flex items-center">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Dashboard
                    </a>
                </div>
                <div class="px-6">
                    <a href="{{ route('news.index') }}" class="block py-3 text-white hover:bg-blue-500 rounded-lg px-4 mb-2 transition duration-300 flex items-center">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2 2 0 00-2-2h-2"/>
                        </svg>
                        Berita
                    </a>
                </div>
                @auth
                <div class="px-6">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="block w-full py-3 text-white hover:bg-blue-500 rounded-lg px-4 mb-2 transition duration-300 flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
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