@extends('layouts.default')
@section('content')
    <x-header>
        Administrar Categorías
        <x-slot:subtitle>
            Gestión de Categorías
        </x-slot:subtitle>
    </x-header>
    <x-card>
        <x-btn-primary title="+ Agregar Categoría" class="mb-3">
            data-bs-target="#modalNew"
        </x-btn-primary>

        <livewire:show-category />

    </x-card>
    @cannot('Usuario')
        {{-- Modal de adicionar categoria --}}
        <x-modal title="Detalles de la Categoría" action="{{ route('category.store') }}" id="modalNew">
            <div class="mb-3">
                <label class="small mb-1" for="inputName">Categoría:</label>
                <input class="form-control" id="inputName" type="text" placeholder="Ingresar categoría" name="name">
            </div>

            <x-slot:footer>
                <x-btn-submit>Agregar Categoría</x-btn-submit>
            </x-slot:footer>
        </x-modal>
        {{-- Fim do modal de adicionar categoria --}}

        {{-- Modal de editar categoria --}}
        <x-modal title="Editar Categoría" action="{{ route('category.update') }}" id="modalEdit">

            @method('PUT')
            <input type="hidden" name="id" id="inputId">

            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label class="small mb-1" for="inputEditName">Categoría:</label>
                        <input class="form-control" id="inputEditName" type="text" placeholder="Ingresar categoría"
                            name="name">
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
        {{-- Fim do modal de editar categoria --}}
    @endcannot
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
