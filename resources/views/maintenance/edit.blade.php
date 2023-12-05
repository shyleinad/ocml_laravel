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
            @foreach($maintenance->docs as $doc)
                {{$doc->name}} 
                <form method="POST" action="/delete-doc/{{$doc->id}}">
                    @csrf
                    @method('DELETE')
                    <x-danger-button onclick="return confirm('Biztosan törölni szeretné a(z) {{$maintenance->work_done}} ({{$maintenance->date}}) bejegyzéshez tartozó {{$doc->name}} dokumentumot?')">Törlés</x-danger-button>
                </form>
            @endforeach
        </x-card>
    </div>
</x-app-layout>