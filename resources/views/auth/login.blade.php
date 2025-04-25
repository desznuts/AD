<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body class="flex flex-col items-center justify-center min-h-screen bg-gray-100 py-10">

    <div class="w-full max-w-md bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-center mb-6">Login</h1>

        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 border border-green-400 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 border border-red-400 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" required
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </div>

            <button type="submit"
                class="w-full bg-black text-white p-2 rounded hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-600">
                Login
            </button>
        </form>

        <p class="mt-4 text-center">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register here</a>.
        </p>
    </div>

</body>
</html>
