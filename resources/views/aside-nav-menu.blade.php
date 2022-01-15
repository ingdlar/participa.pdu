
    <aside
        class="flex px-16 space-y-1 overflow-hidden m-3 pb-4 flex-col items-center justify-center rounded-tl-xl rounded-bl-xl bg-blue-800 shadow-lg">
        <div class="">
            <div class="bg-gray-300 mt-4 p-4 rounded-xl">
                <a href="{{ route('dashboard') }}" >
                    <img src="{{ asset('images/logo.png') }}" alt="" class="rounded-3xl">
                </a>
                <div class="mt-4">
                    <div class="flex items-center justify-center font-medium text-base text-gray-800 mb-4">
                        {{ Auth::user()->name." ".Auth::user()->lastname }}
                    </div>
                    <div class="flex justify-center">
                        <div class="flex justify-center font-medium text-base text-gray-800 bg-white rounded-xl w-48">
                            <form method="POST" action="{{ route('logout') }}" >
                                @csrf
                                <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-jet-dropdown-link>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ul>
            <li class="flex space-x-2 mt-2 px-6 py-2 text-white hover:bg-white hover:text-blue-800 font-bold transition duration-100 cursor-pointer">
                <a href="{{ route('dashboard') }}">
                    <div class="flex items-center gap-x-2">
                        <i class="fas fa-tachometer-alt fa-2x"></i>
                        Dashboard
                    </div>
                </a>
            </li>
            <li class="flex space-x-2 mt-2 px-6 py-2 text-white hover:bg-white hover:text-blue-800 font-bold transition duration-100 cursor-pointer">
                <a href="{{ route('form.edit') }}">
                    <div class="flex items-center gap-x-2">
                        <i class="fas fa-user-edit fa-2x"></i>
                        Editar Info
                    </div>
                </a>
            </li>
            <li class="flex space-x-2 mt-2 px-6 py-2 text-white hover:bg-white hover:text-blue-800 font-bold transition duration-100 cursor-pointer">
                <a href="{{ route('profile.show') }}">
                    <div class="flex items-center gap-x-2">
                        <i class="fas fa-cog fa-2x"></i>
                        Cuenta
                    </div>
                </a>
            </li>
            <li class="flex space-x-2 mt-2 px-6 py-2 text-white hover:bg-white hover:text-blue-800 font-bold transition duration-100 cursor-pointer">
                <a href="https://du.org.do/" target="_blank">
                    <div class="flex items-center gap-x-2">
                        <i class="fas fa-globe fa-2x"></i>
                        Pagina Web
                    </div>
                </a>
            </li>
            <li class="flex space-x-2 mt-2 px-6 py-2 text-white hover:bg-white hover:text-blue-800 font-bold transition duration-100 cursor-pointer">
                <a href="">
                    <div class="flex items-center gap-x-2">
                        <i class="fas fa-share-alt fa-2x"></i>
                        Redes Sociales
                    </div>
                </a>
            </li>
        </ul>
    </aside>
