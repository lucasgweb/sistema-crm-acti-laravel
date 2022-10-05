@extends('layouts.default')
@section('content')
    <x-header icon="bi bi-people-fill">
        Administrar Cursos
        <x-slot:subtitle>
            Gestión de Cursos
        </x-slot:subtitle>
    </x-header>
    <x-card>
        <x-btn-primary title="+ Agregar Curso" class="mb-3">
            data-bs-target="#modalNew"
        </x-btn-primary>

        <livewire:show-courses/>

    </x-card>
    {{-- Modal de adicionar tipo --}}
    <x-modal title="Detalles" action="{{ route('type.store') }}" id="modalNew">

        <div class="mb-3">
            <label class="small mb-1" for="inputCode">Codigo:</label>
            <input class="form-control" id="inputCode" type="text" name="code" value="{{ $code }}" @disabled(1)>
        </div>

        <div class="mb-3">
            <label class="small mb-1" for="inputName">Nombre:</label>
            <input class="form-control" id="inputName" type="text" placeholder="Ingresar nombre" name="name">
        </div>
        <div class="mb-3">
            <label class="small mb-1" for="inputAmountHours">Cant. horas:</label>
            <input class="form-control" id="inputAmountHours" type="text" placeholder="Ingresar cant. horas"
                   name="amount_hours">
        </div>
        <div class="mb-3">
            <label class="small mb-1" for="inputDescription">Descripción:</label>
            <input class="form-control" id="inputDescription" type="text" placeholder="Ingresar descripción"
                   name="description">
        </div>
        <x-slot:footer>
            <x-btn-submit>Agregar</x-btn-submit>
        </x-slot:footer>
    </x-modal>
    {{-- Fim do modal de adicionar tipo --}}

    {{-- Modal de editar tipo --}}
    <x-modal title="Editar" action="{{ route('type.update') }}" id="modalEdit">

        @method('PUT')
        <input type="hidden" name="id" id="getId">

        <div class="mb-3">
            <label class="small mb-1" for="getCode">Codigo:</label>
            <input class="form-control" id="getCode" type="text" name="code"  @disabled(1)>
        </div>

        <div class="mb-3">
            <label class="small mb-1" for="getName">Nombre:</label>
            <input class="form-control" id="getName" type="text" placeholder="Ingresar nombre" name="name">
        </div>
        <div class="mb-3">
            <label class="small mb-1" for="getAmountHours">Cant. horas:</label>
            <input class="form-control" id="getAmountHours" type="text" placeholder="Ingresar cant. horas"
                   name="amount_hours">
        </div>
        <div class="mb-3">
            <label class="small mb-1" for="getDescription">Descripción:</label>
            <input class="form-control" id="getDescription" type="text" placeholder="Ingresar descripción"
                   name="description">
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
            const code = button.getAttribute('data-code')
            const amountHours = button.getAttribute('data-amount-hours')
            const description = button.getAttribute('data-description')

            const inputName = modalEdit.querySelector('#getName')
            const inputCode = modalEdit.querySelector('#getCode')
            const inputId = modalEdit.querySelector('#getId')
            const inputAmountHours = modalEdit.querySelector('#getAmountHours')
            const inputDescription = modalEdit.querySelector('#getDescription')

            inputId.value = id
            inputName.value = name
            inputCode.value = code
            inputAmountHours.value = amountHours
            inputDescription.value = description
        })
    </script>
@endpush


