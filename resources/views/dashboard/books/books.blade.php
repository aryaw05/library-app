<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Data Buku") }}
        </h2>
    </x-slot>

    <div class="sm:rounded-lg">
        <!-- add data -->
        <div class="flex justify-between items-center mb-4 w-full">
            <div>
                <button
                    data-modal-target="crud-modal-book"
                    data-modal-toggle="crud-modal-book"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button"
                >
                    Tambah Data Buku
                </button>
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
                    name="search"
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
        <x-table :pagination="$books">
            <x-slot:header>
                <th scope="col" class="px-6 py-3">Judul Buku</th>
                <th scope="col" class="px-6 py-3">Author</th>
                <th scope="col" class="px-6 py-3">Tahun</th>
                <th scope="col" class="px-6 py-3">Stock</th>
                <th scope="col" class="px-6 py-3">Kategori</th>
                <th scope="col" class="px-6 py-3">Aksi</th>
            </x-slot>
            @forelse ($books as $book)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 hover:bg-gray-50 dark:hover:bg-gray-600"
                >
                    <!-- Title -->
                    <th
                        scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                    >
                        {{ $book->title }}
                    </th>

                    <!-- Author -->
                    <td class="px-6 py-4">
                        {{ $book->author }}
                    </td>

                    <!-- Year -->
                    <td class="px-6 py-4">
                        {{ $book->year }}
                    </td>

                    <!-- STOCK -->
                    <td class="px-6 py-4">
                        {{ $book->stock }}
                    </td>

                    <!-- book code -->
                    <td class="px-6 py-4">
                        {{ $book->category }}
                    </td>

                    <!-- Tombol Aksi -->
                    <td class="px-6 py-4 flex gap-4 items-center">
                        <button
                            data-modal-target="edit-modal-book"
                            data-modal-toggle="edit-modal-book"
                            data-title="{{ $book->title }}"
                            data-author="{{ $book->author }}"
                            data-year="{{ $book->year }}"
                            data-stock="{{ $book->stock }}"
                            data-category="{{ $book->category }}"
                            data-action="{{ route("books.update", $book->id) }}"
                            type="button"
                            class="btn-edit font-medium text-blue-600 dark:text-blue-500 hover:underline"
                            href="{{ route("books.edit", $book->id) }}"
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
                        </button>

                        <button
                            data-modal-target="delete-modal-book"
                            data-modal-toggle="delete-modal-book"
                            type="submit"
                            class="btn-delete focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm p-2 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                            data-action="{{ route("books.destroy", $book->id) }}"
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
    <!-- Modal for add data -->
    @include("dashboard.books.partials.add-form")

    <!-- Modal for edit data -->
    @include("dashboard.books.partials.update-form")

    <!-- delete Modal -->
    <x-delete-modal id="delete-modal-book" />
</x-app-layout>
