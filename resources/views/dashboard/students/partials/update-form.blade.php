<x-app-layout>
    <x-slot name="header">
        <h2
            class="font-semibold text-xl text-gray-800 leading-tight text-center"
        >
            {{ __("Edit Data Siswa") }}
        </h2>
    </x-slot>

    <section>
        <div
            class="bg-white dark:bg-gray-800 max-w-xl mx-auto px-6 py-8 lg:py-12 rounded-xl shadow-sm"
        >
            <form
                method="POST"
                id="editForm"
                class="p-4 md:p-5"
                action="{{ route("students.update", $student->id) }}"
            >
                @csrf
                @method("PUT")
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <!-- Name -->
                    <div class="col-span-2">
                        <label
                            for="name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                            Nama
                        </label>
                        <input
                            type="text"
                            name="name"
                            id="edit_name"
                            value="{{ old("name", $student->name) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="John Doe"
                            required
                        />
                    </div>

                    <!-- NIS -->
                    <div class="col-span-2 sm:col-span-1">
                        <label
                            for="nis"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                            NIS
                        </label>
                        <input
                            type="text"
                            name="nis"
                            id="edit_nis"
                            value="{{ old("nis", $student->nis) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="03284"
                            required
                        />
                    </div>

                    <!-- Class -->
                    <div class="col-span-2 sm:col-span-1">
                        <label
                            for="class"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                            Kelas
                        </label>
                        <input
                            type="text"
                            name="class"
                            id="edit_class"
                            value="{{ old("class", $student->class) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            placeholder="10-A"
                            required
                        />
                    </div>

                    <!-- Gender -->
                    <div class="col-span-2 sm:col-span-1">
                        <label
                            for="gender"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                            Gender
                        </label>
                        <input
                            type="text"
                            name="gender"
                            id="edit_gender"
                            disabled
                            value="{{ old("gender", $student->gender === "M" ? "Laki-laki" : ($student->gender === "F" ? "Perempuan" : "-")) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        />
                    </div>

                    <!-- Birth Date -->
                    <div class="col-span-2 sm:col-span-1">
                        <label
                            for="birth_date"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                            Tanggal Lahir
                        </label>
                        <input
                            type="date"
                            name="birth_date"
                            id="edit_birth_date"
                            value="{{ old("birth_date", $student->birth_date) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                        />
                    </div>

                    <!-- Phone -->
                    <div class="col-span-2 sm:col-span-1">
                        <label
                            for="edit_phone"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                            Nomor Telepon
                        </label>
                        <input
                            type="text"
                            name="phone"
                            id="edit_phone"
                            value="{{ old("phone", $student->phone) }}"
                            placeholder="08123456789"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        />
                    </div>

                    <!-- Email -->
                    <div class="col-span-2 sm:col-span-1">
                        <label
                            for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                            Email
                        </label>
                        <input
                            type="email"
                            name="email"
                            id="edit_email"
                            value="{{ old("email", $student->email) }}"
                            placeholder="example@email.com"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                        />
                    </div>

                    <!-- Address -->
                    <div class="col-span-2">
                        <label
                            for="address"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                        >
                            Alamat
                        </label>
                        <textarea
                            id="edit_address"
                            name="address"
                            rows="3"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-600 dark:border-gray-500 dark:text-white"
                            placeholder="Tuliskan alamat lengkap"
                        >
{{ old("address", $student->address) }}</textarea
                        >
                    </div>
                </div>

                <!-- Submit Button -->
                <button
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
                    Update Siswa
                </button>
            </form>
        </div>
    </section>
</x-app-layout>
