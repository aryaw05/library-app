<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Data Keterlambatan Buku") }}
        </h2>
    </x-slot>
    <div class="sm:rounded-lg">
        <div class="flex justify-between items-center mb-4 w-full">
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
        <x-table :pagination="$loans">
            <x-slot:header>
                <th scope="col" class="px-6 py-3">Judul Buku</th>
                <th scope="col" class="px-6 py-3">Nama siswa</th>
                <th scope="col" class="px-6 py-3">Tanggal Meminjam</th>
                <th scope="col" class="px-6 py-3">Tanggal Jatuh Tempo</th>
                <th scope="col" class="px-6 py-3">Tanggal Pengembalian</th>
                <th scope="col" class="px-6 py-3">Jumlah Hari Terlambat</th>
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
                    <td class="px-6 py-4">{{ $loan->late_days }} Hari</td>

                    <!-- status -->
                    <td class="px-6 py-4">
                        {{ $loan->status === "borrowed" ? "Dipinjam" : ($loan->status === "returned" ? "Dikembalikan" : ($loan->status === "returned_late" ? "Dikembalikan Terlambat" : "Terlambat")) }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="px-6 py-4 text-gray-500 text-center" colspan="7">
                        Tidak ada data keterlambatan buku.
                    </td>
                </tr>
            @endforelse
        </x-table>
    </div>
</x-app-layout>
