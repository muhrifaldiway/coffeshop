<x-layout>
    <div class="bg-gradient-to-r from-amber-900 to-amber-800 p-4 shadow-lg text-2xl text-white rounded-tl-3xl">
        <h1 class="font-bold pl-2">{{ $title }}</h1>
    </div>

    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M14.348 14.849a1.2 1.2 0 01-1.697 0L10 12.207l-2.651 2.642a1.2 1.2 0 01-1.697-1.697l2.642-2.651-2.642-2.651a1.2 1.2 0 011.697-1.697l2.651 2.642 2.651-2.642a1.2 1.2 0 011.697 1.697l-2.642 2.651 2.642 2.651a1.2 1.2 0 010 1.697z"/>
            </svg>
        </span>
    </div>
    @endif

    <br>
    <button class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-900 mb-4" onclick="toggleModal('modal-add')">Tambah Item</button>

    <!-- Modal untuk Tambah Item -->
    <div id="modal-add" class="fixed inset-0 bg-black bg-opacity-50 items-center flex justify-center hidden">
        <div class="bg-white rounded-lg shadow-lg p-6 w-11/12 md:w-1/3">
            <h2 class="text-xl font-semibold mb-4">Tambah Item</h2>
            <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            
                <div class="mb-4">
                    <label for="user_id" class="block text-sm font-medium text-gray-700">Pengguna</label>
                    <select id="user_id" name="user_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-3" required>
                        <option value="" disabled selected>Pilih Pengguna</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
            
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama Items</label>
                    <input type="text" id="name" name="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-3" required>
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700">Gambar</label>
                    <input type="file" id="image" name="image" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-3">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                    <textarea id="description" name="description" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-3"></textarea>
                </div>
                <div class="mb-4">
                    <label for="quantity" class="block text-sm font-medium text-gray-700">Jumlah</label>
                    <input type="number" id="quantity" name="quantity" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-3" required min="0">
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
                    <input type="number" id="price" name="price" step="0.01" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-3" required min="0">
                </div>
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Simpan</button>
                    <button type="button" class="ml-2 bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600" onclick="toggleModal('modal-add')">Tutup</button>
                </div>
            </form>            
        </div>
    </div>

    <!-- Tabel Data Items -->
    <div class="overflow-x-auto mt-4">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-800">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">No</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Nama Pengguna</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Nama Items</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Jumlah</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Harga</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Gambar</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($items as $index => $item)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $index+1 }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $item->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $item->quantity }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Rp. {{ number_format($item->price, 2) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        @if ($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="Image" class="h-20 w-20 object-cover rounded">
                        @else
                        No Image
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <!-- Tombol Edit -->
                        <a href="{{ route('items.edit', $item) }}" class="text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 font-medium rounded-lg text-xs px-3 py-1.5 text-center">
                            <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4h8l4-4m-4 4V3m4 4L12 3m-4 4l-4-4m16 16H5"></path>
                            </svg>
                            Edit
                        </a>
                    
                        <!-- Tombol Hapus -->
                        <button onclick="openDeleteModal('{{ route('items.destroy', $item) }}')" class="text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 font-medium rounded-lg text-xs px-3 py-1.5 text-center ml-2">
                            <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Hapus
                        </button>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal Konfirmasi Hapus -->
<div id="delete-confirmation-modal" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-lg shadow-lg max-w-sm w-full p-6">
            <h3 class="text-lg font-semibold mb-4">Konfirmasi Hapus</h3>
            <p class="text-gray-700">Apakah Anda yakin ingin menghapus item ini?</p>
            <div class="mt-4 flex justify-end">
                <button id="cancel-delete" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 mr-2">Batal</button>
                <form id="delete-form" action="" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>


    <!-- Script untuk Toggle Modal -->
    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }
    </script>

    <script>
        function openDeleteModal(actionUrl) {
            // Set URL pada form delete
            document.getElementById('delete-form').action = actionUrl;
            
            // Tampilkan modal
            document.getElementById('delete-confirmation-modal').classList.remove('hidden');
        }

        document.getElementById('cancel-delete').addEventListener('click', function() {
            // Sembunyikan modal
            document.getElementById('delete-confirmation-modal').classList.add('hidden');
        });
    </script>

</x-layout>
