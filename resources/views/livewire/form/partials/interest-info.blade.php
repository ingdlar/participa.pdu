<div>
    <div class="rounded-r-xl bg-white pt-4">
        <h1 class="text-2xl font-bold mx-4">Intereses o Aspiraciones</h1>
        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mx-8 pb-4">
            <div class="">
                <label for="elective_id" class=""><h6>Intereses Electivos Populares</h6></label>
                <select wire:model="elective" id="elective_id" name="elective" class="px-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-11/12 h-10" >
                    <option value="">Elije...</option>
                    @foreach ( $electives as $evData)
                            <option {{ old('elective')==$evData->id  ? 'selected="selected"':'' }} value="{{ $evData->id }}" >{{ $evData->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="">
                <label for="directive_id" class=""><h6>Posiciones Directivas Partidarias</h6></label>
                <select wire:model="directive" id="directive_id" name="directive" class="px-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-11/12 h-10">
                    <option value="">Elije...</option>
                    @foreach ( $directives as $dvData)
                            <option {{ old('directive')==$dvData->id  ? 'selected="selected"':'' }} value="{{ $dvData->id }}" >{{ $dvData->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="">
                <label for="social_id" class=""><h6>Principal Interes Social</h6></label>
                <select wire:model="social" id="social_id" name="social" class="px-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-11/12 h-10">
                    <option value="">Elije...</option>
                    @foreach ( $socials as $svData)
                            <option {{ old('social')==$svData->id ? 'selected="selected"':'' }} value="{{ $svData->id }}" >{{ $svData->interest }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div x-data="{ open: @entangle('open') }" class="flex justify-end bg-gray-100 rounded-r-xl">
            <nav x-show="open" x-on:click.away="open=false" class="my-4 py-2 px-4 text-sm font-medium rounded-md text-indigo-700">
                <p>Guardado!!</p>
            </nav>
            <button x-bind:disabled="open" wire:click="saveInterestInfo" class="mx-4 my-4 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Guardar
            </button>
        </div>
    </div>
</div>
