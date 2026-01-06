<x-modal-form id="crud-modal-achievement" title="Edit Prestasi Ekstrakurikuler">
    <form method="POST" action="" id="editForm" class="p-4 md:p-5">
        @csrf
        @method("PUT")
        <div class="grid gap-4 mb-4 md:grid-cols-2 grid-cols-1">
            <!-- Name -->
            <div class="col-span-2 sm:col-span-2">
                <label
                    for="title"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >
                    Nama Lomba
                </label>
                <input
                    type="text"
                    name="title"
                    id="edit-title"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder="Contoh: Olimpiade Sains Nasional"
                    required
                />
            </div>
            <!-- Tingkat -->
            <div class="col-span-2 sm:col-span-1">
                <label
                    for="level"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >
                    Tingkat
                </label>
                <input
                    type="text"
                    name="level"
                    id="edit-level"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    placeholder="Contoh: Nasional"
                    required
                />
            </div>

            <!-- Tahun -->
            <div class="col-span-2 sm:col-span-1">
                <label
                    for="year"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >
                    Tanggal
                </label>
                <input
                    type="date"
                    name="year"
                    id="edit-year"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                    required
                />
            </div>

            <!-- Description -->
            <div class="col-span-2">
                <label
                    for="description"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                >
                    Deskripsi
                </label>
                <textarea
                    id="edit-description"
                    name="description"
                    rows="3"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                    placeholder="Tuliskan deskripsi prestasi..."
                ></textarea>
            </div>
        </div>

        <!-- Submit Button -->
        <button
            data-modal-hide="crud-modal"
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
            Update Prestasi
        </button>
    </form>
</x-modal-form>

<script>
    document.querySelectorAll('.btn-edit').forEach((button) => {
        button.addEventListener('click', function () {
            document.getElementById('editForm').action =
                this.dataset.action || '';
            document.getElementById('edit-title').value =
                this.dataset.title || '';
            document.getElementById('edit-level').value =
                this.dataset.level || '';
            document.getElementById('edit-year').value =
                this.dataset.year || '';
            document.getElementById('edit-description').value =
                this.dataset.description || '';
        });
    });
</script>
