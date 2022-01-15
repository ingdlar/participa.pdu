<div>
    <div class="rounded-r-xl bg-white pt-4">
        <h1 class="text-2xl font-bold mx-4">Intereses o Aspiraciones</h1>
        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mx-8 pb-4">
            <div class="">
                <label for="elective_id" class=""><h6>Intereses Electivos Populares</h6></label>
                <select id="elective_id" name="elective" class="px-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-11/12 h-10" >
                    <option value="">Elije...</option>
                    @foreach ( $electives as $eData)
                            <option {{ old('elective')==$eData->id  ? 'selected':'' }} value="{{ $eData->id }}" >{{ $eData->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="">
                <label for="directive_id" class=""><h6>Posiciones Directivas Partidarias</h6></label>
                <select id="directive_id" name="directive" class="px-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-11/12 h-10">
                    <option value="">Elije...</option>
                    @foreach ( $directives as $dData)
                            <option {{ old('directive')==$dData->id  ? 'selected':'' }} value="{{ $dData->id }}" >{{ $dData->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="">
                <label for="social_id" class=""><h6>Principal Interes Social</h6></label>
                <select id="social_id" name="social" class="px-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-11/12 h-10">
                    <option value="">Elije...</option>
                    @foreach ( $socials as $sData)
                            <option {{ old('social')==$sData->id ? 'selected':'' }} value="{{ $sData->id }}" >{{ $sData->interest }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
