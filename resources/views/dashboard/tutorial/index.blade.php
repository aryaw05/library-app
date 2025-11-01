<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            {{ __("📘 Tutorial Import Excel Data Siswa") }}
        </h2>
    </x-slot>
    <div class="max-w-5xl rounded-lg bg-white p-8 mt-8">
        {{-- Langkah 1 --}}
        <section class="mb-8">
            <h2 class="text-xl font-semibold mb-3">
                Langkah 1: Sesuaikan Format Excel
            </h2>
            <p class="text-gray-700 mb-3">
                Pastikan file Excel yang akan di import minimal memiliki
                beberapa kolom seperti di bawah ini.
            </p>

            <div class="overflow-x-auto mb-3">
                <table class="min-w-full border border-gray-300 text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2 text-left">Nama</th>
                            <th class="border px-4 py-2 text-left">NIS</th>
                            <th class="border px-4 py-2 text-left">Kelas</th>
                            <th class="border px-4 py-2 text-left">
                                Jenis Kelamin
                            </th>
                            <th class="border px-4 py-2 text-left">
                                Tanggal Lahir
                            </th>
                            <th class="border px-4 py-2 text-left">Alamat</th>
                            <th class="border px-4 py-2 text-left">
                                No Telepon
                            </th>
                            <th class="border px-4 py-2 text-left">Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2">Putra</td>
                            <td class="border px-4 py-2">12345</td>
                            <td class="border px-4 py-2">X IPA 1</td>
                            <td class="border px-4 py-2">Laki-laki</td>
                            <td class="border px-4 py-2">2007-05-10</td>
                            <td class="border px-4 py-2">Jl. Melati No. 12</td>
                            <td class="border px-4 py-2">081234567890</td>
                            <td class="border px-4 py-2">putra@gmail.com</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div
                class="p-3 bg-yellow-50 border-l-4 border-yellow-400 text-yellow-800 text-sm"
            >
                ⚠️
                <strong>Catatan:</strong>
                Gunakan nama kolom seperti di atas , agar sistem dapat membaca
                file excel.
            </div>
        </section>

        {{-- Langkah 2 --}}
        <section class="mb-8">
            <h2 class="text-xl font-semibold mb-3">
                Langkah 2: Isi Data Siswa
            </h2>
            <ul class="list-disc ml-6 text-gray-700 space-y-1">
                <li>Isi data siswa sesuai kolom yang tersedia.</li>
                <li>
                    <strong>nis</strong>
                    harus unik (setiap siswa memiliki nis unik).
                </li>
                <li>
                    <strong>nama</strong>
                    Format penulisan bebas , (contoh:
                    <code>Putra</code>
                    ) .
                </li>
                <li>
                    <strong>gender</strong>
                    Format penulisan bebas , bisa diisi dengan
                    <code>Laki-laki</code>
                    atau
                    <code>Perempuan</code>
                    <strong>(Opsional)</strong>
                    .
                </li>
                <li>
                    <strong>tanggal_lahir</strong>
                    gunakan format
                    <code>YYYY-MM-DD</code>
                    (contoh: 2007-05-10)
                    <strong>(Opsional)</strong>
                    .
                </li>
                <li>
                    <strong>no_telepon</strong>
                    ditulis tanpa spasi atau tanda hubung.
                    <strong>(Opsional)</strong>
                    .
                </li>
                <li>
                    <strong>email</strong>
                    harus memiliki format yang valid (contoh:
                    <code>user@example.com</code>
                    )
                    <strong>(Opsional)</strong>
                    .
                </li>
                <li>Pastikan tidak ada baris kosong di tengah data.</li>
            </ul>
        </section>

        {{-- Langkah 3 --}}
        <section class="mb-8">
            <h2 class="text-xl font-semibold mb-3">
                Langkah 3: Simpan File Excel
            </h2>
            <p class="text-gray-700 mb-3">
                Setelah data selesai diisi, simpan file dengan format:
            </p>
            <ul class="list-disc ml-6 text-gray-700 space-y-1">
                <li>
                    <code>.xlsx</code>
                    (Excel Workbook)
                </li>
                <li>
                    <code>.xls</code>
                </li>
                <li>
                    <code>.csv</code>
                </li>
            </ul>
            <p class="mt-2 text-sm text-gray-600">
                Contoh nama file:
                <code>data_siswa_2025.xlsx</code>
            </p>
        </section>

        {{-- Langkah 4 --}}
        <section class="mb-8">
            <h2 class="text-xl font-semibold mb-3">
                Langkah 4: Buka Menu Import di Halaman Data Siswa
            </h2>
            <ol class="list-decimal ml-6 text-gray-700 space-y-1">
                <li>
                    Buka menu
                    <strong>Data Siswa → Import Excel</strong>
                    .
                </li>
                <li>
                    Klik tombol
                    <strong>“Pilih File”</strong>
                    lalu cari file Excel yang sudah di isi.
                </li>
                <li>
                    Klik
                    <strong>“Import File</strong>
                    .
                </li>
            </ol>
        </section>

        {{-- Langkah 5 --}}
        <section class="mb-8">
            <h2 class="text-xl font-semibold mb-3">Langkah 5: Validasi Data</h2>
            <p class="text-gray-700 mb-2">
                Sistem akan memeriksa isi file. Jika ada kesalahan, sistem akan
                menampilkan pesan error seperti:
            </p>
            <pre
                class="bg-gray-100 p-3 rounded text-sm text-gray-800 border border-gray-300"
            >
Baris 5: Format tanggal_lahir tidak valid
Baris 8: nis sudah terdaftar
        </pre
            >
            <p class="text-gray-700 mt-2">
                Perbaiki file Excel sesuai pesan error, lalu lakukan import
                ulang.
            </p>
        </section>

        {{-- Langkah 6 --}}
        <section>
            <h2 class="text-xl font-semibold mb-3">Langkah 6: Selesai</h2>
            <p class="text-gray-700">
                Jika proses berhasil, akan muncul notifikasi seperti:
            </p>
            <pre
                class="bg-green-50 border border-green-400 text-green-800 p-3 rounded text-sm"
            >
✅ Import berhasil! 50 data siswa telah ditambahkan.
        </pre
            >
            <p class="text-gray-700 mt-2">
                Sekarang semua data siswa sudah masuk ke sistem dan dapat
                dilihat di halaman
                <strong>Data Siswa</strong>
                .
            </p>
        </section>
    </div>
</x-app-layout>
