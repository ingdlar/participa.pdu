<div>
    <div class="rounded-r-xl bg-white pt-4">
        <h5 class="pb-2 text-2xl antialiased font-bold text-center">Comparte tus Ideas, Opiniones, Conocimientos</h5>
        <div class="flex justify-center w-full pb-4">
            <textarea wire:model="comment" id="coment_id" name="comment" placeholder="Iquietudes, Ideas, Comentarios" rows="3" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-11/12">
            </textarea>
        </div>
        <div x-data="{ open: @entangle('open') }" class="flex justify-end bg-gray-100 rounded-r-xl">
            <nav x-show="open" x-on:click.away="open=false" class="my-4 py-2 px-4 text-sm font-medium rounded-md text-indigo-700">
                <p>Guardado!!</p>
            </nav>
            <button x-bind:disabled="open" wire:click="saveCommentInfo" class="mx-4 my-4 py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Guardar
            </button>
        </div>
    </div>
</div>
