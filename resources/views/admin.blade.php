<x-layout>
    <div class="bg-gradient-to-r from-amber-900 to-amber-800 p-4 shadow-lg text-2xl text-white rounded-tl-3xl">
        <h1 class="font-bold pl-2">{{ $title }}</h1>
    </div>
    <br>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 p-6">
        <!-- Card for Users -->
        <div class="bg-gray-800 text-white shadow-lg rounded-lg p-6 transition-transform transform hover:scale-105">
            <div class="flex items-center">
                <div class="mr-4">
                    <!-- Modern and Stylish Icon -->
                    <svg class="h-12 w-12 text-indigo-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2 2 4-4 6 6 6-6 4 4 2-2-6-6-6 6L3 12z" />
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold">Users</h2>
                    <p class="text-5xl font-extrabold">{{ $users }}</p>
                </div>
            </div>
        </div>
        <div class="bg-gray-800 text-white shadow-lg rounded-lg p-6 transition-transform transform hover:scale-105">
            <div class="flex items-center">
                <div class="mr-4">
                    <!-- Modern and Stylish Items Icon -->
                    <svg class="h-12 w-12 text-green-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 7h16M4 7a2 2 0 012-2h12a2 2 0 012 2M4 7v10a2 2 0 002 2h12a2 2 0 002-2V7M4 7l1.5 10M20 7l-1.5 10"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold">Items</h2>
                    <p class="text-5xl font-extrabold">{{ $items }}</p>
                </div>
            </div>
        </div>
        <div class="bg-gray-800 text-white shadow-lg rounded-lg p-6 transition-transform transform hover:scale-105">
            <div class="flex items-center">
                <div class="mr-4">
                    <!-- Modern and Stylish Category Icon -->
                    <svg class="h-12 w-12 text-yellow-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h18M3 3L12 13 21 3M3 21h18M3 21l9-10 9 10"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold">Item Categories</h2>
                    <p class="text-5xl font-extrabold">{{ $itemCategory }}</p>
                </div>
            </div>
        </div>
        <div class="bg-gray-800 text-white shadow-lg rounded-lg p-6 transition-transform transform hover:scale-105">
            <div class="flex items-center">
                <div class="mr-4">
                    <!-- Modern and Stylish Category Icon -->
                    <svg class="h-12 w-12 text-blue-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 4h16M4 4L12 12l8-8M4 20h16M4 20l8-8 8 8"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold">Category</h2>
                    <p class="text-5xl font-extrabold">{{ $category }}</p>
                </div>
            </div>
        </div>
        <div class="bg-gray-800 text-white shadow-lg rounded-lg p-6 transition-transform transform hover:scale-105">
            <div class="flex items-center">
                <div class="mr-4">
                    <!-- Modern and Stylish Transactions Icon -->
                    <svg class="h-12 w-12 text-green-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M3 10a9 9 0 019-9m9 9a9 9 0 00-9 9m0-9H3m18 0a9 9 0 01-9 9m9-9h-9"/>
                    </svg>
                </div>
                <div>
                    <h2 class="text-2xl font-bold">Transactions</h2>
                    <p class="text-5xl font-extrabold">{{ $transactions }}</p>
                </div>
            </div>
        </div>
    </div>
   
</x-layout>
