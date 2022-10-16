<div>
    <x-table class="table table-bordered table-hover">
        <x-slot:thead>
            <th>#</th>
            <th>Fecha inicio</th>
            <th>Fecha fin</th>
            <th>Status</th>
            <th>Acciones</th>
        </x-slot:thead>
        @foreach ($semesters as $semester)
            <tr>
                <td>{{ $semester->id }}</td>
                <td>{{ date('d/m/Y',strtotime($semester->date_start))}}</td>
                <td>{{ date('d/m/Y',strtotime($semester->date_end))}}</td>
                <td>
                    @if ($semester->status == 1)
                        <span class="badge bg-success">Activo</span>
                    @else
                        <span class="badge bg-danger">Inactivo</span>
                    @endif
                </td>
                <td>
                    <div class="d-flex ">
                        <x-table.btn-edit>
                            data-bs-target="#modalEdit"
                            data-start="{{ date('Y-m-d',strtotime($semester->date_start))}}"
                            data-id="{{ $semester->id }}"
                            data-end="{{ date('Y-m-d',strtotime($semester->date_end))}}"
                        </x-table.btn-edit>
                        <x-table.btn-delete>
                            {{ route('semester.destroy', $semester->id) }}
                        </x-table.btn-delete>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-table>
    <div class="pagination justify-content-end">
        {{ $semesters->links() }}
    </div>
</div>


