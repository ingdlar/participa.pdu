<x-app-layout>
    <div class="flex justify-center p-4 bg-blue-800 mx-4 my-4 rounded-xl shadow-lg">
        <h1 class="text-2xl text-white font-bold">BIENVENIDO AL PARTIDO DOMINICANOS UNIDOS</h1>
    </div>
    <main class="bg-gray-200 rounded-r-xl shadow-xl mx-4 my-4">
        <h1>NOTICIAS</h1>
    </main>
    <main class=" bg-gray-200 rounded-r-xl shadow-xl mx-4 my-4">
        @livewire('dashboard.show-total')
    </main>
</x-app-layout>
