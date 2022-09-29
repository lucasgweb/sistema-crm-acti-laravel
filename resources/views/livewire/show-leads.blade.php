<div>
    <div class="row justify-content-center mb-4">
        <div class="col-auto ">
            <label class="form-label">
                <span class="text-xs fw-400"><b>Fecha Inicio:</b></span>
                <input type="date" class="form-control" placeholder="Fecha inicio" wire:model="startDate">
            </label>
        </div>
        <div class="col-auto ">
            <label class="form-label">
                <span class="text-xs fw-400"><b>Fecha Fin:</b></span>
                <input type="date" class="form-control" placeholder="Fecha Fin" wire:model="endDate">
            </label>
        </div>

        <div class="col-auto">
            <label class="form-label">
                <span class="text-xs fw-400"><b>Asesor:</b></span>
                <select class="form-select" id="autoSizingSelect" wire:model="userId">
                    <option selected value="0">Seleccionar asesor</option>
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </label>
        </div>

    </div>
    <x-table class="table table-bordered table-hover">
        <x-slot:thead>
            <th>Fecha de Registro</th>
            <th>Nombre</th>
            <th>Curso</th>
            <th>Asesor</th>
            <th>Telefono</th>
            <th>Email</th>
            <th>Estado Venta</th>
            <th>Estado</th>
            <th>Canal</th>
            <th>Acciones</th>
        </x-slot:thead>
        @foreach ($leads as $lead)
            <tr>
                <td>{{ date('d/m/Y',strtotime($lead->created_at)) }}</td>
                <td>{{ $lead->name }}</td>
                <td>{{ $lead->course->name }}</td>
                <td>{{ $lead->user->name }}</td>
                <td>{{ $lead->phone}}</td>
                <td>{{ $lead->email }}</td>
                <td>{{ $lead->situation->name }}</td>
                <td>
                    @if ($lead->status == 1)
                        <span class="badge bg-success">Activo</span>
                    @else
                        <span class="badge bg-danger">Inactivo</span>
                    @endif
                </td>
                <td>{{ $lead->channel->name }}</td>
                <td>
                    <div class="d-flex ">
                        <x-table.btn-edit>
                            data-bs-target="#modalEdit"
                            data-bs-id="{{ $lead->id }}"
                            data-bs-name="{{ $lead->name }}"
                            data-bs-email="{{ $lead->email }}"
                            data-bs-phone="{{ $lead->phone }}"
                            data-bs-courseId="{{ $lead->course->id }}"
                            data-bs-courseName="{{ $lead->course->name }}"
                            data-bs-channelId="{{ $lead->channel->id }}"
                            data-bs-channelName="{{ $lead->channel->name }}"
                            data-bs-description="{{ $lead->description }}"
                        </x-table.btn-edit>
                        <x-table.btn-edit-user>
                            data-bs-target="#modalEditUser"
                            data-bs-id="{{ $lead->id }}"
                        </x-table.btn-edit-user>
                        @cannot('Usuario')
                            <x-table.btn-delete>
                                {{ route('user.destroy', $lead->id) }}
                            </x-table.btn-delete>
                        @endcannot
                    </div>
                </td>
            </tr>
        @endforeach
    </x-table>
    <div class="pagination justify-content-end">
        {{ $leads->onEachSide(2)->links() }}
    </div>
</div>
