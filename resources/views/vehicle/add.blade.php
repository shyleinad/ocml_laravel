<x-app-layout>
    <x-header.header>
        <x-header.header-text>
            {{ __('Jármű hozzáadása') }}
        </x-header.header-text>
    </x-header.header>

    <div class="py-12">
        <x-card>
            <form method="POST" action="/insert-vehicle">
                @csrf
                @include('vehicle.partials.form-fields')
            </form>
        </x-card>
    </div>
</x-app-layout>
