<x-modal-form id="edit-modal-book" title="Edit Data Buku">
    <form method="POST" class="p-4 md:p-5" id="editForm" action="">
        @method("PUT")
        @csrf
        <div class="grid gap-4 mb-4 grid-cols-2">
            <!-- Name -->
            <div class="col-span-2 sm:col-span-2">
                <label
                    for="name"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >
                    Judul Buku
                </label>
                <input
                    type="text"
                    name="title"
                    id="edit-title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder="Masukkan nama buku..."
                    required
                />
            </div>
            <!-- Author -->
            <div class="col-span-2 sm:col-span-1">
                <label
                    for="author"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >
                    Pengarang
                </label>
                <input
                    type="text"
                    name="author"
                    id="edit-author"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder="Masukkan nama pengarang..."
                    required
                />
            </div>

            <!-- year -->
            <div class="col-span-2 sm:col-span-1">
                <label
                    for="year"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >
                    Tahun Terbit
                </label>
                <input
                    type="number"
                    name="year"
                    id="edit-year"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder="Contoh: 2020"
                    required
                    min="1000"
                    max="{{ date("Y") }}"
                />
            </div>

            <!-- Stock -->
            <div class="col-span-2 sm:col-span-1">
                <label
                    for="stock"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >
                    Stok
                </label>
                <input
                    type="number"
                    name="stock"
                    id="edit-stock"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder="Contoh : 10"
                    required
                />
            </div>

            <!-- Book Code -->
            <div class="col-span-2 sm:col-span-1">
                <label
                    for="category"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >
                    Kategori
                </label>
                <input
                    type="text"
                    name="category"
                    id="edit-category"
                    placeholder="Contoh: Fiksi"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                />
            </div>
        </div>
        <!-- Submit Button -->
        <button
            data-modal-hide="edit-modal-book"
            type="submit"
            class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
        >
            <svg
                class="me-1 -ms-1 w-5 h-5"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    fill-rule="evenodd"
                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                    clip-rule="evenodd"
                ></path>
            </svg>
            Tambah Siswa
        </button>
    </form>
</x-modal-form>

<script>
    document.querySelectorAll('.btn-edit').forEach((button) => {
        button.addEventListener('click', function () {
            document.getElementById('editForm').action = this.dataset.action;
            document.getElementById('edit-title').value =
                this.dataset.title || '';
            document.getElementById('edit-author').value =
                this.dataset.author || '';
            document.getElementById('edit-year').value =
                this.dataset.year || '';
            document.getElementById('edit-stock').value =
                this.dataset.stock || '';
            document.getElementById('edit-category').value =
                this.dataset.category || '';
        });
    });
</script>
