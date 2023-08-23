<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Járműveim') }}
        </h2>
    </x-slot>

    <div class="py-12">
            @if (count($vehicles)<=0)
            @else
                @foreach ($vehicles as $vehicle)
                    
                @endforeach
            @endif
    </div>
</x-app-layout>