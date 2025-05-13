<!-- @extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl mb-4">Register</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm">Name</label>
            <input type="text" name="name" id="name" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label for="email" class="block text-sm">Email</label>
            <input type="email" name="email" id="email" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm">Password</label>
            <input type="password" name="password" id="password" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label for="password_confirmation" class="block text-sm">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border rounded p-2" required>
        </div>
        <div class="mb-4">
            <label for="role" class="block text-sm">Role</label>
            <select name="role" id="role" class="w-full border rounded p-2" required>
                <option value="admin">Admin</option>
                <option value="guru">Guru</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Register</button>
    </form>
</div>
@endsection -->