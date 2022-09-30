@extends('layouts.default')
@section('content')
    <x-header icon="bi bi-people-fill">
        Administrar Modalidades
        <x-slot:subtitle>
            Gestión de Modalidades
        </x-slot:subtitle>
    </x-header>
    <x-card>
        <x-btn-primary title="+ Agregar Modalidad" class="mb-3">
            data-bs-target="#modalNew"
        </x-btn-primary>

        <livewire:show-modalities/>

    </x-card>
    {{-- Modal de adicionar modalidade --}}
    <x-modal title="Detalles" action="{{ route('modality.store') }}" id="modalNew">


        <div class="mb-3">
            <label class="small mb-1" for="inputName">Tipo:</label>
            <input class="form-control" id="inputName" type="text" placeholder="Ingresar modalidad" name="name">
        </div>

        <x-slot:footer>
            <x-btn-submit>Agregar</x-btn-submit>
        </x-slot:footer>
    </x-modal>
    {{-- Fim do modal de adicionar modalidade --}}

    {{-- Modal de editar modalidade --}}
    <x-modal title="Editar" action="{{ route('modality.update') }}" id="modalEdit">

        @method('PUT')
        <input type="hidden" name="id" id="inputId">

        <div class="mb-3">
            <label class="small mb-1" for="inputEditName">Tipo:</label>
            <input class="form-control" id="inputEditName" type="text" placeholder="Ingresar modalidad" name="name">
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
    {{-- Fim do modal de editar modalidade --}}

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

