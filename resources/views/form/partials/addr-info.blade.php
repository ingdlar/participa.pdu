<div>
    <div class="rounded-r-xl bg-white">
        <h1 class="text-2xl font-bold mx-4">Dirección</h1>
        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mx-8 pb-4">
            <div x-data class="">
                <label for="country_id" class="text-lg antialiased font-semibold"><h6>País</h6></label>
                <select wire:model="country" id="country_id" name="country" class="px-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-11/12 h-10">
                    <option value="">Elije...</option>
                    @foreach ( $countries as $cData)
                            <option {{ old('country')==$cData->id ? 'selected':'' }} value="{{ $cData->id }}">{{ $cData->country }}</option>
                    @endforeach
                </select>
                <div>
                    @error('country')
                        <small>*{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="">
                <label for="state_id" class="text-lg antialiased font-semibold"><h6>Provincia - Estado</h6></label>
                <select wire:model="state" id="state_id" name="state" class="px-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-11/12 h-10">
                    <option value="">Elije...</option>
                    @foreach ( $states as $sData )
                        <option {{ old('state')==$sData->id ? 'selected':'' }} value="{{ $sData->id }}">{{ $sData->state }}</option>
                    @endforeach
                </select>
                <div>
                    @error('state')
                        <small>*{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="">
                <label for="city_id" class="text-lg antialiased font-semibold"><h6>Municipio - Ciudad</h6></label>
                <select wire:model="city" id="city_id" name="city" value="{{ old('city') }}" class="px-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-11/12 h-10">
                    <option value="">Elije...</option>
                    @foreach ( $cities as $ciData)
                        <option {{ old('city')==$ciData->id ? 'selected':'' }} value="{{ $ciData->id }}">{{ $ciData->city }}</option>
                    @endforeach
                </select>
                <div>
                    @error('city')
                        <small>*{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mx-8 pb-4"><div class="">
            <label for="sector_id" class="text-lg antialiased font-semibold"><h6>Sector</h6></label>
                <x-jet-input type="text" class="w-11/12" id="sector_id" name="sector" placeholder="Los Jardines, Los Minas Etc" value="{{ old('sector') }}"/>
            </div>
            <div class="">
                <label for="street_id" class="text-lg antialiased font-semibold"><h6>Calle</h6></label>
                <x-jet-input type="text" class="w-11/12" id="street_id" name="street" placeholder="Calle, Av, Etc" value="{{ old('street') }}"/>
            </div>
            <div class="">
                <label for="residency_id" class="text-lg antialiased font-semibold"><h6>Domicilio</h6></label>
                <x-jet-input type="text" class="w-11/12" id="residency_id" name="residency" placeholder="# de casa, # Apt: 10-3A" value="{{ old('residency') }}"/>
            </div>
        </div>
    </div>
</div>
