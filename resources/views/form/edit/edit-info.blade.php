<x-app-layout>
    <main class="mx-4 my-4">
        <div class="flex justify-left p-4 bg-blue-800 mx-4 my-4 rounded-xl shadow-lg">
            <h1 class="text-2xl text-white font-bold">EDITAR INFO</h1>
        </div>
        @livewire('form.partials.personal-info')
            <div class="py-2"></div>
        @livewire('form.partials.contact-info')
            <div class="py-2"></div>
        @livewire('form.partials.addr-info')
            <div class="py-2"></div>
        @livewire('form.partials.education-info')
            <div class="py-2"></div>
        @livewire('form.partials.interest-info')
            <div class="py-2"></div>
        @livewire('form.partials.comment-info')
    </main>
</x-app-layout>
