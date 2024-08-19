<!DOCTYPE html>
<html class="h-full bg-amber-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
<body class="h-full">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-20 w-auto" src="{{ asset('assets/img/logo3.png') }}" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-200">Login to your account</h2>
        </div>
      
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            @if(session('success'))
                <div class="bg-green-500 text-white text-center py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="bg-red-500 text-white text-center py-2 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif
            @if($errors->any())
                <div class="bg-red-500 text-white text-center py-2 rounded mb-4">
                    {{ $errors->first() }}
                </div>
            @endif
            <form class="space-y-6" action="{{ route('login') }}" method="POST">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-200">Email address</label>
                    <div class="mt-2">
                        <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-amber-900 sm:text-sm sm:leading-6">
                    </div>
                </div>
      
                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-200">Password</label>
                    </div>
                    <div class="mt-2">
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-amber-900 sm:text-sm sm:leading-6">
                    </div>
                    <div>
                        <input type="checkbox" id="show_passwords" onclick="togglePasswordVisibility()">
                        <label for="show_passwords" class="text-sm font-medium text-gray-200">Show Passwords</label>
                    </div>
                </div>
                <div class="text-sm">
                    <a href="/register" class="font-semibold text-amber-700 hover:text-amber-500">Anda belum memiliki akun? Silahkan Registrasi!</a>
                </div>
                <div class="text-sm">
                    <a href="/" class="font-semibold text-amber-700 hover:text-amber-500 text-center">Kembali Ke Beranda!</a>
                </div>
                <div>
                    <button type="submit" class="flex w-full justify-center rounded-md bg-amber-800 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-amber-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-amber-900">Login</button>
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
