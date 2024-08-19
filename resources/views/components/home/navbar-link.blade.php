<!-- resources/views/components/home/navbar-link.blade.php -->
@props(['href', 'text'])

<li class="font-semibold text-gray-900 hover:text-gray-400 transition ease-in-out duration-300 mb-5 lg:mb-0">
    <a href="{{ $href }}">{{ $text }}</a>
</li>
