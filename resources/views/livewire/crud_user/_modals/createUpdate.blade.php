<x-jet-dialog-modal wire:model="isOpen" wire:maxWidth="2xl">
    <x-slot name="title">
        Ingrese la informacion usuario
    </x-slot>

    <x-slot name="content">
        <div class="grid sm:grid-cols-2 md:grid-cols-2">
            <div class="w-full px-3 mb-6 md:mb-0 my-5">
                <label for="nameTitle" class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                <input type="text" class="form_control @error('name') is-invalid @enderror" id="nameTitle"
                       placeholder="Ingrese el nombre" wire:model="name">
                @error('name') <span class="text-red-500 span-form">{{ $message }}</span>@enderror
            </div>
            <div class="w-full px-3 mb-6 md:mb-0 my-5">
                <label for="nitInput" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <input type="email" class="form_control @error('email') is-invalid @enderror " id="nitInput"
                       placeholder="Ingrese el email" wire:model="email">
                @error('nit') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div class="w-full px-3 mb-6 md:mb-0 my-5">
                <label for="usernameInput" class="block text-gray-700 text-sm font-bold mb-2">Foto</label>
                <input type="text" class="form_control @error('profile_photo_path') is-invalid @enderror" id="usernameInput"
                       placeholder="Ingrese la foto" wire:model="profile_photo_path">
                @error('username') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
            <div class="w-full px-3 mb-6 md:mb-0 my-5">
                <label for="passwordInput" class="block text-gray-700 text-sm font-bold mb-2">Ingrese la
                    github</label>
                <input type="text" class="form_control @error('github') is-invalid @enderror" id="passwordInput"
                       placeholder="Ingrese su github" wire:model="github">
                @error('github') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>
        </div>
    </x-slot>

    <x-slot name="footer">
        <div class="grid md:grid-cols-2 sm:grid-cols-1">
            <button wire:click.prevent="store()"
                    class="bg-green-600 hover:bg-green-700 text-white font-bold px-4 py-2 md:mx-5 sm:my-3 rounded">
                Guardar
            </button>
            <button wire:click="closeModal()"
                    class="bg-red-700 hover:bg-red-600  text-white font-bold  px-4 py-2 md:mx-5 sm:my-3 rounded">
                Cancelar
            </button>
        </div>
    </x-slot>
</x-jet-dialog-modal>
