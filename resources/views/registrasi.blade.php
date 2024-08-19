<!DOCTYPE html>
<html class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #6b3000; }
        .cta-btn { color: #6b3000; }
        .upgrade-btn { background: #000000; }
        .upgrade-btn:hover { background: #3f1501; }
        .active-nav-link { background: #3f1501; }
        .nav-item:hover { background: #3f1501; }
        .account-link:hover { background: #3f1501; }
    </style>
</head>
<body class="h-full bg-white font-family-karla">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-20 w-auto" src="{{ asset('assets/img/logo4.png') }}" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Registration your account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-md">
            <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 space-y-4" action="{{ route('register.store') }}" method="POST">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input id="name" name="name" type="text" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}">
                    @error('name')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                    <input id="email" name="email" type="email" autocomplete="email" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('password') border-red-500 @enderror">
                    @error('password')      
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="current-password" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('password_confirmation') border-red-500 @enderror">
                    @error('password_confirmation')
                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <input type="checkbox" id="show_passwords" onclick="togglePasswordVisibility()">
                    <label for="show_passwords" class="text-sm font-medium text-gray-700">Show Passwords</label>
                </div>
                <div class="text-sm text-center">
                    <a href="{{ route('login') }}" class="font-semibold text-indigo-600 hover:text-indigo-500">Sudah memiliki akun? Silakan login!</a>
                </div>

                <div>
                    <button type="submit"
                        class="mt-4 w-full bg-amber-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-amber-800 focus:outline-none focus:ring-2 focus:ring-amber-900 focus:ring-offset-2 focus:ring-offset-gray-100">
                        Sign Up
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            var password = document.getElementById("password");
            var passwordConfirmation = document.getElementById("password_confirmation");
            if (password.type === "password") {
                password.type = "text";
                passwordConfirmation.type = "text";
            } else {
                password.type = "password";
                passwordConfirmation.type = "password";
            }
        }
    </script>
</body>
</html>
