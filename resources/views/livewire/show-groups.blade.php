<div>
    <x-table class="table table-bordered table-hover">
        <x-slot:thead>
            <th>#</th>
            <th>F.Inicio</th>
            <th>F.Fin</th>
            <th>Curso</th>
            <th>Grupo</th>
            <th>Profesor</th>
            <th>Modalid</th>
            <th>Estado</th>
            <th>Acciones</th>
        </x-slot:thead>
        @foreach ($groups as $group)
            <tr>
                <td>{{ $group->id }}</td>
                <td>{{ date('d/m/Y', strtotime($group->semester->date_start))  }}</td>
                <td>{{ date('d/m/Y',strtotime($group->semester->date_end)) }}</td>
                <td>{{ $group->course->name }}</td>
                <td>{{ $group->name }}</td>
                <td>{{ $group->teacher->name}}</td>
                <td>{{ $group->modality->name}}</td>
                <td>
                    @if ($group->status == 1)
                        <span class="badge bg-success">Activo</span>
                    @else
                        <span class="badge bg-danger">Inactivo</span>
                    @endif
                </td>
                <td>
                    <div class="d-flex ">
                        <x-table.btn-edit>
                            data-bs-target="#modalEdit"
                            data-id="{{ $group->id }}"
                            data-name="{{ $group->name }}"
                            data-capacity="{{ $group->capacity }}"
                            data-semester="{{ $group->semester->name }}"
                            data-semesterId="{{ $group->semester->id }}"
                            data-teacher="{{ $group->teacher->name }}"
                            data-teacherId="{{ $group->teacher->id }}"
                            data-course="{{ $group->course->name }}"
                            data-courseId="{{ $group->course->id}}"
                            data-modality="{{ $group->modality->name}}"
                            data-modalityId="{{ $group->modality->id}}"
                            data-type="{{ $group->type->name}}"
                            data-typeId="{{ $group->type->id}}"
                        </x-table.btn-edit>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-table>
    <div class="pagination justify-content-end">
        {{ $groups->links() }}
    </div>
</div>


