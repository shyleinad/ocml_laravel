<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Fiók törlése') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('A fiók törlését követően az összes rendszerünkben tárolt adata véglegesen törlődik.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Fiók törlése') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Biztosan törölni szeretné profilját?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __('A fiók törlését követően az összes rendszerünkben tárolt adata véglegesen törlődik. Adja meg jelszavát, ha mindenképp törölni szeretné véglegesen a profilját.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Jelszó') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Mégsem') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Fiók Törlése') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
