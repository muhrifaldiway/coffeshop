<!-- resources/views/components/home/navbar.blade.php -->
<section class="bg-white py-10 md:mb-10">
<div class="container max-w-screen-xl mx-auto px-4">
<nav class="flex-wrap lg:flex items-center" x-data="{navbarOpen:false}">
    <div class="flex items-center mb-10 lg:mb-0">
        <img src="{{ asset('assets/image/navbar-logo2.png') }}" alt="Logo">

        <button class="lg:hidden w-10 h-10 ml-auto flex items-center justify-center border border-blue-500 text-blue-500 rounded-md" @click="navbarOpen = !navbarOpen">
            <i data-feather="menu"></i>
        </button>
    </div>

    <ul class="lg:flex flex-col lg:flex-row lg:items-center lg:mx-auto lg:space-x-8 xl:space-x-14" :class="{'hidden':!navbarOpen,'flex':navbarOpen}">
        <x-home.navbar-link href="/" text="Home"/>
        <x-home.navbar-link href="#artikels" text="Artikel"/>
        <x-home.navbar-link href="/konsultasi" text="Konsultasi"/>
        <x-home.navbar-link href="/aboutus" text="About us"/>
    </ul>

    <div class="lg:flex flex-col md:flex-row md:items-center text-center md:space-x-6" :class="{'hidden':!navbarOpen,'flex':navbarOpen}">
        <a href="/login" class="px-6 py-4 border-2 border-blue-500 text-blue-500 font-semibold text-lg rounded-xl hover:bg-blue-700 hover:text-white transition ease-linear duration-500">Login</a>
    </div>
    <div class="lg:flex flex-col md:flex-row md:items-center text-center md:space-x-6" :class="{'hidden':!navbarOpen,'flex':navbarOpen}">
    </div>
</nav>
</div>
</section>