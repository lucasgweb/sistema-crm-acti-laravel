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
       @foreach ($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->document }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->phone}}</td>
                <td>{{ $student->address }}</td>
                <td>{{ $student->course->name}}</td>
                <td>
                    @if ($student->status == 1)
                        <span class="badge bg-success">Activo</span>
                    @else
                        <span class="badge bg-danger">Inactivo</span>
                    @endif
                </td>
                <td>
                    <div class="d-flex ">
                        <x-table.btn-edit>
                            data-bs-target="#modalEdit"
                            data-id="{{ $student->id }}"
                            data-name="{{ $student->name }}"
                            data-phone="{{ $student->phone }}"
                            data-email="{{ $student->email }}"
                            data-document="{{ $student->document}}"
                            data-course-id="{{ $student->course->id }}"
                            data-course="{{ $student->course->name }}"
                            data-address="{{ $student->address }}"
                        </x-table.btn-edit>
                            <x-table.btn-delete>
                                {{ route('student.destroy', $student->id) }}
                            </x-table.btn-delete>
                    </div>
                </td>
            </tr>
        @endforeach

    </x-table>
    <div class="pagination justify-content-end">
        {{$students->links()}}
    </div>
</div>

