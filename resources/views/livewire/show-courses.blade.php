<div>
    <x-table class="table table-bordered table-hover">
        <x-slot:thead>
            <th>#</th>
            <th>Codigo</th>
            <th>Curso</th>
            <th>Categoria</th>
            <th>Cant. horas</th>
            <th>Descripción</th>
            <th>Estado</th>
            <th>Acciones</th>
        </x-slot:thead>
        @foreach ($courses as $course)
            <tr>
                <td>{{ $course->id }}</td>
                <td>{{ $course->code }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->category->name }}</td>
                <td>{{ $course->amount_hours }}</td>
                <td>{{ $course->description }}</td>
                <td>
                    @if ($course->status == 1)
                        <span class="badge bg-success">Activo</span>
                    @else
                        <span class="badge bg-danger">Inactivo</span>
                    @endif
                </td>
                <td>
                    <div class="d-flex ">
                        <x-table.btn-edit>
                            data-bs-target="#modalEdit"
                            data-id="{{ $course->id }}"
                            data-name="{{ $course->name }}"
                            data-code="{{ $course->code }}"
                            data-category="{{ $course->category->name }}"
                            data-categoryId="{{ $course->category->id }}"
                            data-amount-hours="{{ $course->amount_hours }}"
                            data-description="{{ $course->description }}"
                        </x-table.btn-edit>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-table>
    <div class="pagination justify-content-end">
        {{ $courses->links() }}
    </div>
</div>


