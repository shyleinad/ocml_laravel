<!-- vehicle -->
<div class="mt-4">
    <x-input-label for="vehicle_id" :value="__('Jármű')" />
    <x-select-input id="vehicle_id" class="block mt-1 w-full" name="vehicle_id" required>
        @foreach($vehicles as $vehicle)
            @if(!$is_add && $vehicle->id==$maintenance->vehicle_id)
                <option value="{{$vehicle->id}}" selected>{{ $vehicle->make.' '.$vehicle->type.' ('.$vehicle->lic_plate.')' }}</option> <!--needs to be extended-->
            @else
                <option value="{{$vehicle->id}}">{{ $vehicle->make.' '.$vehicle->type.' ('.$vehicle->lic_plate.')' }}</option>
            @endif
        @endforeach
    </x-select-input>
    <x-input-error :messages="$errors->get('vehicle_id')" class="mt-2" />
</div>

<!-- mileage -->
<div class="mt-4">
    <x-input-label for="mileage" :value="__('Óra állás')" />
    <x-text-input id="vin" class="block mt-1 w-full" 
                    type="text" 
                    name="mileage" 
                    required autofocus autocomplete="mileage" 
                    value="{{(!$is_add) ? old('mileage', $maintenance->mileage) : old('mileage')}}"
    >
    </x-text-input>
    <x-input-error :messages="$errors->get('mileage')" class="mt-2" />
</div>

<!-- date -->
<div class="mt-4">
    <x-input-label for="date" :value="__('Szerviz dátuma')" />

    <x-text-input id="date " class="block mt-1 w-full"
                    type="date"
                    name="date"
                    required autocomplete="date" 
                    value="{{(!$is_add) ? old('date', $maintenance->date) : old('date')}}"
    />

    <x-input-error :messages="$errors->get('date')" class="mt-2" />
</div>

<!-- work_done -->
<div class="mt-4">
    <x-input-label for="work_done" :value="__('Megnevezés')" />
    <x-text-input id="work_done" class="block mt-1 w-full" 
                    type="text" 
                    name="work_done" 
                    required autocomplete="work_done" 
                    value="{{(!$is_add) ? old('work_done', $maintenance->work_done) : old('work_done')}}"
    />
    <x-input-error :messages="$errors->get('work_done')" class="mt-2" />
</div>

<!-- changed_parts -->
<div class="mt-4">
    <x-input-label for="changed_parts" :value="__('Cserélt alkatrészek')" />

    <x-text-input id="changed_parts" class="block mt-1 w-full"
                    type="text"
                    name="changed_parts"
                    required autocomplete="changed_parts" 
                    value="{{(!$is_add) ? old('chaged_parts', $maintenance->changed_parts) : old('changed_parts')}}"
    />

    <x-input-error :messages="$errors->get('changed_parts')" class="mt-2" />
</div>

<!-- price -->
<div class="mt-4">
    <x-input-label for="price" :value="__('Fizetett összeg')" />

    <x-text-input id="price" class="block mt-1 w-full"
                    type="text"
                    name="price"
                    required autocomplete="price" 
                    value="{{(!$is_add) ? old('price', $maintenance->price) : old('price')}}"
    />

    <x-input-error :messages="$errors->get('price')" class="mt-2" />
</div>

<!-- docs -->
<div class="mt-4">
    <x-input-label for="docs" :value="__('Dokumentumok')" />

    <x-file-input id="docs" class="block mt-1 w-full"
                    type="file"
                    name="docs[]"
                    autocomplete="docs" 
                    multiple
    />

    <x-input-error :messages="$errors->get('docs.*')" class="mt-2" />
</div>

<!-- submit -->
<div class="flex items-center justify-end mt-4">
    @if(!$is_add)
        <x-primary-button class="ml-4">
            {{ __('Módosít') }}
        </x-primary-button>
    @else
        <x-primary-button class="ml-4">
            {{ __('Hozzáadás') }}
        </x-primary-button>
    @endif
</div>
