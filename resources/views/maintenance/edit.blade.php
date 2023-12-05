<x-app-layout>
    <x-header.header>
        <x-header.header-text>
            {{ __('Szervizbejegyzés módosítása') }}
        </x-header.header-text>
    </x-header.header>

    <div class="py-12">
        <x-card>
            <form method="POST" action="/edit-maintenance/{{$maintenance->id}}" enctype="multipart/form-data">
                @csrf
                @method('put')
                @include('maintenance.partials.form-fields')
            </form>
        </x-card>
    </div>
</x-app-layout>