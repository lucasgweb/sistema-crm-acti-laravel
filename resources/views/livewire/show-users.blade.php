<div>
    <x-table class="table table-bordered table-hover">
        <x-slot:thead>
            <th>#</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Cargo</th>
            <th>Estado</th>
            <th>Acciones</th>
        </x-slot:thead>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->can('Administrador') || $user->can('Master') ? 'Administrador' : 'Asesor' }}
                <td>
                    @if ($user->status == 1)
                        <span class="badge bg-success">Activo</span>
                    @else
                        <span class="badge bg-danger">Inactivo</span>
                    @endif
                </td>
                <td>
                    <div class="d-flex ">
                        <x-table.btn-edit>
                            data-bs-target="#modalEdit"
                            data-id="{{ $user->id }}"
                            data-name="{{ $user->name }}"
                            data-email="{{ $user->email }}"
                        </x-table.btn-edit>
                        @cannot('Usuario')
                            <x-table.btn-delete>
                                {{ route('user.destroy', $user->id) }}
                            </x-table.btn-delete>
                        @endcannot
                    </div>
                </td>
            </tr>
        @endforeach
    </x-table>
    <div class="pagination justify-content-end">
    {{ $users->links() }}
    </div>
</div>
