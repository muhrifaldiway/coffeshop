<!-- resources/views/components/sidebar.blade.php -->

<aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
    <div class="p-6">
      
        <i class="fas fa-coffee text-white text-3xl"></i>
            <a href="/admin" class="text-white text-4xl font-bold hover:text-gray-200 transition duration-300 ease-in-out">
                Coffee Shop
            </a>
       
    </div>
    <nav class="text-white text-base font-semibold pt-3">
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
    
</aside>
