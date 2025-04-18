<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Login</h2>
        <form action="{{ route('login.action') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label for="nip" class="block text-sm font-medium text-gray-700">Email atau NIP</label>
                <input type="text" id="nip" name="login" placeholder="Masukkan Email atau NIP"
                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required value="{{ old('login') }}">
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="password" name="password" placeholder="********"
                    class="mt-1 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>
            @if (session('error'))
            <div class="p-4 mb-4 text-sm text-red-900 rounded-lg bg-red-50 dark:bg-gray-100 dark:text-red-400"
                role="alert">
                <span class="font-medium"><b>Warning!</b></span> {{ session('error') }}
            </div>
            @endif

            <!-- Submit -->
            <div>
                <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-200">
                    Login
                </button>
            </div>
        </form>
    </div>

</body>

</html>