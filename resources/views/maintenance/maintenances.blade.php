<x-app-layout>
    <x-header.header>
        <x-header.header-text>
            {{ __('Szervizbejegyzéseim') }}
        </x-header.header-text>
        <x-header.add-button :href="__('/add-maintenance-form')">Új szervízbejegyzés</x-header.add-button>
    </x-header.header>

    <div class="py-12">
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

    {{-- showing with cards, obsolete
    <div class="py-12">
        @if (count($maintenances) <= 0)
            <x-card>
                {{ __('Nincsenek szervízbejegyzések!') }}
            </x-card>
        @else
            @foreach ($maintenances as $maintenance)
                <x-card>
                    {{$maintenance->id}}
                    <a href="/edit-maintenance-form/{{$maintenance->id}}"><x-secondary-button>Módosítás</x-secondary-button></a></td>
                    <form method="POST" action="/delete-maintenance/{{$maintenance->id}}">
                        @csrf
                        @method('DELETE')
                        <x-danger-button onclick="return confirm('Biztosan törölni szeretné a(z) {{$maintenance->vehicle->lic_plate}} {{$maintenance->vehicle->make}} {{$maintenance->vehicle->type}} járműhöz tartozó {{$maintenance->work_done}} {{$maintenance->date}} bejegyzést?')">Törlés</x-danger-button>
                    </form>
                </x-card>
            @endforeach
        @endif
    </div>
    --}}
</x-app-layout>