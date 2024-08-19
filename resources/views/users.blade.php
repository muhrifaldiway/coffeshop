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

    <!-- Tabel Data Items -->
    <div class="overflow-x-auto mt-4">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-800">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">No</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Nama</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Email</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-200 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($users as $no => $user)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $no+1 }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $user->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <!-- Tombol Edit -->
                        <button type="button" class="text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 font-medium rounded-lg text-xs px-3 py-1.5 text-center edit-btn"
                        data-id="{{ $user->id }}"
                        data-name="{{ $user->name }}"
                        data-email="{{ $user->email }}">
                        <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4h8l4-4m-4 4V3m4 4L12 3m-4 4l-4-4m16 16H5"></path>
                        </svg>
                        Edit
                        </button>
                        <!-- Tombol Hapus -->
                        <button class="text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 font-medium rounded-lg text-xs px-3 py-1.5 text-center ml-2 delete-btn" data-url="{{ route('users.destroy', $user) }}">
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

<!-- Modal untuk Edit User -->
<div id="modal-edit" class="fixed inset-0 bg-black bg-opacity-50 items-center flex justify-center hidden">
    <div class="bg-white rounded-lg shadow-lg p-6 w-11/12 md:w-1/3">
        <h2 class="text-xl font-semibold mb-4">Edit User</h2>
        <form id="edit-form" action="" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" id="edit-user-id" name="id">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" id="edit-name" name="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-3" required>
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="edit-email" name="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-3" required>
            </div>
            <div class="mb-4 relative">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="edit-password" name="password" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-3">
                <button type="button" id="toggle-password" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 10-6 0 3 3 0 006 0zM3 12c0-3.313 6-9 9-9s9 5.687 9 9-6 9-9 9S3 15.313 3 12z"/>
                    </svg>
                </button>
                <p class="text-xs text-red-500 mt-1">Kosongkan jika tidak ingin mengubah password</p>
            </div>
            <div class="mb-4 relative">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                <input type="password" id="edit-password-confirmation" name="password_confirmation" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-lg p-3">
                <button type="button" id="toggle-password-confirmation" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 10-6 0 3 3 0 006 0zM3 12c0-3.313 6-9 9-9s9 5.687 9 9-6 9-9 9S3 15.313 3 12z"/>
                    </svg>
                </button>
                <p class="text-xs text-red-500 mt-1">Kosongkan jika tidak ingin mengubah password</p>
            </div>
            <div class="justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Simpan</button>
                <button type="button" class="ml-2 bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600" onclick="toggleModal('modal-edit')">Tutup</button>
            </div>
        </form>
    </div>
</div>



    <!-- Modal Konfirmasi Hapus -->
<div id="delete-confirmation-modal" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity z-50 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-lg shadow-lg max-w-sm w-full p-6">
            <h3 class="text-lg font-semibold mb-4">Konfirmasi Hapus</h3>
            <p class="text-gray-700">Apakah Anda yakin ingin menghapus categories ini?</p>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Fungsi untuk menampilkan atau menyembunyikan modal
        function toggleModal(id) {
            const modal = document.getElementById(id);
            modal.classList.toggle('hidden');
        }

        // Event listener untuk tombol edit
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const email = this.getAttribute('data-email');
                
                // Atur URL action form
                document.getElementById('edit-form').action = `{{ url('users') }}/${id}`;
                
                // Isi data ke dalam form
                document.getElementById('edit-user-id').value = id;
                document.getElementById('edit-name').value = name;
                document.getElementById('edit-email').value = email;
                
                // Kosongkan field password dan konfirmasi password
                document.getElementById('edit-password').value = '';
                document.getElementById('edit-password-confirmation').value = '';
                
                // Tampilkan modal
                toggleModal('modal-edit');
            });
        });

        // Event listener untuk tombol tutup modal
        document.querySelector('#modal-edit .bg-gray-500').addEventListener('click', function () {
            toggleModal('modal-edit');
        });

        // Menutup modal jika klik di luar area modal
        document.getElementById('modal-edit').addEventListener('click', function (e) {
            if (e.target === this) {
                toggleModal('modal-edit');
            }
        });

        // Toggle password visibility
        document.getElementById('toggle-password').addEventListener('click', function () {
            const passwordInput = document.getElementById('edit-password');
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;
            this.querySelector('svg').classList.toggle('hidden', type === 'password');
        });

        document.getElementById('toggle-password-confirmation').addEventListener('click', function () {
            const passwordConfirmationInput = document.getElementById('edit-password-confirmation');
            const type = passwordConfirmationInput.type === 'password' ? 'text' : 'password';
            passwordConfirmationInput.type = type;
            this.querySelector('svg').classList.toggle('hidden', type === 'password');
        });
    });
</script>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Fungsi untuk menampilkan atau menyembunyikan modal
        function toggleModal(id) {
            const modal = document.getElementById(id);
            modal.classList.toggle('hidden');
        }

        // Event listener untuk tombol hapus
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function () {
                const url = this.getAttribute('data-url');
                
                // Atur URL action form hapus
                document.getElementById('delete-form').action = url;
                
                // Tampilkan modal konfirmasi hapus
                toggleModal('delete-confirmation-modal');
            });
        });

        // Event listener untuk tombol batal hapus
        document.getElementById('cancel-delete').addEventListener('click', function () {
            toggleModal('delete-confirmation-modal');
        });

        // Menutup modal jika klik di luar area modal
        document.getElementById('delete-confirmation-modal').addEventListener('click', function (e) {
            if (e.target === this) {
                toggleModal('delete-confirmation-modal');
            }
        });
    });
</script>



</x-layout>
