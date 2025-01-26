<x-app-layout>
    <x-header.header>
        <x-header.header-text>
            {{ __('Nyilvános szervízbejegyzések') }}
        </x-header.header-text>
        <x-header.add-button :href="__('/add-maintenance-form')">Új szervízbejegyzés</x-header.add-button>
    </x-header.header>

    <div class="py-12">
        @include('maintenance.partials.search-form')
        @if (count($maintenances) <= 0)
            <x-card>
                {{ __('Nincsenek szervízbejegyzések!') }}
            </x-card>
        @else
            <x-table>
                <x-maintenance.maintenances-table-head/>
                <x-table-body>
                    @foreach ($maintenances as $maintenance)
                        <x-maintenance.maintenances-table-row :maintenance="$maintenance"/>
                    @endforeach
                </x-table-body>
            </x-table>
        @endif
    </div>
</x-app-layout>