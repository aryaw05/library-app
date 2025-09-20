<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Overview") }}
        </h2>
    </x-slot>

    <div class="h-screen">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">
            <x-card-stats
                :stats="$booksAll"
                title="Total Buku"
                link="{{ route('books.index') }}"
                downloadLink="{{ route('books.export') }}"
            >
                <svg
                    class="w-[35px] h-[35px] text-gray-500 dark:text-white mb-2"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        fill-rule="evenodd"
                        d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z"
                        clip-rule="evenodd"
                    />
                </svg>
            </x-card-stats>

            <x-card-stats
                :stats="$booksLoanAll"
                title="Total Buku Sedang Dipinjam"
                link="{{ route('books-loan.index') }}"
                downloadLink="{{ route('loans.export') }}"
            >
                <svg
                    class="w-[35px] h-[35px] text-gray-500 dark:text-white mb-2"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 16h13M4 16l4-4m-4 4 4 4M20 8H7m13 0-4 4m4-4-4-4"
                    />
                </svg>
            </x-card-stats>

            <x-card-stats
                :stats="$studentsAll"
                title="Total Siswa"
                link="{{ route('students.index') }}"
                downloadLink="{{ route('students.export') }}"
            >
                <svg
                    class="w-[35px] h-[35px] text-gray-500 dark:text-white mb-2"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        fill-rule="evenodd"
                        d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z"
                        clip-rule="evenodd"
                    />
                </svg>
            </x-card-stats>
            <x-card-stats
                :stats="$visitorAll"
                title="Daftar Pengunjung"
                link="{{ route('books-loan.index') }}"
                downloadLink="{{ route('visitors.export') }}"
            >
                <svg
                    class="w-[35px] h-[35px] text-gray-500 dark:text-white mb-2"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        d="M13.5 2c-.178 0-.356.013-.492.022l-.074.005a1 1 0 0 0-.934.998V11a1 1 0 0 0 1 1h7.975a1 1 0 0 0 .998-.934l.005-.074A7.04 7.04 0 0 0 22 10.5 8.5 8.5 0 0 0 13.5 2Z"
                    />
                    <path
                        d="M11 6.025a1 1 0 0 0-1.065-.998 8.5 8.5 0 1 0 9.038 9.039A1 1 0 0 0 17.975 13H11V6.025Z"
                    />
                </svg>
            </x-card-stats>
        </div>

        <div class="sm:rounded-lg mt-12">
            <!-- add data -->
            <div class="flex justify-between items-center mb-4 w-full">
                <h1>Overview Data Peminjaman Buku</h1>
                <form class="flex items-center max-w-lg" method="GET">
                    <label for="voice-search" class="sr-only">Search</label>
                    <div class="w-full">
                        <input
                            name="search"
                            type="text"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-4 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Cari data buku..."
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
        </div>

        <x-table :pagination="$loans">
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
                        {{ \Carbon\Carbon::parse($loan->loan_date)->format("d-m-Y") }}
                    </td>

                    <!-- due_date -->
                    <td class="px-6 py-4">
                        {{ \Carbon\Carbon::parse($loan->due_date)->format("d-m-Y") }}
                    </td>

                    <!-- Return Date -->
                    <td class="px-6 py-4">
                        {{ \Carbon\Carbon::parse($loan->return_date)->format("d-m-Y") }}
                    </td>

                    <!-- late days -->
                    <td class="px-6 py-4">{{ $loan->late_days }} Hari</td>

                    <!-- status -->
                    <td class="px-6 py-4">
                        {{ $loan->status === "borrowed" ? "Dipinjam" : ($loan->status === "returned" ? "Dikembalikan" : ($loan->status === "returned_late" ? "Dikembalikan Terlambat" : "Terlambat")) }}
                    </td>

                    <td class="px-6 py-4">
                        <a
                            class="inline-flex font-medium items-center text-blue-600 hover:underline"
                            href="{{ route("books-loan.index", ["search" => $loan->id]) }}"
                        >
                            Selengkapnya
                            <svg
                                class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 18 18"
                            >
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"
                                />
                            </svg>
                        </a>
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
    </div>
</x-app-layout>
