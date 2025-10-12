<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __("Informasi Profil") }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update informasi username anda.") }}
        </p>
    </header>

    <form
        id="send-verification"
        method="post"
        action="{{ route("verification.send") }}"
    >
        @csrf
    </form>

    <form
        method="post"
        action="{{ route("profile.update") }}"
        class="mt-6 space-y-6"
    >
        @csrf
        @method("patch")
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input
                id="username"
                name="username"
                type="text"
                class="mt-1 block w-full"
                :value="old('username', $user->username)"
                required
                autocomplete="username"
            />
            <x-input-error class="mt-2" :messages="$errors->get('username')" />
            @if (session("username-changed"))
                <p class="mt-2 text-sm text-amber-600 dark:text-amber-400">
                    <span class="font-semibold">⚠️ Perhatian:</span>
                    {{ __("Username Anda telah diubah. Gunakan username baru untuk login berikutnya.") }}
                </p>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __("Save") }}</x-primary-button>

            @if (session("status") === "profile-updated")
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => (show = false), 2000)"
                    class="text-sm text-gray-600"
                >
                    {{ __("Saved.") }}
                </p>
            @endif
        </div>
    </form>
</section>
