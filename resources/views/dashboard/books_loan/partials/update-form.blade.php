<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
        >
            {{ __("Edit Peminjaman Buku") }}
        </h2>
    </x-slot>
    <div
        class="bg-white dark:bg-gray-800 max-w-xl mx-auto px-6 py-8 lg:py-12 rounded-xl shadow-sm"
    >
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
            Add a new product
        </h2>
        <form
            method="POST"
            action="{{ route("books-loan.update", $bookLoan->id) }}"
        >
            @csrf
            @method("PUT")
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <!-- Pilih Buku -->
                <div class="w-full sm:col-span-2">
                    <label
                        for="book_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >
                        Judul Buku
                    </label>
                    <input
                        type="hidden"
                        name="book_id"
                        value="{{ $bookLoan->book->id }}"
                    />
                    <input
                        readonly
                        id="book_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required
                        value="{{ $bookLoan->book->title }}"
                    />
                </div>

                <!-- Pilih Siswa -->
                <div class="w-full sm:col-span-2">
                    <label
                        for="student_id"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >
                        Nama Siswa Peminjam
                    </label>
                    <input
                        type="hidden"
                        name="student_id"
                        value="{{ $bookLoan->student->id }}"
                    />
                    <input
                        id="student_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        readonly
                        value="{{ $bookLoan->student->name }}"
                    />
                </div>

                <!-- Tanggal Pinjam -->
                <div>
                    <label
                        for="loan_date"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >
                        Tanggal Pinjam
                    </label>
                    <input
                        type="date"
                        name="loan_date"
                        id="loan_date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{ $bookLoan->loan_date }}"
                    />
                </div>

                <!-- Tanggal Jatuh Tempo -->
                <div>
                    <label
                        for="due_date"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >
                        Tanggal Jatuh Tempo
                    </label>
                    <input
                        type="date"
                        name="due_date"
                        id="due_date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        value="{{ $bookLoan->due_date }}"
                    />
                </div>
                <!-- Tombol Submit -->
                <div class="sm:col-span-2">
                    <button
                        type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    >
                        Simpan Peminjaman
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
