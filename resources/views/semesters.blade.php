@extends('layouts.default')
@section('content')
    <x-header icon="bi bi-people-fill">
        Administrar Semestres
        <x-slot:subtitle>
            Gestión de Semestres
        </x-slot:subtitle>
    </x-header>
    <x-card>
        <x-btn-primary title="+ Agregar Semestre" class="mb-3">
            data-bs-target="#modalNew"
        </x-btn-primary>

        <livewire:show-semesters/>

    </x-card>
    {{-- Modal de adicionar semestre --}}
    <x-modal title="Detalles" action="{{ route('semester.store') }}" id="modalNew">


        <div class="mb-3">
            <label class="small mb-1" for="inputEditName">Fecha inicio:</label>
            <input class="form-control" id="inputEditName" type="date" name="date_start">
        </div>
        <div class="mb-3">
            <label class="small mb-1" for="inputEditName">Fecha fin:</label>
            <input class="form-control" id="inputEditName" type="date" name="date_end">
        </div>

        <x-slot:footer>
            <x-btn-submit>Agregar</x-btn-submit>
        </x-slot:footer>
    </x-modal>
    {{-- Fim do modal de adicionar semestre --}}

    {{-- Modal de editar semestre --}}
    <x-modal title="Editar" action="{{ route('semester.update') }}" id="modalEdit">

        @method('PUT')
        <input type="hidden" name="id" id="inputId">

        <div class="mb-3">
            <label class="small mb-1" for="getDateStart">Fecha inicio:</label>
            <input class="form-control" id="getDateStart" type="date" name="date_start">
        </div>
        <div class="mb-3">
            <label class="small mb-1" for="getDateEnd">Fecha fin:</label>
            <input class="form-control" id="getDateEnd" type="date" name="date_end">
        </div>

        <div class="mb-3">
            <label class="small mb-1">Estado:</label>
            <select class="form-select" title="Status:" name="status">
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
        </div>


        <x-slot:footer>
            <x-btn-submit>Guardar Cambios</x-btn-submit>
        </x-slot:footer>
    </x-modal>
    {{-- Fim do modal de editar semestre --}}

@endsection

@push('script')
    @livewireScripts
    <script>
        const modalEdit = document.getElementById('modalEdit')
        modalEdit.addEventListener('show.bs.modal', event => {

            const button = event.relatedTarget

            const id = button.getAttribute('data-id')
            const startDate = button.getAttribute('data-start')
            const endDate = button.getAttribute('data-end')

            const inputStart = modalEdit.querySelector('#getDateStart')
            const inputEnd = modalEdit.querySelector('#getDateEnd')
            const inputId = modalEdit.querySelector('#inputId')

            inputId.value = id
            inputStart.value = startDate
            inputStart.textContent = startDate
            inputEnd.value = endDate
            inputEnd.textContent = endDate
        })
    </script>
@endpush


