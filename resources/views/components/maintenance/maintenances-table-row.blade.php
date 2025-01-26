@props(['maintenance'])
<tr class="even:bg-gray-50 odd:bg-white border-b dark:bg-gray-900 dark:border-gray-700">
    <td class="px-4 py-4">{{$maintenance->vehicle->make." ".$maintenance->vehicle->type." (".$maintenance->vehicle->lic_plate.")"}}</td>
    <td class="px-4 py-4">{{$maintenance->work_done}}</td>
    <td class="px-4 py-4">{{$maintenance->mileage}}</td>
    <td class="px-4 py-4">{{$maintenance->date}}</td>
    <td class="px-4 py-4">{{$maintenance->price}}</td>
    <td class="px-4 py-4"><a href="/edit-maintenance-form/{{$maintenance->id}}"><x-secondary-button>Módosítás</x-secondary-button></a></td>
    <td class="px-0 py-4">
        <form method="POST" action="/delete-maintenance/{{$maintenance->id}}">
            @csrf
            @method('DELETE')
            <x-danger-button onclick="return confirm('Biztosan törölni szeretné a(z) {{$maintenance->vehicle->make}} {{$maintenance->vehicle->type}} ({{$maintenance->vehicle->lic_plate}}) járműhöz tartozó {{$maintenance->work_done}} {{$maintenance->date}} bejegyzést?')">Törlés</x-danger-button>
        </form>
    </td>
</tr>