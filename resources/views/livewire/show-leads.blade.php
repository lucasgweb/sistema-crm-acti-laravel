
<div>
    <div class="row justify-content-center">
        <div class="col-auto ">
            <label class="form-label">
                <span class="text-xs fw-400">Fecha Inicio:</span>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="basic-addon1"><i data-feather="calendar"></i></span>
                    <input type="date" class="form-control" placeholder="Fecha inicio" wire:model="startDate">
                </div>
            </label>
        </div>
        <div class="col-auto ">
            <label class="form-label">
                <span class="text-xs fw-400">Fecha Fin:</span>
                <div class="input-group flex-nowrap">
                    <span class="input-group-text" id="basic-addon1"><i data-feather="calendar"></i></span>
                    <input type="date" class="form-control" placeholder="Fecha Fin" wire:model="endDate">
                </div>
            </label>
        </div>

        <div class="col-auto">
            <label class="form-label">
                <span class="text-xs fw-400">Asesor:</span>
                <select class="form-select" id="autoSizingSelect" wire:model="userId">
                    <option selected value="0">Seleccionar asesor</option>
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </label>
        </div>

        <div class="col-auto">
            <br>
            <button type="submit" class="btn btn-light bg-primary text-white" value="pesquisar" name="PesquisarEntreDatas">+
                Consultar</button>

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
                            data-id="{{ $lead->id }}"
                            data-name="{{ $lead->name }}"
                            data-email="{{ $lead->email }}"
                        </x-table.btn-edit>
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
{{ $leads->onEachSide(1)->links('vendor.livewire.simple-bootstrap') }}
    </div>
</div>
