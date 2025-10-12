<!DOCTYPE html>
<html
    class="!scroll-smooth"
    lang="{{ str_replace("_", "-", app()->getLocale()) }}"
>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>SDN JAJAR TUNGGAL III</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link
            href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600"
            rel="stylesheet"
        />
        @vite(["resources/css/app.css", "resources/js/app.js"])
        @vite("resources/js/home.js")
    </head>
    <body>
        <nav
            class="w-full fixed fixed-top border-gray-200 dark:bg-gray-900 duration-200 ease-in z-50"
            id="navbar"
        >
            <div
                class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4"
            >
                <a href="" class="flex items-center justify-center nav-text">
                    <img
                        src="{{ asset("images/logo.png") }}"
                        alt="Logo"
                        class="w-16 h-auto"
                    />
                    <h1>SDN JAJAR TUNGGAL III/452</h1>
                </a>
                <div
                    class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse"
                >
                    @if (Route::has("login"))
                        <nav class="flex items-center justify-end gap-4">
                            @auth
                                <form
                                    action="{{ route("dashboard") }}"
                                    method="GET"
                                >
                                    @csrf
                                    <button
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 md:px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 shadow-2xl duration-300 ease-in shadow-blue-200"
                                    >
                                        Dashboard
                                    </button>
                                </form>
                            @else
                                <form
                                    action="{{ route("login") }}"
                                    method="GET"
                                >
                                    @csrf
                                    <button
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 md:px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 shadow-2xl duration-300 ease-in shadow-blue-200"
                                    >
                                        <span class="hidden md:inline">
                                            Perpustakaan
                                        </span>
                                        <svg
                                            class="w-5 h-5 text-white dark:text-white sm:hidden"
                                            aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="15"
                                            height="15"
                                            fill="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M6 2a2 2 0 0 0-2 2v15a3 3 0 0 0 3 3h12a1 1 0 1 0 0-2h-2v-2h2a1 1 0 0 0 1-1V4a2 2 0 0 0-2-2h-8v16h5v2H7a1 1 0 1 1 0-2h1V2H6Z"
                                                clip-rule="evenodd"
                                            />
                                        </svg>
                                    </button>
                                </form>
                            @endauth
                        </nav>
                    @endif

                    <button
                        data-collapse-toggle="navbar-cta"
                        type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                        aria-controls="navbar-cta"
                        aria-expanded="false"
                    >
                        <span class="sr-only">Open main menu</span>
                        <svg
                            class="w-5 h-5"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 17 14"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15"
                            />
                        </svg>
                    </button>
                </div>
                <div
                    class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 overflow-hidden"
                    id="navbar-cta"
                >
                    <ul
                        class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700"
                    >
                        <li>
                            <a
                                href="#"
                                class="block py-2 px-3 md:p-0 text-white bg-blue-700 rounded-sm md:bg-transparent md:text-blue-700 md:dark:text-blue-500 nav-text"
                                aria-current="page"
                            >
                                Home
                            </a>
                        </li>
                        <li>
                            <a
                                href="#about"
                                class="block py-2 px-3 md:p-0 text-white rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 nav-text"
                            >
                                Tentang Sekolah
                            </a>
                        </li>
                        <li>
                            <a
                                href="#visi-misi"
                                class="block py-2 px-3 md:p-0 text-white rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 nav-text"
                            >
                                Visi & Misi
                            </a>
                        </li>
                        <li>
                            <a
                                href="#ekstrakurikuler"
                                class="block py-2 px-3 md:p-0 text-white rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 nav-text"
                            >
                                Ekstrakurikuler
                            </a>
                        </li>
                        <li>
                            <a
                                href="#kontak"
                                class="block py-2 px-3 md:p-0 text-white rounded-sm hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700 nav-text"
                            >
                                Kontak
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            <!-- Hero Section -->
            <section id="hero" class="relative h-screen overflow-hidden">
                <!-- Background Image -->
                <div
                    class="absolute inset-0 bg-cover bg-center bg-no-repeat"
                    style="
                        background-image: url('{{ asset("images/gedung-2.jpg") }}');
                    "
                ></div>

                <!-- Dark Overlay -->
                <div class="absolute inset-0 bg-black opacity-40"></div>

                <!-- Gradient Overlay (Bottom) -->
                <div
                    class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black/70"
                ></div>

                <!-- Content -->
                <div
                    class="relative z-10 container mx-auto md:pt-32 px-4 h-full flex flex-col justify-center items-center text-center"
                >
                    <h1
                        class="text-lg font-medium text-blue-400 drop-shadow-lg"
                        data-aos="fade-down"
                    >
                        Selamat Datang di Website Resmi 👋
                    </h1>
                    <h2
                        class="mt-2 text-4xl md:text-6xl font-bold tracking-tight text-white drop-shadow-2xl"
                        data-aos="fade-up"
                        data-aos-delay="100"
                    >
                        SDN JAJAR TUNGGAL III/452 SURABAYA
                    </h2>
                    <a
                        href="#about"
                        type="button"
                        class="mt-10 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center shadow-2xl hover:shadow-xl duration-300 hover:-translate-y-1 ease-out hover:shadow-blue-500 shadow-blue-500"
                    >
                        Tentang Sekolah
                        <svg
                            class="rtl:rotate-180 w-3.5 h-3.5 ms-2"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 14 10"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9"
                            />
                        </svg>
                    </a>

                    <!-- Stats Section -->
                    <div
                        class="max-w-screen-md px-4 py-8 mx-auto text-center lg:py-16 lg:px-6"
                        data-aos="fade-up"
                        data-aos-delay="300"
                    >
                        <dl
                            class="grid grid-cols-3 max-w-screen-md gap-8 mx-auto sm:grid-cols-3 text-white"
                        >
                            <div
                                class="flex flex-col items-center justify-center"
                            >
                                <dt
                                    class="mb-2 text-3xl md:text-4xl font-extrabold drop-shadow-lg"
                                >
                                    1977
                                </dt>
                                <dd class="font-light text-gray-200">
                                    Tahun Berdiri
                                </dd>
                            </div>
                            <div
                                class="flex flex-col items-center justify-center"
                            >
                                <dt
                                    class="mb-2 text-3xl md:text-4xl font-extrabold drop-shadow-lg"
                                >
                                    A
                                </dt>
                                <dd class="font-light text-gray-200">
                                    Akreditasi
                                </dd>
                            </div>
                            <div
                                class="flex flex-col items-center justify-center"
                            >
                                <dt
                                    class="mb-2 text-3xl md:text-4xl font-extrabold drop-shadow-lg"
                                >
                                    20533511
                                </dt>
                                <dd class="font-light text-gray-200">NPSN</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </section>

            <!-- About Us Section -->
            <section
                id="about"
                class="py-16 md:py-24 bg-gray-50 dark:bg-gray-800 overflow-hidden"
            >
                <div class="container mx-auto px-4">
                    <h2
                        class="text-3xl font-bold text-center mb-12"
                        data-aos="fade-up"
                    >
                        Tentang Sekolah
                    </h2>
                    <div class="flex flex-col md:flex-row items-center gap-12">
                        <div class="md:w-1/2" data-aos="fade-right">
                            <!-- Ganti 'gedung.jpg' dengan path foto gedung sekolah Anda -->
                            <img
                                src="{{ asset("images/gedung-2.jpg") }}"
                                alt="Gedung Sekolah SDN Jajar Tunggal III"
                                class="rounded-lg shadow-xl w-full h-auto"
                            />
                        </div>
                        <div class="md:w-1/2" data-aos="fade-left">
                            <h3 class="text-2xl font-semibold mb-4">
                                Sejarah Singkat
                            </h3>
                            <p
                                class="text-gray-600 dark:text-gray-300 leading-relaxed"
                            >
                                SDN Jajar Tunggal III/452 berdiri sejak tahun
                                1977, berlokasi strategis di Jl. Menganti Kramat
                                No. 17, Surabaya. Sejak awal, kami berkomitmen
                                untuk menyediakan pendidikan dasar yang
                                berkualitas. Dengan akreditasi A, kami terus
                                berinovasi untuk menciptakan lingkungan belajar
                                yang inspiratif dan mendukung perkembangan
                                potensi setiap siswa, baik dalam bidang akademik
                                maupun non-akademik, serta menanamkan kepedulian
                                terhadap lingkungan.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Visi & Misi Section -->
            <section
                id="visi-misi"
                class="py-16 md:py-24 bg-white dark:bg-gray-900 overflow-hidden"
            >
                <div class="container mx-auto px-4">
                    <h2
                        class="text-3xl font-bold text-center mb-12"
                        data-aos="fade-up"
                    >
                        Visi & Misi
                    </h2>
                    <div
                        class="grid md:grid-cols-1 lg:grid-cols-2 gap-8 items-start"
                    >
                        <div
                            class="p-8 rounded-lg shadow-xl"
                            data-aos="fade-right"
                        >
                            <h3
                                class="text-2xl font-semibold mb-4 text-blue-600 dark:text-blue-400"
                            >
                                Visi
                            </h3>
                            <p
                                class="text-center italic text-lg leading-relaxed"
                            >
                                "Terwujudnya murid yang berakhlak mulia, cerdas,
                                berprestasi akademik maupun non-akademik,
                                kreatif, dan peduli terhadap lingkungan."
                            </p>
                        </div>
                        <div
                            class="p-8 rounded-lg shadow-xl"
                            data-aos="fade-left"
                        >
                            <h3
                                class="text-2xl font-semibold mb-4 text-blue-600 dark:text-blue-400"
                            >
                                Misi
                            </h3>
                            <ul
                                class="list-disc list-inside space-y-2 text-gray-600 dark:text-gray-300"
                            >
                                <li>
                                    Meningkatkan keimanan dan ketaqwaan siswa
                                    terhadap Tuhan Yang Maha Esa.
                                </li>
                                <li>
                                    Meningkatkan kompetensi akademik dan non
                                    akademik siswa yang berdaya saing tinggi.
                                </li>
                                <li>
                                    Mendorong siswa berinovasi dan berkreasi
                                    dalam segala bidang.
                                </li>
                                <li>
                                    Mendorong siswa untuk menjadi pribadi yang
                                    berkarakter.
                                </li>
                                <li>Meningkatkan kegiatan gemar membaca.</li>
                                <li>
                                    Mendorong siswa untuk selalu bersikap peduli
                                    terhadap lingkungan.
                                </li>
                                <li>
                                    Terwujudnya sekolah Adiwiyata Propinsi
                                    dengan mengembangkan pendidikan berwawasan
                                    Adiwiyata.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Ekstrakulikuler Section -->
            <section
                id="ekstrakurikuler"
                class="py-16 md:py-24 bg-gray-50 dark:bg-gray-800"
            >
                <div class="container mx-auto px-4">
                    <h2
                        class="text-3xl font-bold text-center mb-12"
                        data-aos="fade-up"
                    >
                        Ekstrakurikuler
                    </h2>
                    <div
                        class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 text-center"
                        data-aos="fade-up"
                        data-aos-delay="2   00"
                    >
                        <div
                            class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow"
                        >
                            <h3 class="font-semibold text-lg">Tari</h3>
                        </div>
                        <div
                            class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow"
                        >
                            <h3 class="font-semibold text-lg">BTQ</h3>
                        </div>
                        <div
                            class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow"
                        >
                            <h3 class="font-semibold text-lg">Karawitan</h3>
                        </div>
                        <div
                            class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow"
                        >
                            <h3 class="font-semibold text-lg">Komputer</h3>
                        </div>
                        <div
                            class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow"
                        >
                            <h3 class="font-semibold text-lg">Musik</h3>
                        </div>
                        <div
                            class="bg-white dark:bg-gray-700 p-6 rounded-lg shadow-lg hover:shadow-xl transition-shadow"
                        >
                            <h3 class="font-semibold text-lg">Pramuka</h3>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Kontak & Alamat Section -->
            <section
                id="kontak"
                class="py-16 md:py-24 bg-white dark:bg-gray-900 overflow-hidden"
            >
                <div class="container mx-auto px-4">
                    <h2
                        class="text-3xl font-bold text-center mb-12"
                        data-aos="fade-up"
                    >
                        Kontak & Alamat
                    </h2>
                    <div class="flex flex-col lg:flex-row gap-8">
                        <div
                            class="lg:w-1/2 p-8"
                            data-aos="fade-right"
                            data-aos-delay="100"
                        >
                            <h3 class="text-2xl font-semibold mb-4">
                                Informasi Kontak
                            </h3>
                            <div class="space-y-4">
                                <p>
                                    <strong>Alamat:</strong>
                                    <br />
                                    JL. MENGANTI KRAMAT NO. 17, SURABAYA, 60229
                                </p>
                                <p>
                                    <strong>Telepon:</strong>
                                    <br />
                                    031 - 7672217
                                </p>
                                <p>
                                    <strong>Email:</strong>
                                    <br />
                                    sdjajartunggal@gmail.com
                                </p>
                            </div>
                        </div>
                        <div
                            data-aos="fade-left"
                            data-aos-delay="100"
                            class="lg:w-1/2 h-96 lg:h-auto rounded-lg overflow-hidden shadow-lg"
                        >
                            <iframe
                                class="w-full h-full"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.173874980598!2d112.7003542153245!3d-7.313928194723916!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fc86415133ff%3A0xe3c7c3cc5beed886!2sSDN%20Jajar%20Tunggal%20III!5e0!3m2!1sen!2sid!4v1668833301123!5m2!1sen!2sid"
                                style="border: 0"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"
                            ></iframe>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="p-4 bg-gray-50 sm:p-6 dark:bg-gray-800">
            <div class="mx-auto max-w-screen-xl">
                <div class="md:flex md:justify-between items-center">
                    <div class="mb-6 md:mb-0 flex flex-col">
                        <a
                            href="https://flowbite.com"
                            class="flex items-center"
                        >
                            <img
                                src="{{ asset("images/logo.png") }}"
                                class="mr-3 md:h-24 h-12"
                                alt="Logo SD Jajar Tunggal III"
                            />
                        </a>
                        <div class="flex flex-col justify-start gap-5">
                            <span
                                class="text-2xl font-bold whitespace-nowrap dark:text-white"
                            >
                                SDN JAJAR TUNGGAL III/452
                            </span>
                            <span class="text-gray-500 dark:text-gray-400">
                                JL. MENGANTI KRAMAT NO. 17, SURABAYA, 60229 ,
                                <br />
                                sdjajartunggal@gmail.com
                            </span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-2">
                        <div>
                            <h2
                                class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white"
                            >
                                Ikuti Sosial Media Kami
                            </h2>
                            <ul class="text-gray-600 dark:text-gray-400">
                                <li class="mb-4">
                                    <a
                                        href="https://www.youtube.com/@sdjajartunggaltiga6682"
                                        class="hover:underline"
                                    >
                                        YouTube
                                    </a>
                                </li>
                                <li>
                                    <a
                                        href="https://www.instagram.com/sdnjajartunggal3/"
                                        class="hover:underline"
                                    >
                                        Instagram
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr
                    class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8"
                />
                <div class="sm:flex sm:items-center sm:justify-between">
                    <span
                        class="text-sm text-gray-500 sm:text-center dark:text-gray-400"
                    >
                        © 2025
                        <a href="#" class="hover:underline">
                            SDN JAJAR TUNGGAL III/452
                        </a>
                        . All Rights Reserved.
                    </span>
                    <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                        <a
                            href="https://www.youtube.com/@sdjajartunggaltiga6682"
                            target="_blank"
                            class="text-gray-500 hover:text-gray-900 dark:hover:text-white"
                        >
                            <svg
                                class="w-5 h-5"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                                aria-hidden="true"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M21.7 8.037a4.26 4.26 0 0 0-.789-1.964 2.84 2.84 0 0 0-1.984-.839c-2.767-.2-6.926-.2-6.926-.2s-4.157 0-6.928.2a2.836 2.836 0 0 0-1.983.839 4.225 4.225 0 0 0-.79 1.965 30.146 30.146 0 0 0-.2 3.206v1.5a30.12 30.12 0 0 0 .2 3.206c.094.712.364 1.39.784 1.972.604.536 1.38.837 2.187.848 1.583.151 6.731.2 6.731.2s4.161 0 6.928-.2a2.844 2.844 0 0 0 1.985-.84 4.27 4.27 0 0 0 .787-1.965 30.12 30.12 0 0 0 .2-3.206v-1.516a30.672 30.672 0 0 0-.202-3.206Zm-11.692 6.554v-5.62l5.4 2.819-5.4 2.801Z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </a>
                        <a
                            href="https://www.instagram.com/sdnjajartunggal3/"
                            target="_blank"
                            class="text-gray-500 hover:text-gray-900 dark:hover:text-white"
                        >
                            <svg
                                class="w-5 h-5"
                                fill="currentColor"
                                viewBox="0 0 24 24"
                                aria-hidden="true"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
