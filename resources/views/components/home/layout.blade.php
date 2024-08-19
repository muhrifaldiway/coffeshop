<!-- resources/views/components/home/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<x-home.header />
<body class="font-body">
    <x-home.navbar />
    {{ $slot }}
</body>
</html>
