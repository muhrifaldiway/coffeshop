<!-- resources/views/components/layout.blade.php -->
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
    <!-- Link ke FontAwesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
<body class="bg-gray-100 font-family-karla flex">

    <x-sidebar />

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">

        <x-header />

        <x-mobile-header />

        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
               {{ $slot }}

            </main>
        </div>
    </div>
</body>


</html>
