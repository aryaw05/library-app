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

        <!-- table -->
    </div>
</x-app-layout>
