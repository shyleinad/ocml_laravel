<form action="/public-maintenances">
    <div class="mt-4">
        <x-text-input id="lic_plate" type="text"
            name="lic_plate" placeholder="Adja meg a kívánt jármű rendszámát">
        </x-text-input>
    </div>
    <div class="flex items-center justify-end mt-4">
        <x-primary-button class="ml-4">
            {{ __('Keresés') }}
        </x-primary-button>
    </div>
</form>
