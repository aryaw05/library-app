<div
    class="shadow-lg overflow-hidden border-gray-200 sm:rounded-lg overflow-x-auto"
>
    <table
        class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 shadow-m"
    >
        <thead
            class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400"
        >
            <tr>
                {{ $header }}
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>
