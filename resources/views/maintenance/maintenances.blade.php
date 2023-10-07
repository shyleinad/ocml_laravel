<x-app-layout>
    <x-header.header>
        <x-header.header-text>
            {{ __('Szervizbejegyzések') }}
        </x-header.header-text>
        <x-header.add-button :href="__('/add-maintenance-form')">Új szervízbejegyzés</x-header.add-button>
    </x-header.header>

    <div class="py-12">
        @if (count($maintenances) <= 0)
            <x-card>
                {{ __('Nincsenek szervízbejegyzések!') }}
            </x-card>
        @else
            @foreach ($maintenances as $maintenance)
                <x-card>
                    {{$maintenance->id}}
                </x-card>
            @endforeach
        @endif
    </div>
</x-app-layout>