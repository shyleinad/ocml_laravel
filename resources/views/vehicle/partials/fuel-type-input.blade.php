<div class="mt-4">
    <x-input-label for="fuel_type" :value="__('Üzemanyag')" />
    <x-select-input id="fuel_type" class="block mt-1 w-full" name="fuel_type" required autocomplete="fuel_type">
        @foreach($fuel_types as $fuel_type)
            <option value="{{$fuel_type->id}}">{{$fuel_type->fuel_type}}</option>
        @endforeach
    </x-select-input>
    <x-input-error :messages="$errors->get('fuel_type_id')" class="mt-2" />
</div>