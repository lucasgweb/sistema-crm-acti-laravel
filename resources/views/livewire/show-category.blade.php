<div>
    <x-table class="table table-bordered table-hover">
        <x-slot:thead>
            <th>#</th>
            <th>Categoría</th>
            <th>Estado</th>
            <th>Acciones</th>
        </x-slot:thead>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    @if ($category->status == 1)
                        <span class="badge bg-success">Activo</span>
                    @else
                        <span class="badge bg-danger">Inactivo</span>
                    @endif
                </td>
                <td>
                    <div class="d-flex ">
                        <x-table.btn-edit>
                            data-bs-target="#modalEdit"
                            data-id="{{ $category->id }}"
                            data-name="{{ $category->name }}"
                        </x-table.btn-edit>
                        @cannot('Usuario')
                            <x-table.btn-delete>
                                {{ route('category.destroy', $category->id) }}
                            </x-table.btn-delete>
                        @endcannot
                    </div>
                </td>
            </tr>
        @endforeach
    </x-table>
    <div class="pagination justify-content-end">
        {{ $categories->links() }}
    </div>
</div>
