<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __("⚽ Ekstrakurikuler") }}
        </h2>
    </x-slot>
    <div>
        <h1>hai</h1>
        <img
            src="{{ asset("storage/" . $extracurricular->photo ?? "") }}"
            alt=""
            class="max-h-72"
        />

        <!-- Description -->
        <div class="mt-4">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                Deskripsi
            </h2>
            <p class="mt-2">
                {{ $extracurricular->description }}
            </p>
        </div>

        <div>
            <button
                data-modal-target="crud-modal"
                data-modal-toggle="crud-modal"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button"
            >
                Tambah Prestasi
            </button>
        </div>

        <!-- table -->
        <x-table>
            <x-slot:header>
                <th scope="col" class="px-6 py-3">Nama Lomba</th>
                <th scope="col" class="px-6 py-3">Tingkat</th>
                <th scope="col" class="px-6 py-3">Tanggal</th>
                <th scope="col" class="px-6 py-3">Deskripsi</th>
                <th scope="col" class="px-6 py-3">Aksi</th>
            </x-slot>

            @forelse ($extracurricular->achievements as $achievement)
                <tr
                    class="bg-neutral-primary-soft border-b border-default hover:bg-neutral-secondary-medium"
                >
                    <td class="px-6 py-4">{{ $achievement->title }}</td>
                    <td class="px-6 py-4">{{ $achievement->level }}</td>
                    <td class="px-6 py-4">
                        {{ $achievement->year }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $achievement->description }}
                    </td>
                    <td class="px-6 py-4 flex gap-4 items-center">
                        <button
                            class="btn-edit font-medium text-blue-600 dark:text-blue-500 hover:underline"
                            aria-hidden="true"
                            type="button"
                            data-modal-target="crud-modal-achievement"
                            data-modal-toggle="crud-modal-achievement"
                            data-title="{{ $achievement->title }}"
                            data-level="{{ $achievement->level }}"
                            data-year="{{ $achievement->year }}"
                            data-action="{{ route("extracurriculars.achievements.update", [$extracurricular, $achievement]) }}"
                            data-description="{{ $achievement->description }}"
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
                            data-modal-target="delete-modal-achievement"
                            data-modal-toggle="delete-modal-achievement"
                            type="button"
                            class="btn-delete focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm p-2 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                            data-action="{{ route("extracurriculars.achievements.destroy", [$extracurricular, $achievement]) }}"
                        >
                            <svg
                                class="w-[18px] h-[18px] text-white dark:text-white"
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
                        Tidak ada data Prestasi.
                    </td>
                </tr>
            @endforelse
        </x-table>
    </div>

    <!-- Modal For Add Data -->
    @include("dashboard.extracurriculars.achievement.add-form")

    <!-- Modal For Edit Data -->
    @include("dashboard.extracurriculars.achievement.update-form")

    <!-- delete Modal -->
    <x-delete-modal id="delete-modal-achievement" />
</x-app-layout>
