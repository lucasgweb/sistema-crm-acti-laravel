@extends('layouts.default')
@section('content')
    <x-header icon="bi bi-people-fill">
        Leads
        <x-slot:subtitle>
            Gestión de Leads
        </x-slot:subtitle>
    </x-header>
    <x-card>
        <x-btn-primary title="+ Agregar Lead" class="mb-3">
            data-bs-target="#modalNew"
        </x-btn-primary>

        <livewire:show-leads/>

    </x-card>
    @cannot('Usuario')
        {{-- Modal de adicionar lead --}}
        <x-modal title="Detalles de la cuenta" action="{{ route('user.store') }}" id="modalNew">


            <div class="mb-3">
                <label class="small mb-1" for="inputName">Nombres y Apellidos del Lead:</label>
                <input class="form-control" id="inputName" type="text" placeholder="Introduzca el Nombre" name="name">
            </div>

            <div class="mb-3">
                <label class="small mb-1" for="inputEmailAddress">Email:</label>
                <input class="form-control" id="inputEmailAddress" type="email" placeholder="Ingresar Email"
                       name="email">
            </div>

            <div class="mb-3">
                <label class="small mb-1" for="inputName">Teléfono/Celular</label>
                <input class="form-control" id="inputName" type="text" placeholder="Teléfono/Celular" name="name">
            </div>

            <div class="mb-3">
                <label class="small mb-1">Asignar Asesor(a):</label>
                <select class="form-select" name="user">
                    <option selected disabled>Seleccionar Asesor(a):</option>
                    @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3">
                <label class="small mb-1">Curso:</label>
                <select class="form-select" name="course">
                    <option selected disabled>Seleccione el Curso:</option>
                    @foreach($courses as $course)
                        <option value="{{$course->id}}">{{$course->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="small mb-1">Medio:</label>
                <select class="form-select" name="channel">
                    <option selected disabled>Seleccione el Medio:</option>
                    @foreach($channels as $channel)
                        <option value="{{$channel->id}}">{{$channel->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="small mb-1">Descripción:</label>
                <textarea class="form-control" rows="3" placeholder="Ingresar Descripción" name="description">
                </textarea>
            </div>

            <x-slot:footer>
                <x-btn-submit>Agregar Lead</x-btn-submit>
            </x-slot:footer>
        </x-modal>
        {{-- Fim do modal de adicionar lead --}}

        {{-- Modal de editar lead --}}
        <x-modal title="Detalles de la cuenta" action="{{ route('user.update') }}" id="modalEdit">

            @method('PUT')
            <input type="hidden" name="id" id="inputId">

            <div class="mb-3">
                <label class="small mb-1" for="inputEditName">Nombre:</label>
                <input class="form-control" id="inputEditName" type="text" placeholder="Introduzca el Nombre"
                       name="name">
            </div>

            <div class="mb-3">
                <label class="small mb-1" for="inputEditEmailAddress">Correo:</label>
                <input class="form-control" id="inputEditEmailAddress" type="email" placeholder="Introduzca el Correo"
                       name="email">
            </div>

            <div class="mb-3">
                <label class="small mb-1" for="inputEditPassword">Contraseña:</label>
                <input class="form-control" id="inputEditPassword" type="password" placeholder="Contraseña"
                       name="password">
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
                </select>
            </div>

            <x-slot:footer>
                <x-btn-submit>Agregar Usuario</x-btn-submit>
            </x-slot:footer>
        </x-modal>
        {{-- Fim do modal de editar lead --}}
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
