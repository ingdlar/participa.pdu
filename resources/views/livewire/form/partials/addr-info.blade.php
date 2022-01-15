<div>
    <div class="rounded-r-xl bg-white">
        <h1 class="text-2xl font-bold mx-4">Dirección</h1>
        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mx-8 pb-4">
            <div class="">
                <label for="country_id" class="text-lg antialiased font-semibold"><h6>País</h6></label>
                <select wire:model="country" wire:click="rst" id="country_id" name="country" class="px-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-11/12 h-10">
                    <option value="">Elije...</option>
                    @foreach ( $countries as $cData)
                            <option {{ old('country')==$cData->id ? 'selected="selected"':'' }} value="{{ $cData->id }}">{{ $cData->country }} </option>
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
                <select wire:model="state" wire:click="rst" id="state_id" name="state" class="px-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-11/12 h-10">
                    <option value="">Elije...</option>
                    @foreach ( $states as $sData )
                        <option {{ old('state')==$sData->id ? 'selected="selected"':'' }} value="{{ $sData->id }}">{{ $sData->state }}</option>
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
                <select wire:model="city" wire:click="rst" id="city_id" name="city" class="px-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-11/12 h-10">
                    <option value="">Elije...</option>
                    @foreach ( $cities as $ciData)
                        <option {{ old('city')==$ciData->id ? 'selected="selected"':'' }} value="{{ $ciData->id }}">{{ $ciData->city }}</option>
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
                <x-jet-input wire:model="sector" type="text" class="w-11/12" id="sector_id" name="sector" placeholder="Los Jardines, Los Minas Etc" value="{{ old('street') }}"/>
            </div>
            <div class="">
                <label for="street_id" class="text-lg antialiased font-semibold"><h6>Calle</h6></label>
                <x-jet-input wire:model="street" type="text" class="w-11/12" id="street_id" name="street" placeholder="Calle, Av, Etc" value="{{ old('street') }}"/>
            </div>
            <div class="">
                <label for="residency_id" class="text-lg antialiased font-semibold"><h6>Domicilio</h6></label>
                <x-jet-input wire:model="residency"  type="text" class="w-11/12" id="residency_id" name="residency" placeholder="# de casa, # Apt: 10-3A" value="{{ old('residency') }}"/>
            </div>
        </div>
        <div x-data="{ open: @entangle('open') }" class="flex justify-end bg-gray-100 rounded-r-xl">
            <nav x-show="open" x-on:click.away="open=false" class="my-4 py-2 px-4 text-sm font-medium rounded-md text-indigo-700">
                <p>Guardado!!</p>
            </nav>
            <button x-bind:disabled="open" wire:click="saveAddrInfo" class="mx-4 my-4 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Guardar
            </button>
        </div>
    </div>
</div>
