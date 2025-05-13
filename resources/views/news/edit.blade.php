@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Edit News</h2>
    <form method="POST" action="{{ route('news.update', $news) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')
        <div class="space-y-2">
            <label for="title" class="text-sm font-medium text-gray-700">Title</label>
            <input type="text" name="title" id="title" value="{{ $news->title }}" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                required>
        </div>
        <div class="space-y-2">
            <label for="content" class="text-sm font-medium text-gray-700">Content</label>
            <textarea name="content" id="content" rows="6" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                required>{{ $news->content }}</textarea>
        </div>
        <div class="space-y-2">
            <label for="image" class="text-sm font-medium text-gray-700">Image</label>
            @if ($news->image)
                <div class="mb-2">
                    <img src="{{ Storage::url($news->image) }}" alt="News Image" class="w-32 h-32 object-cover rounded-lg">
                </div>
            @endif
            <input type="file" name="image" id="image" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <button type="submit" 
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-300 ease-in-out">
            Update News
        </button>
    </form>
</div>
@endsection