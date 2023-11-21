<!-- vin -->
<div>
    <x-input-label for="vin" :value="__('Alvázszám')" />
    <x-text-input id="vin" class="block mt-1 w-full" 
                    type="text" 
                    name="vin" 
                    required autofocus autocomplete="vin" 
                    value="{{(!$is_add) ? old('vin', $vehicle->vin) : old('vin')}}"
    >
    </x-text-input>
    <x-input-error :messages="$errors->get('vin')" class="mt-2" />
</div>

<!-- lic_plate -->
<div class="mt-4">
    <x-input-label for="lic_plate" :value="__('Rendszám')" />
    <x-text-input id="lic_plate" class="block mt-1 w-full" 
                    type="text" 
                    name="lic_plate" 
                    required autocomplete="lic_plate" 
                    value="{{(!$is_add) ? old('lic_plate', $vehicle->lic_plate) : old('lic_plate')}}"
    />
    <x-input-error :messages="$errors->get('lic_plate')" class="mt-2" />
</div>

<!-- make -->
<div class="mt-4">
    <x-input-label for="make" :value="__('Márka')" />

    <x-text-input id="make" class="block mt-1 w-full"
                    type="text"
                    name="make"
                    required autocomplete="make" 
                    value="{{(!$is_add) ? old('make', $vehicle->make) : old('make')}}"
    />

    <x-input-error :messages="$errors->get('make')" class="mt-2" />
</div>

<!-- type -->
<div class="mt-4">
    <x-input-label for="type" :value="__('Típus')" />

    <x-text-input id="type" class="block mt-1 w-full"
                    type="text"
                    name="type"
                    required autocomplete="type" 
                    value="{{(!$is_add) ? old('type', $vehicle->type) : old('type')}}"
    />

    <x-input-error :messages="$errors->get('type')" class="mt-2" />
</div>

<!-- year_of_make -->
<div class="mt-4">
    <x-input-label for="year_of_make" :value="__('Gyártási év')" />

    <x-text-input datetimepicker id="year_of_make" class="block mt-1 w-full"
                    type="text"
                    name="year_of_make"
                    value=""
                    required autocomplete="year_of_make" 
                    value="{{(!$is_add) ? old('year_of_make', $vehicle->year_of_make) : old('year_of_make')}}"
    />

    <x-input-error :messages="$errors->get('year_of_make')" class="mt-2" />
</div>

<!-- model_code -->
<div class="mt-4">
    <x-input-label for="model_code" :value="__('Model kód')" />

    <x-text-input id="model_code" class="block mt-1 w-full"
                    type="text"
                    name="model_code"
                    value=""
                    required autocomplete="model_code" 
                    value="{{(!$is_add) ? old('model_code', $vehicle->model_code) : old('model_code')}}"
    />

    <x-input-error :messages="$errors->get('model_code')" class="mt-2" />
</div>

<!-- fuel_type -->
<div class="mt-4">
    <x-input-label for="fuel_type_id" :value="__('Üzemanyag')" />
    <x-select-input id="fuel_type_id" class="block mt-1 w-full" name="fuel_type_id" required>
        @foreach($fuel_types as $fuel_type)
            @if(!$is_add && $fuel_type->id==$vehicle->fuel_type_id)
                <option value="{{$fuel_type->id}}" selected>{{$fuel_type->fuel_type}}</option>
            @else
                <option value="{{$fuel_type->id}}">{{$fuel_type->fuel_type}}</option>
            @endif
        @endforeach
    </x-select-input>
    <x-input-error :messages="$errors->get('fuel_type_id')" class="mt-2" />
</div>

<!-- engine_code -->
<div class="mt-4">
    <x-input-label for="engine_code" :value="__('Motorkód')" />

    <x-text-input id="engine_code" class="block mt-1 w-full"
                    type="text"
                    name="engine_code"
                    required autocomplete="engine_code" 
                    value="{{(!$is_add) ? old('engine_code', $vehicle->engine_code) : old('engine_code')}}"
    />

    <x-input-error :messages="$errors->get('engine_code')" class="mt-2" />
</div>

<!-- engine_displacement -->
<div class="mt-4">
    <x-input-label for="engine_displacement" :value="__('Hengerűrtartalom')" />

    <x-text-input id="engine_displacement" class="block mt-1 w-full"
                    type="text"
                    name="engine_displacement"
                    required autocomplete="engine_displacement" 
                    value="{{(!$is_add) ? old('engine_displacement', $vehicle->engine_displacement) : old('engine_displacement')}}"
    />

    <x-input-error :messages="$errors->get('engine_displacement')" class="mt-2" />
</div>

<!-- mot_expires -->
<div class="mt-4">
    <x-input-label for="mot_expires" :value="__('Műszaki vizsga érvényes')" />

    <x-text-input id="mot_expires " class="block mt-1 w-full"
                    type="date"
                    name="mot_expires"
                    required autocomplete="mot_expires" 
                    value="{{(!$is_add) ? old('mot_expires', $vehicle->mot_expires) : old('mot_expires')}}"
    />

    <x-input-error :messages="$errors->get('mot_expires')" class="mt-2" />
</div>

<!-- public -->
<div class="mt-4">
    <x-input-label for="public" :value="__('Járműhöz tartozó szervízbejegyzések publikusak?')" />
    <input id="public" class="block mt-1 w-full"
                    type="checkbox"
                    name="public"
                    autocomplete="public" 
                    @if(
                        (old('public') == 'on')
                        ||
                        (!old() && $vehicle->public==1)
                    )
                        checked
                    @endif
    />

    <x-input-error :messages="$errors->get('public')" class="mt-2" />
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
