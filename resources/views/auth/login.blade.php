<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full space-y-8 p-8 bg-white rounded-lg shadow-lg">
            <div>
                <h2 class="mt-6 text-center text-3xl font-bold text-gray-900">
                    Selamat Datang
                </h2>
                <p class="mt-2 text-center font-regular text-gray-700">silahkan login untuk melanjutkan</p>
            </div>
            <form class="mt-8 space-y-6" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="rounded-md shadow-sm space-y-4">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Email address
                        </label>
                        <input id="email" name="email" type="email" required 
                            class="appearance-none relative block w-full px-3 py-2 border border-gray-300 
                            placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none 
                            focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            Password
                        </label>
                        <input id="password" name="password" type="password" required 
                            class="appearance-none relative block w-full px-3 py-2 border border-gray-300 
                            placeholder-gray-500 text-gray-900 rounded-lg focus:outline-none 
                            focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    </div>
                </div>

                <div>
                    <button type="submit" 
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent 
                        text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 
                        focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 
                        transition duration-150 ease-in-out">
                      Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>