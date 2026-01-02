<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
        >
            {{ __(" ") }}
        </h2>
    </x-slot>
    <div
        class="bg-white dark:bg-gray-800 max-w-xl mx-auto px-6 py-8 lg:py-12 rounded-xl shadow-sm"
    >
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
            Update Profile
        </h2>
        <form
            method="POST"
            action="{{ route("teacher-and-staff.update", $teacher->id) }}"
            enctype="multipart/form-data"
        >
            @csrf
            @method("PUT")
            <div class="grid gap-4 sm:grid-cols-2 grid-cols-1 sm:gap-6">
                <!-- Pilih Buku -->
                <div class="w-full sm:col-span-2">
                    <label
                        for="book_id_add"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >
                        Foto
                    </label>
                </div>
                <!-- Phoot Profile -->
                <div>
                    <img
                        src="{{ asset("storage/" . $teacher->photo ?? "") }}"
                        alt=""
                    />
                    <input type="file" name="photo" id="photo" />
                </div>
                <!-- Nama-->
                <div class="md:col-span-2">
                    <label
                        for="name"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >
                        Nama
                    </label>
                    <input
                        type="text"
                        name="name"
                        id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required
                        value="{{ $teacher->name }}"
                    />
                </div>
                <!-- Jabatan -->
                <div>
                    <label
                        for="position"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >
                        Jabatan
                    </label>
                    <input
                        type="text"
                        name="position"
                        id="position"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required
                        value="{{ $teacher->position }}"
                    />
                </div>

                <!-- Urutan -->
                <div>
                    <label
                        for="order"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                    >
                        Urutan
                    </label>
                    <select
                        name="order"
                        id="order"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        required
                    >
                        <option value="" disabled>Pilih urutan</option>

                        <option
                            value="1"
                            {{ old("order", $teacher->order) == 1 ? "selected" : "" }}
                        >
                            Urutan 1
                        </option>
                        <option
                            value="2"
                            {{ old("order", $teacher->order) == 2 ? "selected" : "" }}
                        >
                            Urutan 2
                        </option>
                        <option
                            value="3"
                            {{ old("order", $teacher->order) == 3 ? "selected" : "" }}
                        >
                            Urutan 3
                        </option>
                    </select>
                </div>
                <!-- Tombol Submit -->
                <div class="sm:col-span-2">
                    <button
                        type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    >
                        Simpan Profile
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
