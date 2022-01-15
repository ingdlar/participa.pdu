<div>
    <!-- Este formulario no esta utilizando las vista que esta en la carpeta livewire.
    Usa un solo componente de livewire para toda la vista-->

    <div class="mx-4 my-4">
    <form method="POST" action="{{ route('register') }}" class="space-y-4" name="insform">
        @csrf

        @include('form.partials.membership')

        @include('form.partials.personal-info')

        @include('form.partials.contact-info')

        @include('form.partials.addr-info')

        @include('form.partials.education-info')

        @include('form.partials.interest-info')

        @include('form.partials.comment-info')

        <div class="flex justify-center py-3">
            <div>
                @if ( $valid == 1 )
                    <script>
                        alert("Los datos son validos, presione Acceptar o Ok, luego enviar");
                    </script>
                    <div class="">
                        <label class="align-middle">
                            Datos Validados. Click en eviar.
                        </label>
                    </div>
                    <div class="flex justify-center">
                        <x-jet-button type="submit" class="bg-green-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Enviar</x-jet-button>
                    </div>
                @elseif ( sizeof($errors) > 1 )
                    <div>
                        <label class="align-middle">
                            Debe llenar todos los campos obligatorios.
                        </label>
                    </div>
                    <div class="flex justify-center ">
                        <button wire:click="register" type="button" class="bg-blue-700 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded">Validar</button>
                    </div>
                @else
                    <div>
                        <label class="align-middle">
                            Haga clic para validar los datos.
                        </label>
                    </div>
                    <div class="flex justify-center">
                        <button wire:click="register" type="button" class="bg-green-600 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded">Validar</button>
                    </div>
                @endif
            </div>
        </div>
    </form>

    </div>
</div>
