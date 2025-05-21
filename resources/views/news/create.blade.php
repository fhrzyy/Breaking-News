@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-lg">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Buat Berita</h2>
    <form method="POST" action="{{ route('news.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div class="space-y-2">
            <label for="title" class="text-sm font-medium text-gray-700">Judul</label>
            <input type="text" name="title" id="title" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                required>
        </div>
        <div class="space-y-2">
            <label for="content" class="text-sm font-medium text-gray-700">Konten</label>
            <textarea name="content" id="content" rows="6" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                required></textarea>
        </div>
        <div class="space-y-2">
            <label for="image" class="text-sm font-medium text-gray-700">Gambar</label>
            <input type="file" name="image" id="image" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="space-y-2">
            <label for="section" class="text-sm font-medium text-gray-700">Bagian</label>
            <select name="section" id="section" 
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                required>
                <option value="latest">Berita Terbaru</option>
                <option value="popular">Berita Populer</option>
                <option value="extracurricular">Kegiatan Ekstrakurikuler</option>
            </select>
        </div>
       
        <button type="submit" 
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-300 ease-in-out">
            Buat Berita
        </button>
    </form>
</div>
@endsection