<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita Lengkap</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            600: '#2563eb',
                            800: '#1e40af',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 font-sans">
    <div class="max-w-4xl mx-auto py-12 px-4 sm:px-6">
        <div class="mb-10">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Semua Berita Populer</h1>
            <div class="w-20 h-1 bg-primary-600 rounded-full"></div>
        </div>

        @forelse ($news as $item)
            <article class="mb-12 pb-12 border-b border-gray-200 last:border-0 last:mb-0 last:pb-0">
                <div class="flex flex-col md:flex-row gap-6 mb-6">
                    <div class="md:w-1/3">
                        <img src="{{ $item->image ? asset('storage/' . $item->image) : 'https://via.placeholder.com/300' }}" 
                             alt="{{ $item->title }}" 
                             class="w-full h-48 md:h-full object-cover rounded-lg">
                    </div>
                    <div class="md:w-2/3">
                        <div class="flex items-center text-sm text-gray-500 mb-2">
                            <span>{{ $item->created_at->format('d F Y') }}</span>
                            <span class="mx-2">•</span>
                            <span>Kategori: {{ $item->category ?? 'Umum' }}</span>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-900 mb-3 leading-tight hover:text-primary-600 transition-colors">
                            <a href="{{ route('news.show', $item->id) }}">{{ $item->title }}</a>
                        </h2>
                        <p class="text-gray-700 mb-4">{{ $item->excerpt ?? Str::limit($item->content, 200) }}</p>
                    </div>
                </div>
                
                
            </article>
        @empty
            <div class="py-12 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h3 class="mt-4 text-lg font-medium text-gray-900">Tidak ada berita saat ini</h3>
                <p class="mt-1 text-gray-500">Silakan kembali lagi nanti untuk melihat berita terbaru.</p>
            </div>
        @endforelse

        @if($news->count() > 0)
            <div class="mt-8">
                {{ $news->links() }}
            </div>
        @endif
    </div>
</body>
</html>