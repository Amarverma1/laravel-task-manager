<!DOCTYPE html>
<html lang="en" class="bg-[#FDFDFC] dark:bg-[#0a0a0a]">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Task Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center min-h-screen p-6">

    <div class="w-full max-w-md bg-white dark:bg-[#121212] rounded-xl shadow-lg p-8 space-y-6">

        <h2 class="text-2xl font-bold text-center text-[#1b1b18] dark:text-[#EDEDEC]">Login to Your Account</h2>

        <!-- Session Status -->
        @if (session('status'))
        <div class="text-green-600 text-sm font-medium">
            {{ session('status') }}
        </div>
        @endif

        <!-- Validation Errors -->
        @if ($errors->any())
        <div class="text-red-500 text-sm">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <label class="block mb-1 text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC]" for="email">Email</label>
                <input id="email" type="email" name="email" required autofocus
                    class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-[#1b1b18] dark:bg-[#1e1e1e] dark:border-[#3E3E3A] dark:text-[#EDEDEC]" />
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium text-[#1b1b18] dark:text-[#EDEDEC]" for="password">Password</label>
                <input id="password" type="password" name="password" required
                    class="w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-[#1b1b18] dark:bg-[#1e1e1e] dark:border-[#3E3E3A] dark:text-[#EDEDEC]" />
            </div>

            <div class="flex items-center justify-between">
                <label class="flex items-center text-sm text-[#1b1b18] dark:text-[#EDEDEC]">
                    <input type="checkbox" name="remember" class="mr-2">
                    Remember me
                </label>

                @if (Route::has('password.request'))
                <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
                    Forgot your password?
                </a>
                @endif
            </div>

            <div>
                <button type="submit"
                    class="w-full px-4 py-2 text-white bg-[#1b1b18] hover:bg-[#333328] rounded-md transition duration-200">
                    Log In
                </button>
            </div>
        </form>

        <p class="text-sm text-center text-[#1b1b18] dark:text-[#EDEDEC]">
            Don't have an account?
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register here</a>
            @endif
        </p>

    </div>

</body>

</html>
