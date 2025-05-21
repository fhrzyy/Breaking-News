<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="max-w-4xl mx-auto py-12 px-4">
    <h1 class="text-3xl font-bold text-gray-800">{{ $news->title }}</h1>
    <div class="flex items-center text-gray-500 text-sm my-4">
        <span>Ditulis oleh: {{ $news->user->name }}</span>
        <span class="mx-2">•</span>
        <span>{{ $news->created_at->format('M d, Y') }}</span>
    </div>
    @if ($news->image)
        <img src="{{ Str::startsWith($news->image, ['http://', 'https://']) ? $news->image : asset('storage/' . $news->image) }}" 
             alt="{{ $news->title }}" 
             class="w-full h-64 object-cover mb-6">
    @else
        <div class="w-full h-64 bg-gray-200 flex items-center justify-center mb-6">
            <span class="text-gray-500">No Image</span>
        </div>
    @endif
    <div class="text-gray-600 leading-relaxed">{!! $news->content !!}</div>
</div>
</body>
</html>