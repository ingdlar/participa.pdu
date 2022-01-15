<div>
    <!-- Informacion de Contacto -->
    <div class="rounded-r-xl bg-white pt-4">
        <h1 class="text-2xl font-bold mx-4">Información Personal de Contacto</h1>
        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mx-8 pb-4">
            <div class="">
                <label for="cel_id" class="text-lg antialiased font-semibold"><h6>Celular</h6></label>
                <x-jet-input wire:model="cel" type="tel" class="w-11/12" id="cel_id" name="cel" placeholder="Celular" value="{{ old('cel') }}"/>
                <div>
                    @error('cel')
                        <small>*{{ $message }}</small>
                    @enderror
                </div>
            </div>
            <div class="">
                <label for="phone_id" class="text-lg antialiased font-semibold"><h6>Telefono Fijo</h6></label>
                <x-jet-input wire:model="phone" type="tel" class="w-11/12" id="phone_id" name="phone" placeholder="Tel Casa" value="{{ old('phone') }}"/>
            </div>
            <div class="">
                <label for="email_id" class="text-lg antialiased font-semibold"><h6>Correo</h6></label>
                <x-jet-input wire:model="email" type="email" class="w-11/12" id="email_id" name="email" placeholder="email@hola.com" value="{{ old('email') }}"/>
                <div>
                    @error('email')
                        <small>*{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </div>
        <div x-data="{ open: @entangle('open') }" class="flex justify-end bg-gray-100 rounded-r-xl">
            <nav x-show="open" x-on:click.away="open=false" class="my-4 py-2 px-4 text-sm font-medium rounded-md text-indigo-700">
                <p>Guardado!!</p>
            </nav>
            <button x-bind:disabled="open" wire:click="saveContactInfo" class="mx-4 my-4 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Guardar
            </button>
        </div>
    </div>
</div>
