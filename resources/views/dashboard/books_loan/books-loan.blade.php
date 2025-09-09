<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Data Peminjaman Buku") }}
        </h2>
    </x-slot>

    <div class="sm:rounded-lg">
        <!-- add data -->
        <div class="flex justify-between items-center mb-4 w-full">
            <div>
                <a
                    href="{{ route("books-loan.create") }}"
                    data-modal-target="crud-modal-book-loan"
                    data-modal-toggle="crud-modal-book-loan"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button"
                >
                    Tambah Data Peminjaman
                </a>
            </div>
            <form class="flex items-center max-w-lg" method="GET">
                <label for="voice-search" class="sr-only">Search</label>
                <div class="w-full">
                    <input
                        name="search"
                        value="{{ $search ?? "" }}"
                        type="text"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Cari data buku..."
                        required
                    />
                </div>
                <button
                    type="submit"
                    class="flex items-center justify-center py-2.5 px-3 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                >
                    <svg
                        class="w-4 h-4"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 20 20"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"
                        />
                    </svg>
                </button>
            </form>
        </div>
        <x-table>
            <x-slot:header>
                <th scope="col" class="px-6 py-3">Judul Buku</th>
                <th scope="col" class="px-6 py-3">Nama siswa</th>
                <th scope="col" class="px-6 py-3">Tanggal Meminjam</th>
                <th scope="col" class="px-6 py-3">Tanggal Jatuh Tempo</th>
                <th scope="col" class="px-6 py-3">Tanggal Pengembalian</th>
                <th scope="col" class="px-6 py-3">Jumlah Hari Terlambat</th>
                <th scope="col" class="px-6 py-3">Status Peminjaman</th>
                <th scope="col" class="px-6 py-3">Aksi</th>
            </x-slot>
            @forelse ($loans as $loan)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600"
                >
                    <!-- Title -->
                    <th
                        scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                    >
                        {{ $loan->book->title }}
                    </th>

                    <!-- Student Name -->
                    <td class="px-6 py-4">
                        {{ $loan->student->name }}
                    </td>

                    <!-- loan_date-->
                    <td class="px-6 py-4">
                        {{ $loan->loan_date }}
                    </td>

                    <!-- due_date -->
                    <td class="px-6 py-4">
                        {{ $loan->due_date }}
                    </td>

                    <!-- Return Date -->
                    <td class="px-6 py-4">
                        {{ $loan->return_date ?? "Belum dikembalikan" }}
                    </td>

                    <!-- late days -->
                    <td class="px-6 py-4">{{ $loan->late_days }} Hari</td>

                    <!-- status -->
                    <td class="px-6 py-4">
                        {{ $loan->status === "borrowed" ? "Dipinjam" : "Dikembalikan" }}
                    </td>

                    <!-- Tombol Aksi -->
                    <td class="px-6 py-4 flex gap-4 items-center">
                        <button
                            data-modal-target="edit-modal-book"
                            data-modal-toggle="edit-modal-book"
                            type="button"
                            class="btn-edit font-medium text-blue-600 dark:text-blue-500 hover:underline"
                            href="{{ route("books.edit", $loan->id) }}"
                        >
                            Edit
                        </button>

                        <form
                            method="POST"
                            action="{{ route("books.destroy", $loan->id) }}"
                        >
                            @csrf
                            @method("DELETE")
                            <button
                                type="submit"
                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm p-2 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                            >
                                <svg
                                    class="w-[18px] h-[18px] text-white dark:text-white"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    fill="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center px-6 py-4 text-gray-500">
                        Tidak ada data siswa.
                    </td>
                </tr>
            @endforelse
        </x-table>
        <!-- Pagination -->
        <nav
            class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4"
            aria-label="Table navigation"
        >
            <span
                class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto"
            >
                Showing
                <span class="font-semibold text-gray-900 dark:text-white">
                    1-10
                </span>
                of
                <span class="font-semibold text-gray-900 dark:text-white">
                    1000
                </span>
            </span>
            <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                <li>
                    <a
                        href="#"
                        class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                    >
                        Previous
                    </a>
                </li>
                <li>
                    <a
                        href="#"
                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                    >
                        1
                    </a>
                </li>
                <li>
                    <a
                        href="#"
                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                    >
                        2
                    </a>
                </li>
                <li>
                    <a
                        href="#"
                        aria-current="page"
                        class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white"
                    >
                        3
                    </a>
                </li>
                <li>
                    <a
                        href="#"
                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                    >
                        4
                    </a>
                </li>
                <li>
                    <a
                        href="#"
                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                    >
                        5
                    </a>
                </li>
                <li>
                    <a
                        href="#"
                        class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                    >
                        Next
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</x-app-layout>
