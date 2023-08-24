@props(['vehicle'])
<tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
    <th scope="row" class="px-4 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$vehicle->lic_plate}}</th>
    <td class="px-4 py-4">{{$vehicle->make." ".$vehicle->type}}</td>
    <td class="px-4 py-4">{{$vehicle->year_of_make}}</td>
    <td class="px-4 py-4">{{$vehicle->model_code}}</td>
    <td class="px-4 py-4">{{$vehicle->engine_displacement}}</td>
    <td class="px-4 py-4">{{$vehicle->vin}}</td>
    <td class="px-4 py-4">{{$vehicle->engine_code}}</td>
    <td class="px-4 py-4">{{$vehicle->mot_expires}}</td>
    <td class="px-0 py-4"><x-primary-button>Módosítás</x-primary-button></td>
    <td class="px-0 py-4"><x-danger-button>Törlés</x-danger-button></td>
</tr>