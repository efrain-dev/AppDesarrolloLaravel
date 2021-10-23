<div class="sm:-mx-6 lg:-mx-8 basic_table">
    <div class="py-2  lg:px-8">
        <div class="shadow border-b border-gray-200 sm:rounded-lg mb-5 overflow-auto">
            <table class=" divide-y divide-gray-400 table-hover   ">
                <thead class="bg-gray-200 border-b border-gray-300">
                <tr>
                    <th scope="col"
                        class="table__th">
                        ID
                    </th>

                    <th scope="col"
                        class="table__th">
                        Nombre
                    </th>

                    <th scope="col"
                        class="table__th">
                        Email
                    </th>
                    <th scope="col"
                        class="table__th">
                        Foto
                    </th>
                    <th scope="col"
                        class="table__th">
                        Opciones
                    </th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @foreach($users as $user)
                    <tr>
                        <td class="table__td">
                            {{ $user->id }}
                        </td>
                        <td class="table__td">
                            {{ $user->name }}
                        </td>
                        <td class="table__td">
                            {{ $user->email}}
                        </td>
                        <td class="table__td">
                            {{ $user->profile_photo_path}}
                        </td>
                        <td class="table__td">
                            <div class="inline-block whitespace-no-wrap">
                                <button wire:click="edit({{ $user->id }})"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Editar
                                </button>
                                <button wire:click="$emit('triggerDelete',{{ $user->id }})"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Eliminar
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $users->links('pagination',['is_livewire' => true]) }}

        </div>
    </div>
</div>
