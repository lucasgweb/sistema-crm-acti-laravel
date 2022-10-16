@extends('layouts.default')
@section('content')
    <x-header icon="bi bi-people-fill">
        Administrar Usuarios
        <x-slot:subtitle>
            Gestión de Usuarios
        </x-slot:subtitle>
    </x-header>
    <x-card>
        <x-btn-primary title="+ Agregar Usuario" class="mb-3">
            data-bs-target="#modalNew"
        </x-btn-primary>

        <livewire:show-users />

    </x-card>
    @cannot('Usuario')
        {{-- Modal de adicionar usuario --}}
        <x-modal title="Detalles de la cuenta" action="{{ route('user.store') }}" id="modalNew">


            <div class="mb-3">
                <label class="small mb-1" for="inputName">Nombre:</label>
                <input class="form-control" id="inputName" type="text" placeholder="Introduzca el Nombre" name="name">
            </div>

            <div class="mb-3">
                <label class="small mb-1" for="inputEmailAddress">Correo:</label>
                <input class="form-control" id="inputEmailAddress" type="email" placeholder="Introduzca el Correo"
                    name="email">
            </div>

            <div class="mb-3">
                <label class="small mb-1" for="inputPassword">Contraseña:</label>
                <input class="form-control" id="inputPassword" type="password" placeholder="Contraseña" name="password">
            </div>


            <div class="mb-3">
                <label class="small mb-1">Cargo:</label>
                <select class="form-select" name="role">
                    <option selected disabled>Seleccione el Cargo:</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <x-slot:footer>
                <x-btn-submit>Agregar Usuario</x-btn-submit>
            </x-slot:footer>
        </x-modal>
        {{-- Fim do modal de adicionar usuario --}}

        {{-- Modal de editar usuario --}}
        <x-modal title="Detalles de la cuenta" action="{{ route('user.update') }}" id="modalEdit">

            @method('PUT')
            <input type="hidden" name="id" id="inputId">

            <div class="mb-3">
                <label class="small mb-1" for="inputEditName">Nombre:</label>
                <input class="form-control" id="inputEditName" type="text" placeholder="Introduzca el Nombre" name="name">
            </div>

            <div class="mb-3">
                <label class="small mb-1" for="inputEditEmailAddress">Correo:</label>
                <input class="form-control" id="inputEditEmailAddress" type="email" placeholder="Introduzca el Correo"
                    name="email">
            </div>

            <div class="mb-3">
                <label class="small mb-1" for="inputEditPassword">Contraseña:</label>
                <input class="form-control" id="inputEditPassword" type="password" placeholder="Contraseña" name="password">
            </div>

            <div class="mb-3">
                <label class="small mb-1">Seleccione el Cargo:</label>
                <select class="form-select" title="Status:" name="status">
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="small mb-1">Seleccione el Cargo:</label>
                <select class="form-select" name="role">
                    <option selected disabled>Seleccione el Cargo:</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <x-slot:footer>
                <x-btn-submit>Agregar Usuario</x-btn-submit>
            </x-slot:footer>
        </x-modal>
        {{-- Fim do modal de editar usuario --}}
    @endcannot

@endsection


@cannot('Usuario')
    @push('script')
        @livewireScripts
        <script>
            const modalEdit = document.getElementById('modalEdit')
            modalEdit.addEventListener('show.bs.modal', event => {

                const button = event.relatedTarget

                const id = button.getAttribute('data-id')
                const name = button.getAttribute('data-name')
                const email = button.getAttribute('data-email')

                const inputName = modalEdit.querySelector('#inputEditName')
                const inputEmailAddress = modalEdit.querySelector('#inputEditEmailAddress')
                const inputId = modalEdit.querySelector('#inputId')

                inputId.value = id
                inputName.value = name
                inputEmailAddress.value = email
            })
        </script>
    @endpush
@endcannot
