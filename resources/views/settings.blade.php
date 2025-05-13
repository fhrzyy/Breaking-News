
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto space-y-8">
        <!-- Alert Messages -->
        <!-- @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
            {{ session('success') }}
        </div>
        @endif -->

        <!-- Profile Settings -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6">Update Profile</h2>
            <form action="{{ route('settings.profile') }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Name</label>
                    <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" 
                           class="w-full px-3 py-2 border rounded-lg">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" 
                           class="w-full px-3 py-2 border rounded-lg">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    Update Profile
                </button>
            </form>
        </div>

        <!-- Password Settings -->
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-6">Ganti Password</h2>
            <form action="{{ route('settings.password') }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Password Lama</label>
                    <input type="password" name="current_password" 
                           class="w-full px-3 py-2 border rounded-lg">
                    @error('current_password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Password Baru</label>
                    <input type="password" name="password" 
                           class="w-full px-3 py-2 border rounded-lg">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Confirm New Password</label>
                    <input type="password" name="password_confirmation" 
                           class="w-full px-3 py-2 border rounded-lg">
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                    Update Password
                </button>
            </form>
        </div>
    </div>
</div>
@endsection