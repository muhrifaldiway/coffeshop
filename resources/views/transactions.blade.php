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
    <button class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-900 mb-4" onclick="toggleModal('modal-add')">Tambah Transactions</button>

      
   <!-- Modal untuk Tambah Transaksi -->
<div id="modal-add" class="fixed inset-0 bg-black bg-opacity-50 items-center flex justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-11/12 md:w-1/3">
        <h2 class="text-xl font-semibold mb-4">Tambah Transaksi</h2>
        <form action="{{ route('transactions.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="item_id" class="block text-sm font-medium text-gray-700">Item</label>
                <select id="item_id" name="item_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-3" required>
                    <option value="">Pilih Item</option>
                    @foreach ($items as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                <input type="number" id="quantity" name="quantity" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-3" required min="1">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Simpan</button>
                <button type="button" class="ml-2 bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600" onclick="toggleModal('modal-add')">Tutup</button>
            </div>
        </form>
    </div>
</div>



    <!-- Modal untuk Edit Transaksi -->
<div id="modal-edit" class="fixed inset-0 bg-black bg-opacity-50 items-center flex justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-11/12 md:w-1/3">
        <h2 class="text-xl font-semibold mb-4">Edit Transaction</h2>
        <form id="edit-form" action="" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" id="edit-transaction-id" name="transaction_id">
            <div class="mb-4">
                <label for="edit-item-id" class="block text-sm font-medium text-gray-700">Item</label>
                <select id="edit-item-id" name="item_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-3" required>
                    <!-- Options should be populated dynamically -->
                    @foreach ($items as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="edit-quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                <input type="number" id="edit-quantity" name="quantity" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-3" required min="1">
            </div>
            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Update</button>
                <button type="button" class="ml-2 bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600" onclick="toggleModal('modal-edit')">Tutup</button>
            </div>
        </form>
    </div>
</div>


    <!-- Tabel Data Transactions -->
<div class="overflow-x-auto mt-4">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-800">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">No</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Item</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Quantity</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Total Price</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Transaction Date</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($transactions as $no => $transaction)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $no + 1 }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $transaction->item->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $transaction->quantity }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Rp. {{ $transaction->total_price }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $transaction->transaction_date->format('d-m-Y H:i:s') }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">

                    <button 
                        type="button" 
                        class="text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 font-medium rounded-lg text-xs px-3 py-1.5 text-center edit-btn"
                        data-id="{{ $transaction->id }}"
                        data-item-id="{{ $transaction->item_id }}"
                        data-quantity="{{ $transaction->quantity }}"
                        onclick="openEditModal(this)">
                        <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4h8l4-4m-4 4V3m4 4L12 3m-4 4l-4-4m16 16H5"></path>
                        </svg>
                        Edit
                    </button>

                    <!-- Tombol Hapus -->
                    <button onclick="openDeleteModal('{{ route('transactions.destroy', $transaction->id) }}')" class="text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 font-medium rounded-lg text-xs px-3 py-1.5 text-center ml-2">
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
            <p class="text-gray-700">Apakah Anda yakin ingin menghapus transaksi ini?</p>
            <div class="mt-4 flex justify-end">
                <button id="cancel-delete" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 mr-2" onclick="toggleModal('delete-confirmation-modal')">Batal</button>
                <form id="delete-form" action="" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    // Fungsi untuk menampilkan atau menyembunyikan modal
    function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.toggle('hidden');
    }

    // Fungsi untuk membuka modal tambah
    function openAddModal() {
        // Kosongkan form jika modal dibuka
        document.getElementById('item_id').value = '';
        document.getElementById('quantity').value = '';

        // Tampilkan modal
        toggleModal('modal-add');
    }

    // Event listener untuk tombol "Tambah Transaksi" di halaman (misalnya dari tombol di tabel atau bagian lain)
    document.getElementById('open-add-modal-btn').addEventListener('click', openAddModal);
</script>


<script>
    function openEditModal(button) {
        // Ambil data dari atribut tombol
        const itemId = button.getAttribute('data-item-id');
        const quantity = button.getAttribute('data-quantity');
        const transactionId = button.getAttribute('data-id');

        // Set nilai-nilai pada modal edit
        document.getElementById('edit-item-id').value = itemId;
        document.getElementById('edit-quantity').value = quantity;
        document.getElementById('edit-transaction-id').value = transactionId;

        // Set form action URL
        const form = document.getElementById('edit-form');
        form.action = `/transactions/${transactionId}`;

        // Tampilkan modal
        toggleModal('modal-edit');
    }

    function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.toggle('hidden');
    }
</script>

<script>
    function openDeleteModal(url) {
        // Set form action URL
        document.getElementById('delete-form').action = url;

        // Tampilkan modal
        toggleModal('delete-confirmation-modal');
    }

    function toggleModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.toggle('hidden');
    }
</script>


</x-layout>
