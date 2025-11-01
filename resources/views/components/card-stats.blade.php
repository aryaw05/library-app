<div
    class="lg:max-w-sm p-6 bg-white rounded-2xl shadow-lg dark:bg-gray-800 dark:border-gray-700"
>
    <div class="flex justify-between">
        {{ $slot }}
        <div>
            <a href="{{ $downloadLink }}">
                <svg
                    class="w-6 h-6 text-blue-700 dark:text-blue-400"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    fill="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        fill-rule="evenodd"
                        d="M9 7V2.221a2 2 0 0 0-.5.365L4.586 6.5a2 2 0 0 0-.365.5H9Zm2 0V2h7a2 2 0 0 1 2 2v9.293l-2-2a1 1 0 0 0-1.414 1.414l.293.293h-6.586a1 1 0 1 0 0 2h6.586l-.293.293A1 1 0 0 0 18 16.707l2-2V20a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z"
                        clip-rule="evenodd"
                    />
                </svg>
            </a>
        </div>
    </div>
    <h5
        class="mb-2 text-5xl lg:text-5xl font-semibold tracking-tight text-gray-900 dark:text-white"
    >
        {{ $stats }}
    </h5>
    <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">
        {{ $title }}
    </p>
    <a
        href="{{ $link }}"
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
