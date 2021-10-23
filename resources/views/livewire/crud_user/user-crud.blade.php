<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Usuario
    </h2>
</x-slot>
<div
    class="container mx-auto px-4 md:w-auto sm:px-6 lg:px-8 my-10 bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden overflow-hidden  ">
    <div class="align-middle inline-block w-full py-4 overflow-hidden">
        <div class="flex flex-wrap content-center ">
            <button wire:click="create()"
                    class="bg-green-600 hover:bg-green-700 text-white font-bold my-2 px-4 rounded">
                Crear
            </button>
            <div class="flex flex-wrap mx-auto items-stretch w-full md:w-2/3 h-full m-2 border border-gray-300">
                <div class="flex">
                                    <span
                                        class="flex items-center leading-normal bg-transparent rounded rounded-r-none border border-r-0 border-none lg:px-3 py-2 whitespace-no-wrap text-grey-dark text-sm">
                                        <svg width="18" height="18" class="w-4 lg:w-auto" viewBox="0 0 18 18"
                                             fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M8.11086 15.2217C12.0381 15.2217 15.2217 12.0381 15.2217 8.11086C15.2217 4.18364 12.0381 1 8.11086 1C4.18364 1 1 4.18364 1 8.11086C1 12.0381 4.18364 15.2217 8.11086 15.2217Z"
                                                stroke="#455A64" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M16.9993 16.9993L13.1328 13.1328" stroke="#455A64"
                                                  stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                    </span>
                </div>
                <input type="text" wire:model="data"
                       class="flex-shrink flex-grow flex-auto leading-normal tracking-wide w-px flex-1 border border-none border-l-0 rounded rounded-l-none px-3  focus:outline-none text-xxs lg:text-xs lg:text-base text-gray-500 font-thin"
                       placeholder="Busqueda">
            </div>
        </div>
        @include('livewire.crud_user._tables.data')
    </div>
    @include('livewire.crud_user._modals.createUpdate')

</div>

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {

            Livewire.on('triggerDelete', id => {
                Swal.fire({
                    title: 'Estas seguro de eliminarlo?',
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Eliminar!',
                    cancelButtonText: 'Cancelar',

                }).then((result) => {
                    if (result.value) {
                    @this.call('delete', id)
                    } else {
                        console.log("Cancelado");
                    }
                });
            })

        })
    </script>
@endpush

