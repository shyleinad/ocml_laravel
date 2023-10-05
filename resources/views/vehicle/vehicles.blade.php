<x-app-layout>
    <x-header.header>
        <x-header.header-text>
            {{ __('Járműveim') }}
        </x-header.header-text>
        <x-header.add-button :href="__('/add-vehicle-form')">Új jármű hozzáadása</x-add-button>
    </x-header.header>

    <div class="py-12">
        @if (count($vehicles) <= 0)
            <x-card>
                {{ __('Nincsenek járművek!') }}
            </x-card>
        @else
            <x-table>
                <x-vehicle.vehicles-table-head/>
                <x-table-body>
                    @foreach ($vehicles as $vehicle)
                        <x-vehicle.vehicles-table-row :vehicle="$vehicle"/>
                    @endforeach
                </x-table-body>
            </x-table>
        @endif
    </div>
</x-app-layout>
