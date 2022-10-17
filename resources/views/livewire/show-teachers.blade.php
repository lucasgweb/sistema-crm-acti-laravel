<div>
    <div class="row justify-content-end mb-4">
        <div class="col-auto ">
            <label class="form-label">
                <input class="form-control" wire:model="search" type="search" placeholder="Buscar...">
            </label>
        </div>
    </div>
    <x-table class="table table-bordered table-hover">
        <x-slot:thead>
            <th>Nombre</th>
            <th>DNI</th>
            <th>Email</th>
            <th>Telefono</th>
            <th>Dirección</th>
            <th>Curso</th>
            <th>Estado</th>
            <th>Acciones</th>
        </x-slot:thead>
        @foreach ($teachers as $teacher)
            <tr>
                <td>{{ $teacher->name }}</td>
                <td>{{ $teacher->document }}</td>
                <td>{{ $teacher->email }}</td>
                <td>{{ $teacher->phone}}</td>
                <td>{{ $teacher->address }}</td>
                <td>{{  $teacher->course->name }}</td>
                <td>
                    @if ($teacher->status == 1)
                        <span class="badge bg-success">Activo</span>
                    @else
                        <span class="badge bg-danger">Inactivo</span>
                    @endif
                </td>
                <td>
                    <div class="d-flex ">
                        <x-table.btn-edit>
                            data-bs-target="#modalEdit"
                            data-id="{{ $teacher->id }}"
                            data-name="{{ $teacher->name }}"
                            data-phone="{{ $teacher->phone }}"
                            data-email="{{ $teacher->email }}"
                            data-remuneration="{{ $teacher->remuneration}}"
                            data-document="{{ $teacher->document}}"
                            data-course-id="{{ $teacher->course->id }}"
                            data-course="{{ $teacher->course->name }}"
                            data-address="{{ $teacher->address }}"
                        </x-table.btn-edit>
                        @cannot('Usuario')
                        <x-table.btn-delete>
                            {{ route('teacher.destroy', $teacher->id) }}
                        </x-table.btn-delete>
                        @endcannot
                    </div>
                </td>
            </tr>
        @endforeach

    </x-table>
    <div class="pagination justify-content-end">
        {{$teachers->links()}}
    </div>
</div>

