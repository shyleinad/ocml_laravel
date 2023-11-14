<x-app-layout>
    <x-header.header>
        <x-header.header-text>
            {{ __('Szervizbejegyzés hozzáadása') }}
        </x-header.header-text>
    </x-header.header>

    <div class="py-12">
        <x-card>
            <form method="POST" action="/insert-maintenance" enctype="multipart/form-data">
                @csrf
                @include('maintenance.partials.form-fields')
            </form>
        </x-card>
    </div>
</x-app-layout>