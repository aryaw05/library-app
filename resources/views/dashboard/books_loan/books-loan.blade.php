<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __("🔁 Data Peminjaman Buku") }}
        </h2>
    </x-slot>

    <div class="sm:rounded-lg">
        <!-- add data -->
        <div class="flex justify-between items-center mb-4 w-full">
            <div>
                <form action="{{ route("books-loan.create") }}" method="GET">
                    <button
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="submit"
                    >
                    <span class="hidden md:block">Tambah Data</span>
                    <span class="md:hidden text-xl">+</span>
                    </button>
                </form>
            </div>

            <div class="flex items-center gap-3 justify-center">
                <!-- dropdown search by status -->
                @php
                    $statusLabels = [
                        "borrowed" => "Dipinjam",
                        "returned" => "Dikembalikan",
                        "returned_late" => "Dikembalikan Terlambat",
                    ];
                    $selectedStatus = $statusLabels[$search] ?? "Semua";
                @endphp

                <button
                    id="dropdownDefaultButton"
                    data-dropdown-toggle="dropdown-books-loan"
                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 flex items-center"
                    type="button"
                >
                        {{ $selectedStatus }}
                    <svg
                        class="w-2.5 h-2.5 ms-3"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 10 6"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="m1 1 4 4 4-4"
                        />
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div
                    id="dropdown-books-loan"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-gray-700"
                >
                    <ul
                        class="py-2 text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="dropdownDefaultButton"
                    >
                        <li>
                            <a
                                name="search"
                                href="?search=borrowed"
                                href=""
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                            >
                                Dipinjam
                            </a>
                        </li>
                        <li>
                            <a
                                href="?search=returned"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                            >
                                Dikembalikan
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ url()->current() }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                            >
                                Semua
                            </a>
                        </li>
                        <li>
                            <a
                                href="?search=returned_late"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                            >
                                Dikembalikan Terlambat
                            </a>
                        </li>
                    </ul>
                </div>
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

                    <!-- Tombol Aksi -->
                    <td class="px-6 py-4 flex gap-4 items-center">
                        <form
                            action="{{ route("books-loan.edit", $loan->id) }}"
                            method="GET"
                        >
                            <button
                                type="submit"
                                class="btn-edit font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                {{ $loan->status !== "borrowed" ? "disabled" : "" }}
                            >
                                <svg
                                    class="w-6 h-6 text-gray-800 dark:text-white"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"
                                    />
                                </svg>
                            </>
                        </form>

                        <form
                            method="POST"
                            action="{{ route("books-loan.return", $loan->id) }}"
                        >
                            @csrf
                            @method("PUT")
                            <button
                                type="submit"
                                class="focus:outline-none text-green-600 dark:text-green-500 hover:underline"
                                {{ $loan->status !== "borrowed" ? "disabled" : "" }}
                            >
                                <svg
                                    class="w-6 h-6 text-green-600 dark:text-white"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24"
                                    height="24"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m16 10 3-3m0 0-3-3m3 3H5v3m3 4-3 3m0 0 3 3m-3-3h14v-3"
                                    />
                                </svg>
                            </button>
                        </form>
                        <button
                            data-modal-target="delete-modal-loan"
                            data-modal-toggle="delete-modal-loan"
                            type="button"
                            class="btn-delete focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm p-2 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                            data-action="{{ route("books-loan.destroy", $loan->id) }}"
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

    <x-delete-modal id="delete-modal-loan" />
</x-app-layout>
