@php
    $layout = Auth::check() ? 'layouts.app' : 'layouts.public';
@endphp

@extends($layout)

@section('content')
<div class="bg-white p-8 rounded-lg shadow-lg max-w-7xl mx-auto">
    @if (Auth::check())
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Daftar Berita</h2>
            <a href="{{ route('news.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition duration-300 ease-in-out flex items-center gap-2">
                <span>Tambah Berita</span>
            </a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-3 text-left text-gray-700 font-semibold">Title</th>
                        <th class="px-4 py-3 text-left text-gray-700 font-semibold">Author</th>
                        <th class="px-4 py-3 text-left text-gray-700 font-semibold">Status</th>
                        <th class="px-4 py-3 text-left text-gray-700 font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($news as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $item->title }}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center">
                                    <span class="text-sm text-gray-600">{{ $item->user->name }}</span>
                                    @if($item->user->role == 'admin')
                                        <span class="ml-2 px-2 py-0.5 bg-red-100 text-red-800 rounded-full text-xs">Admin</span>
                                    @else
                                        <span class="ml-2 px-2 py-0.5 bg-blue-100 text-blue-800 rounded-full text-xs">Teacher</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <span class="px-3 py-1 rounded-full text-sm 
                                    {{ $item->status === 'approved' ? 'bg-green-100 text-green-800' : 
                                       ($item->status === 'rejected' ? 'bg-red-100 text-red-800' : 
                                       'bg-yellow-100 text-yellow-800') }}">
                                    {{ $item->status }}
                                </span>
                            </td>
                            <td class="px-4 py-3 flex gap-2 items-center">
                                @if(Auth::user()->id == $item->user_id || Auth::user()->role == 'admin')
                                    <a href="{{ route('news.edit', $item) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-md text-sm transition duration-300">Edit</a>
                                    <form action="{{ route('news.destroy', $item) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-md text-sm transition duration-300" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                @endif

                                @if (Auth::user()->role === 'admin' && $item->status === 'pending')
                                    <form action="{{ route('news.approve', $item) }}" method="POST" class="inline-flex gap-2">
                                        @csrf
                                        <select name="status" class="text-sm border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                            <option value="approved">Approve</option>
                                            <option value="rejected">Reject</option>
                                        </select>
                                        <input type="text" name="notes" placeholder="Notes" class="text-sm border-gray-300 rounded-md shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200">
                                        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white text-sm px-3 py-1 rounded-md transition duration-300">Submit</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="mt-4">
                
            </div>
        </div>
    @else
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Berita Terbaru</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($news as $item)
                <div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition duration-300">
                    @if ($item->image)
                        <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
                    @endif
                    <div class="p-4">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $item->title }}</h3>
                        <p class="text-gray-600 text-sm mb-4">{{ Str::limit($item->content, 100) }}</p>
                        <div class="flex items-center justify-between text-sm text-gray-500">
                            <div class="flex items-center">
                                <span>By: {{ $item->user->name }}</span>
                                @if($item->user->role == 'admin')
                                    <span class="ml-2 px-2 py-0.5 bg-red-100 text-red-800 rounded-full text-xs">Admin</span>
                                @else
                                    <span class="ml-2 px-2 py-0.5 bg-blue-100 text-blue-800 rounded-full text-xs">Teacher</span>
                                @endif
                            </div>
                            <span class="px-2 py-1 rounded-full {{ $item->status === 'approved' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                {{ $item->status }}
                            </span>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-gray-500 text-center col-span-3">No news available.</p>
            @endforelse

            <div class="col-span-full mt-4">
                {{ $news->links() }}
            </div>
        </div>
    @endif
</div>
@endsection