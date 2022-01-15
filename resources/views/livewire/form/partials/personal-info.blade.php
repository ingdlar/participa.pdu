<div>
    <!-- Informacion Personal -->
    <div class="rounded-r-xl bg-white pt-4">
        <h1 class="text-2xl font-bold mx-4">Información Personal</h1>
        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mx-8 pb-4">
            <div class="">
                <label for="card_id" class="text-lg antialiased font-semibold"><h6>Cédula</h6></label>
                <x-jet-input wire:model="card" type="text" class="w-11/12" id="card_id" name="card" placeholder="001400050070" value="{{ old('card') }}" disabled/>
                <div>
                    @error('card')
                        <small>*{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="">
                <label for="name_id" class="text-lg antialiased font-semibold"><h6>Nombres</h6></label>
                <x-jet-input wire:model.defer="name" type="text" class="w-11/12" id="name_id" name="name" placeholder="Nombres" value="{{ old('name') }}"/>
                <div>
                    @error('name')
                        <small>*{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="">
                <label for="lastname_id" class="text-lg antialiased font-semibold"><h6>Apellidos</h6></label>
                <x-jet-input wire:model.defer="lastname" type="text" class="w-11/12" id="lastname_id" name="lastname" placeholder="Apellidos" value="{{ old('lastname') }}"/>
                <div>
                    @error('lastname')
                        <small>*{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mx-8 pb-4">
            <div class="">
                <label for="birthday_id" class="text-lg antialiased font-semibold"><h6>Cumpleaños</h6></label>
                <x-jet-input wire:model="birthday" type="date" class="w-11/12" id="birthday_id" name="birthday" value="{{ old('birthday') }}"/>
                <div>
                    @error('birthday')
                        <small>*{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="">
                <label for="sex_id" class="text-lg antialiased font-semibold"><h6>Sexo</h6></label>
                <select wire:model="sex" id="sex_id" name="sex" class="px-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-11/12 h-10">
                    <option value="">Elije...</option>
                    @foreach ( $sexes as $sex )
                        <option {{ old('sex')==$sex->id ? 'selected="selected"':'' }} value="{{ $sex->id }}">{{ $sex->sex }}</option>
                    @endforeach
                </select>
                <div>
                    @error('sex')
                        <small>*{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div x-data="{ open: @entangle('open') }" class="flex justify-end bg-gray-100 rounded-r-xl">
            <nav x-show="open" x-on:click.away="open=false" class="my-4 py-2 px-4 text-sm font-medium rounded-md text-indigo-700">
                <p>Guardado!!</p>
            </nav>
            <button x-on:click="open=true" x-bind:disabled="open" wire:click="savePersonalInfo" class="mx-4 my-4 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Guardar
            </button>
        </div>
    </div>
</div>
