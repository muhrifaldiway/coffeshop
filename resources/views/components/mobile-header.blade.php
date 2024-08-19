<!-- resources/views/components/mobile-header.blade.php -->

<header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
    <div class="flex items-center justify-between">
        <a href="index.html" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">Admin</a>
        <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
            <i x-show="!isOpen" class="fas fa-bars"></i>
            <i x-show="isOpen" class="fas fa-times"></i>
        </button>
    </div>

    <!-- Dropdown Nav -->
    <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
        <x-sidebar-link href="/admin" :active="request()->is('admin')" icon="fas fa-tachometer-alt">
            Admin
        </x-sidebar-link>
        <x-sidebar-link href="/user" :active="request()->is('user')" icon="fas fa-sticky-note">
            User
        </x-sidebar-link>
        <x-sidebar-link href="/konsultasi" :active="request()->is('konsultasi')" icon="fas fa-table">
            Konsultasi
        </x-sidebar-link>
        <x-sidebar-link href="/komentars" :active="request()->is('komentars')" icon="fas fa-align-left">
            Komentar
        </x-sidebar-link>
        <div x-data="{ open: false }">
            <button @click="open = !open" class="w-full text-left text-white text-base font-semibold flex items-center px-6 py-2 hover:bg-blue-700 focus:outline-none focus:bg-blue-700 transition duration-150 ease-in-out">
                <i class="fas fa-tablet-alt mr-3"></i>
                <span>Artikel</span>
                <i :class="open ? 'fa-chevron-down' : 'fa-chevron-right'" class="fas ml-auto"></i>
            </button>
            <div x-show="open" class="pl-12">
                <x-sidebar-link href="/artikels" :active="request()->is('artikels')" icon="fas fa-file-alt">
                    Semua Artikel
                </x-sidebar-link>
                <x-sidebar-link href="/kategoriArtikel" :active="request()->is('kategoriArtikel')" icon="fas fa-heartbeat">
                    Kategori Artikel
                </x-sidebar-link>
            </div>
        </div>
    </nav><nav class="text-white text-base font-semibold pt-3">
        <x-sidebar-link href="/admin" :active="request()->is('admin')" icon="fas fa-tachometer-alt">
            Admin
        </x-sidebar-link>
        <x-sidebar-link href="/users" :active="request()->is('user')" icon="fas fa-users">
            User
        </x-sidebar-link>
        <div x-data="{ open: false }">
            <button @click="open = !open" class="w-full text-left text-white text-base font-semibold flex items-center px-6 py-2 hover:bg-amber-900 focus:outline-none focus:bg-amber-900 transition duration-150 ease-in-out">
                <i class="fas fa-cogs mr-3"></i>
                <span>Items Menu</span>
                <i :class="open ? 'fa-chevron-down' : 'fa-chevron-right'" class="fas ml-auto"></i>
            </button>
            <div x-show="open" class="pl-12">
                <x-sidebar-link href="/items" :active="request()->is('items')" icon="fas fa-box">
                    Semua Items
                </x-sidebar-link>
                <x-sidebar-link href="/item-categories" :active="request()->is('item-categories')" icon="fas fa-tags">
                    Items Categories 
                </x-sidebar-link>
                <x-sidebar-link href="/categories" :active="request()->is('categories')" icon="fas fa-list">
                    Categories
                </x-sidebar-link>
            </div>
        </div>
        <x-sidebar-link href="/transactions" :active="request()->is('transactions')" icon="fas fa-exchange-alt">
            Transaksi
        </x-sidebar-link>
    </nav>
</header>
