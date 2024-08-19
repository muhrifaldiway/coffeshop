<!-- resources/views/components/sidebar-link.blade.php -->

@props([
    'icon' => 'fas fa-link',
    'active' => false
])

<a {{ $attributes->merge(['class' => 'flex items-center py-4 pl-6 nav-item ' . ($active ? 'active-nav-link' : 'text-white opacity-75 hover:opacity-100')]) }} aria-current="{{ $active ? 'page' : false }}">
    <i class="{{ $icon }} mr-3"></i>
    {{ $slot }}
</a>
