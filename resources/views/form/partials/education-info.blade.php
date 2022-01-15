<div>
    <div class="rounded-r-xl bg-white pt-4">
        <h1 class="text-2xl font-bold mx-4">Información Educativa</h1>
        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mx-8 pb-4">
            <div class="">
                <label for="advanced_id" class="text-lg antialiased font-semibold"><h6>Estudios Avanzados</h6></label>
                <x-jet-input type="text" class="w-11/12" id="advanced_id" name="advanced" placeholder="Maestrias, Doctorados" value="{{ old('advanced') }}"/>
            </div>
            <div class="">
                <label for="superior_id" class="text-lg antialiased font-semibold"><h6>Estudios Superiores</h6></label>
                <x-jet-input type="text" class="w-11/12" id="superior_id" name="superior" placeholder="Ingeniero, Doctor, Contable, Etc" value="{{ old('superior') }}"/>
            </div>
            <div class="">
                <label for="other_id" class="text-lg antialiased font-semibold"><h6>Otros Estudios u Oficios</h6></label>
                <x-jet-input type="text" class="w-11/12" id="others_id" name="others" placeholder="Oficio, Etc" value="{{ old('others') }}"/>
            </div>
        </div>
        <!--knowledge-->
        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mx-6 pb-4">
            <div class="col-span sm:col-span-1 md:col-span-2 lg:col-span-3">
                <h5 class="text-xl antialiased font-bold text-center">Conocimientos Generales</h5>
            </div>
            <div class="">
                <x-jet-checkbox class="" type="checkbox" id="doc_write_id" name="doc_write" value="doc_write"/>
                <label class="text-lg antialiased font-semibold align-middle" for="doc_write_id"> Redacción de documentos </label>
            </div>
            <div class="">
                <x-jet-checkbox class="" type="checkbox" id="excel_id" name="excel" value="excel"/>
                <label class="text-lg antialiased font-semibold align-middle" for="excel_id"> Manejo de Excel </label>
            </div>
            <div class="">
                <x-jet-checkbox class="" type="checkbox" id="social_net_id" name="social_net" value="social_net"/>
                <label class="text-lg antialiased font-semibold align-middle" for="social_net_id"> Redes Sociales </label>
            </div>
            <div class="">
                <x-jet-checkbox class="" type="checkbox" id="video_ed_id" name="video_ed" value="video_ed"/>
                <label class="text-lg antialiased font-semibold align-middle" for="video_ed_id"> Edición de Videos </label>
            </div>
            <div class="">
                <x-jet-checkbox class="" type="checkbox" id="photography_id" name="photography" value="photography"/>
                <label class="text-lg antialiased font-semibold align-middle" for="photography_id"> Fotografía </label>
            </div>
            <div class="">
                <x-jet-checkbox class="" type="checkbox" id="design_id" name="design" value="design"/>
                <label class="text-lg antialiased font-semibold align-middle" for="design_id"> Diseño </label>
            </div>
        </div>
    </div>
</div>
