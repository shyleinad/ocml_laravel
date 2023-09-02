<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Járműveim') }}
        </h2>
    </x-slot>

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
