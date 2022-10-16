@extends('layouts.default')
@section('content')
    <x-header icon="bi bi-people-fill">
        Administrar Grupos
        <x-slot:subtitle>
            Gestión de Grupos
        </x-slot:subtitle>
    </x-header>
    <x-card>
        <x-btn-primary title="+ Agregar Grupo" class="mb-3">
            data-bs-target="#modalNew"
        </x-btn-primary>

        <livewire:show-groups/>

    </x-card>
    {{-- Modal de adicionar tipo --}}
    <x-modal title="Detalles" action="{{ route('type.store') }}" id="modalNew">


        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label class="small mb-1" for="inputEditName">Denominación:</label>
                    <input class="form-control" id="getName" type="text" placeholder="Ingresar denominación" name="name" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-3">
                    <label class="small mb-1" for="inputEditName">Capacidad:</label>
                    <input class="form-control" id="getCapacity" type="number" placeholder="Ingresar capacidad"
                           name="capacity" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label class="small mb-1">Profesor:</label>
                    <select class="form-select" title="Status:" name="teacher_id" required>
                        <option selected disabled>Seleccione un profesor</option>
                        @foreach($teachers as $teacher)
                            <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-3">
                    <label class="small mb-1">Semestre:</label>
                    <select class="form-select" title="Semester:" name="semester_id" required>
                        <option selected disabled>Seleccione un semestre</option>
                        @foreach($semesters as $semester)
                            <option value="{{ $semester->id }}">
                                {{ date('d/m/Y',strtotime($semester->date_start ))}}
                                - {{ date('d/m/Y',strtotime($semester->date_end))  }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label class="small mb-1">Curso:</label>
                    <select class="form-select" title="Curso:" name="course_id" required>
                        <option selected disabled>Seleccione un curso</option>
                        @foreach($courses as $course)
                            <option value="{{$course->id}}">{{$course->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-3">
                    <label class="small mb-1">Modalidad:</label>
                    <select class="form-select" title="Modalidad:" name="modality_id">
                        <option selected disabled>Seleccione una modalidad</option>
                        @foreach($modalities as $modality)
                            <option value="{{$modality->id}}">{{$modality->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label class="small mb-1">Tipo:</label>
                    <select class="form-select" title="Types:" name="type_id">
                        <option selected disabled>Seleccione un tipo</option>
                        @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <x-slot:footer>
            <x-btn-submit>Agregar</x-btn-submit>
        </x-slot:footer>
    </x-modal>
    {{-- Fim do modal de adicionar tipo --}}

    {{-- Modal de editar tipo --}}
    <x-modal title="Editar" action="{{ route('type.update') }}" id="modalEdit">

        @method('PUT')
        <input type="hidden" name="id" id="inputId">

        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label class="small mb-1" for="inputEditName">Denominación:</label>
                    <input class="form-control" id="getName" type="text" placeholder="Ingresar tipo" name="name">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-3">
                    <label class="small mb-1" for="inputEditName">Capacidad:</label>
                    <input class="form-control" id="getCapacity" type="text" placeholder="Ingresar tipo"
                           name="capacity">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label class="small mb-1">Profesor:</label>
                    <select class="form-select" title="Status:" name="teacher_id">
                        <option value="1">Activo</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-3">
                    <label class="small mb-1">Semestre:</label>
                    <select class="form-select" title="Semester:" name="semester_id">
                        <option value="1">Activo</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label class="small mb-1">Curso:</label>
                    <select class="form-select" title="Curso:" name="course_id">
                        <option value="1">Activo</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-3">
                    <label class="small mb-1">Modalidad:</label>
                    <select class="form-select" title="Status:" name="modality_id">
                        <option value="1">Activo</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                    <label class="small mb-1">Tipo:</label>
                    <select class="form-select" title="Status:" name="type_id">
                        <option value="1">Activo</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="mb-3">
                    <label class="small mb-1">Estado:</label>
                    <select class="form-select" title="Status:" name="status">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>
            </div>
        </div>

        <x-slot:footer>
            <x-btn-submit>Guardar Cambios</x-btn-submit>
        </x-slot:footer>
    </x-modal>
    {{-- Fim do modal de editar tipo --}}

@endsection

@push('script')
    @livewireScripts
    <script>
        const modalEdit = document.getElementById('modalEdit')
        modalEdit.addEventListener('show.bs.modal', event => {

            const button = event.relatedTarget

            const id = button.getAttribute('data-id')
            const name = button.getAttribute('data-name')

            const inputName = modalEdit.querySelector('#inputEditName')
            const inputId = modalEdit.querySelector('#inputId')

            inputId.value = id
            inputName.value = name
        })
    </script>
@endpush


