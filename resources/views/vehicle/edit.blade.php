<x-app-layout>
    <x-header.header>
        <x-header.header-text>
            {{ __('Jármű módosítása') }}
        </x-header.header-text>
    </x-header.header>

    <div class="py-12">
        <x-card>
            <form method="POST" action="/edit-vehicle/{{$vehicle->id}}">
                @csrf
                @method('put')
                @include('vehicle.partials.form-fields')
                <!-- vin -->
                {{--<div>
                    <x-input-label for="vin" :value="__('Alvázszám')" />
                    <x-text-input id="vin" class="block mt-1 w-full" type="text" name="vin" required autofocus autocomplete="vin" value="{{$vehicle->vin}}"/>
                    <x-input-error :messages="$errors->get('vin')" class="mt-2" />
                </div>

                <!-- lic_plate -->
                <div class="mt-4">
                    <x-input-label for="lic_plate" :value="__('Rendszám')" />
                    <x-text-input id="lic_plate" class="block mt-1 w-full" type="text" name="lic_plate" value="{{$vehicle->lic_plate}}" required autocomplete="lic_plate" />
                    <x-input-error :messages="$errors->get('lic_plate')" class="mt-2" />
                </div>

                <!-- make -->
                <div class="mt-4">
                    <x-input-label for="make" :value="__('Márka')" />

                    <x-text-input id="make" class="block mt-1 w-full"
                                    type="text"
                                    name="make"
                                    value="{{$vehicle->make}}"
                                    required autocomplete="make" />

                    <x-input-error :messages="$errors->get('make')" class="mt-2" />
                </div>

                <!-- type -->
                <div class="mt-4">
                    <x-input-label for="type" :value="__('Típus')" />

                    <x-text-input id="type" class="block mt-1 w-full"
                                    type="text"
                                    name="type"
                                    value="{{$vehicle->type}}"
                                    required autocomplete="type" />

                    <x-input-error :messages="$errors->get('type')" class="mt-2" />
                </div>

                <!-- year_of_make -->
                <div class="mt-4">
                    <x-input-label for="year_of_make" :value="__('Gyártási év')" />

                    <x-text-input datetimepicker id="year_of_make" class="block mt-1 w-full"
                                    type="text"
                                    name="year_of_make"
                                    value="{{$vehicle->year_of_make}}"
                                    required autocomplete="year_of_make" />

                    <x-input-error :messages="$errors->get('year_of_make')" class="mt-2" />
                </div>

                <!-- model_code -->
                <div class="mt-4">
                    <x-input-label for="model_code" :value="__('Model kód')" />

                    <x-text-input id="model_code" class="block mt-1 w-full"
                                    type="text"
                                    name="model_code"
                                    value="{{$vehicle->model_code}}"
                                    required autocomplete="model_code" />

                    <x-input-error :messages="$errors->get('model_code')" class="mt-2" />
                </div>

                <!-- engine_code -->
                <div class="mt-4">
                    <x-input-label for="engine_code" :value="__('Motorkód')" />

                    <x-text-input id="engine_code" class="block mt-1 w-full"
                                    type="text"
                                    name="engine_code"
                                    value="{{$vehicle->engine_code}}"
                                    required autocomplete="engine_code" />

                    <x-input-error :messages="$errors->get('engine_code')" class="mt-2" />
                </div>

                <!-- engine_displacement -->
                <div class="mt-4">
                    <x-input-label for="engine_displacement" :value="__('Hengerűrtartalom')" />

                    <x-text-input id="engine_displacement" class="block mt-1 w-full"
                                    type="text"
                                    name="engine_displacement"
                                    value="{{$vehicle->engine_displacement}}"
                                    required autocomplete="engine_displacement" />

                    <x-input-error :messages="$errors->get('engine_displacement')" class="mt-2" />
                </div>

                <!-- mot_expires -->
                <div class="mt-4">
                    <x-input-label for="mot_expires" :value="__('Műszaki vizsga érvényes')" />

                    <x-text-input id="mot_expires " class="block mt-1 w-full"
                                    type="date"
                                    name="mot_expires"
                                    value="{{$vehicle->mot_expires}}"
                                    required autocomplete="mot_expires" />

                    <x-input-error :messages="$errors->get('mot_expires')" class="mt-2" />
                </div>

                <!-- public -->
                <div class="mt-4">
                    <x-input-label for="public" :value="__('Járműhöz tartozó szervízbejegyzések publikusak?')" />

                    <input id="public" class="block mt-1 w-full"
                                    type="checkbox"
                                    name="public"
                                    autocomplete="public" 
                                    @if($vehicle->public==1) checked @endif />

                    <x-input-error :messages="$errors->get('public')" class="mt-2" />
                </div>

                <!-- submit -->
                <div class="flex items-center justify-end mt-4">

                    <x-primary-button class="ml-4">
                        {{ __('Módosít') }}
                    </x-primary-button>
                </div>
                --}}
            </form>
        </x-card>
    </div>
</x-app-layout>
