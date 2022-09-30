<div>
    <x-table class="table table-bordered table-hover">
        <x-slot:thead>
            <th>#</th>
            <th>Modalidad</th>
            <th>Estado</th>
            <th>Acciones</th>
        </x-slot:thead>
        @foreach ($modalities as $modality)
            <tr>
                <td>{{ $modality->id }}</td>
                <td>{{ $modality->name }}</td>
                <td>
                    @if ($modality->status == 1)
                        <span class="badge bg-success">Activo</span>
                    @else
                        <span class="badge bg-danger">Inactivo</span>
                    @endif
                </td>
                <td>
                    <div class="d-flex ">
                        <x-table.btn-edit>
                            data-bs-target="#modalEdit"
                            data-id="{{ $modality->id }}"
                            data-name="{{ $modality->name }}"
                        </x-table.btn-edit>
                        <x-table.btn-delete>
                            {{ route('modality.destroy', $modality->id) }}
                        </x-table.btn-delete>
                    </div>
                </td>
            </tr>
        @endforeach
    </x-table>
    <div class="pagination justify-content-end">
        {{ $modalities->links() }}
    </div>
</div>

