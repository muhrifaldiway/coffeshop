<x-layout>
    <!-- Form Edit Item -->
    <div class="bg-white shadow-md rounded-lg p-6 mx-auto">
        <h2 class="text-xl font-semibold mb-4">Edit Item</h2>
        <form action="{{ route('items.update', $item) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="user_id" class="block text-sm font-medium text-gray-700">Nama Pengguna</label>
                <input type="text" id="user_id" user_id="user_id" value="{{ old('user_id', $item->user->name) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-3" readonly>
                <input type="hidden" name="user_id" value="{{ $item->user_id }}">
            </div>
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" id="name" name="name" value="{{ old('name', $item->name) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-3" required>
            </div>
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Gambar</label>
                <input type="file" id="image" name="image" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-3">
                @if ($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" alt="Image" class="mt-2 h-20 w-20 object-cover rounded">
                @endif
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea id="description" name="description" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-3">{{ old('description', $item->description) }}</textarea>
            </div>
            <div class="mb-4">
                <label for="quantity" class="block text-sm font-medium text-gray-700">Jumlah</label>
                <input type="number" id="quantity" name="quantity" value="{{ old('quantity', $item->quantity) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-3" required min="0">
            </div>
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" id="price" name="price" value="{{ old('price', $item->price) }}" step="0.01" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-3" required min="0">
            </div>
            <div class="justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Simpan</button>
                <a href="{{ route('items.index') }}" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-900 mb-4 inline-block">Kembali</a>
            </div>
        </form>
    </div>
</x-layout>
