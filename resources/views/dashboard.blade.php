<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Overview") }}
        </h2>
    </x-slot>

    <div class="h-screen">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            <div
                class="lg:max-w-sm p-6 bg-white rounded-2xl shadow-lg dark:bg-gray-800 dark:border-gray-700"
            >
                <svg
                    class="w-7 h-7 text-gray-500 dark:text-gray-400 mb-3"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                >
                    <path
                        d="M18 5h-.7c.229-.467.349-.98.351-1.5a3.5 3.5 0 0 0-3.5-3.5c-1.717 0-3.215 1.2-4.331 2.481C8.4.842 6.949 0 5.5 0A3.5 3.5 0 0 0 2 3.5c.003.52.123 1.033.351 1.5H2a2 2 0 0 0-2 2v3a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7a2 2 0 0 0-2-2ZM8.058 5H5.5a1.5 1.5 0 0 1 0-3c.9 0 2 .754 3.092 2.122-.219.337-.392.635-.534.878Zm6.1 0h-3.742c.933-1.368 2.371-3 3.739-3a1.5 1.5 0 0 1 0 3h.003ZM11 13H9v7h2v-7Zm-4 0H2v5a2 2 0 0 0 2 2h3v-7Zm6 0v7h3a2 2 0 0 0 2-2v-5h-5Z"
                    />
                </svg>
                <a href="#">
                    <h5
                        class="mb-2 text-2xl lg:text-5xl font-semibold tracking-tight text-gray-900 dark:text-white"
                    >
                       {{ $studentsAll }}
                    </h5>
                </a>
                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">
                    Siswa terdaftar
                </p>
                <a
                    href="#"
                    class="inline-flex font-medium items-center text-blue-600 hover:underline"
                >
                    Lihat Selengkapnya
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
            </div>
             <div
                class="lg:max-w-sm p-6 bg-white rounded-2xl shadow-lg dark:bg-gray-800 dark:border-gray-700"
            >
                <svg
                    class="w-7 h-7 text-gray-500 dark:text-gray-400 mb-3"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                >
                    <path
                        d="M18 5h-.7c.229-.467.349-.98.351-1.5a3.5 3.5 0 0 0-3.5-3.5c-1.717 0-3.215 1.2-4.331 2.481C8.4.842 6.949 0 5.5 0A3.5 3.5 0 0 0 2 3.5c.003.52.123 1.033.351 1.5H2a2 2 0 0 0-2 2v3a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7a2 2 0 0 0-2-2ZM8.058 5H5.5a1.5 1.5 0 0 1 0-3c.9 0 2 .754 3.092 2.122-.219.337-.392.635-.534.878Zm6.1 0h-3.742c.933-1.368 2.371-3 3.739-3a1.5 1.5 0 0 1 0 3h.003ZM11 13H9v7h2v-7Zm-4 0H2v5a2 2 0 0 0 2 2h3v-7Zm6 0v7h3a2 2 0 0 0 2-2v-5h-5Z"
                    />
                </svg>
                <a href="#">
                    <h5
                        class="mb-2 text-2xl lg:text-5xl font-semibold tracking-tight text-gray-900 dark:text-white"
                    >
                         {{ $booksLoanAll }}
                    </h5>
                </a>
                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">
                    Buku sedang di pinjam
                </p>
                <a
                    href="#"
                    class="inline-flex font-medium items-center text-blue-600 hover:underline"
                >
                    Lihat Selengkapnya
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
            </div>
             <div
                class="lg:max-w-sm p-6 bg-white rounded-2xl shadow-lg dark:bg-gray-800 dark:border-gray-700"
            >
                <svg
                    class="w-7 h-7 text-gray-500 dark:text-gray-400 mb-3"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                >
                    <path
                        d="M18 5h-.7c.229-.467.349-.98.351-1.5a3.5 3.5 0 0 0-3.5-3.5c-1.717 0-3.215 1.2-4.331 2.481C8.4.842 6.949 0 5.5 0A3.5 3.5 0 0 0 2 3.5c.003.52.123 1.033.351 1.5H2a2 2 0 0 0-2 2v3a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7a2 2 0 0 0-2-2ZM8.058 5H5.5a1.5 1.5 0 0 1 0-3c.9 0 2 .754 3.092 2.122-.219.337-.392.635-.534.878Zm6.1 0h-3.742c.933-1.368 2.371-3 3.739-3a1.5 1.5 0 0 1 0 3h.003ZM11 13H9v7h2v-7Zm-4 0H2v5a2 2 0 0 0 2 2h3v-7Zm6 0v7h3a2 2 0 0 0 2-2v-5h-5Z"
                    />
                </svg>
                <a href="#">
                    <h5
                        class="mb-2 text-2xl lg:text-5xl font-semibold tracking-tight text-gray-900 dark:text-white"
                    >
                        {{ $booksAll }}
                    </h5>
                </a>
                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">
                    Buku Terdaftar
                </p>
                <a
                    href="#"
                    class="inline-flex font-medium items-center text-blue-600 hover:underline"
                >
                    Lihat Selengkapnya
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
            </div>
        </div>
         <div class="sm:rounded-lg mt-12">
                <!-- add data -->
                <div class="flex justify-between items-center mb-4 w-full">
                        <h1>Overview Data Peminjaman Buku</h1>
                        <form class="flex items-center max-w-lg" method="GET">
                            <label for="voice-search" class="sr-only">
                                Search
                            </label>
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
                        <th scope="col" class="px-6 py-3">
                            Tanggal Jatuh Tempo
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Pengembalian
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jumlah Hari Terlambat
                        </th>
                        <th scope="col" class="px-6 py-3">Status Peminjaman</th>
                  
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
                            <td class="px-6 py-4">
                                {{ $loan->late_days }} Hari
                            </td>

                            <!-- status -->
                            <td class="px-6 py-4">
                                {{ $loan->status === "borrowed" ? "Dipinjam" : ($loan->status === "returned" ? "Dikembalikan" : ($loan->status === "returned_late" ? "Dikembalikan Terlambat" : "Terlambat")) }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td
                                colspan="7"
                                class="text-center px-6 py-4 text-gray-500"
                            >
                                Tidak ada data siswa.
                            </td>
                        </tr>
                    @endforelse
                </x-table>
            </div>
    </div>
</x-app-layout>
