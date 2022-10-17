@extends('layouts.default')
@section('content')
    <x-header icon="bi bi-people-fill">
        Administrar Leads
        <x-slot:subtitle>
            Gestión de Leads
        </x-slot:subtitle>
    </x-header>
    <x-card>
        <x-btn-primary title="+ Agregar Lead" class="mb-3">
            data-bs-target="#modalNew"
        </x-btn-primary>

        <livewire:show-leads />

    </x-card>
    @cannot('Usuario')
        {{-- Modal de adicionar lead --}}
        <x-modal title="Detalles" action="{{ route('lead.store') }}" id="modalNew">


            <div class="mb-3">
                <label class="small mb-1" for="inputName">Nombres y Apellidos del Lead:</label>
                <input class="form-control" id="inputName" type="text" placeholder="Introduzca el Nombre" name="name">
            </div>

            <div class="mb-3">
                <label class="small mb-1" for="inputEmailAddress">Email:</label>
                <input class="form-control" id="inputEmailAddress" type="email" placeholder="Ingresar Email" name="email">
            </div>

            <div class="mb-3">
                <label class="small mb-1" for="inputName">Teléfono/Celular</label>
                <input class="form-control" id="inputName" type="text" placeholder="Teléfono/Celular" name="phone">
            </div>

            <div class="mb-3">
                <label class="small mb-1">Asignar Asesor(a):</label>
                <select class="form-select" name="user_id">
                    <option selected disabled>Seleccionar Asesor(a):</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="mb-3">
                <label class="small mb-1">Curso:</label>
                <select class="form-select" name="course_id">
                    <option selected disabled>Seleccione el Curso:</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="small mb-1">Medio:</label>
                <select class="form-select" name="channel_id">
                    <option selected disabled>Seleccione el Medio:</option>
                    @foreach ($channels as $channel)
                        <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="small mb-1">Descripción:</label>
                <textarea class="form-control" rows="3" placeholder="Ingresar Descripción" name="description"></textarea>
            </div>

            <x-slot:footer>
                <x-btn-submit>Agregar</x-btn-submit>
            </x-slot:footer>
        </x-modal>
        {{-- Fim do modal de adicionar lead --}}

        {{-- Modal de editar lead --}}
        <x-modal title="Editar" action="{{ route('lead.update') }}" id="modalEdit">

            @method('PUT')
            <input type="hidden" name="id" id="getId">

            <div class="mb-2">
                <label class="small mb-1" for="getName">Nombres y Apellidos del Lead:</label>
                <input class="form-control" id="getName" type="text" name="name">
            </div>

            <div class="mb-2">
                <label class="small mb-1" for="getEmail">Email:</label>
                <input class="form-control" id="getEmail" type="email" name="email">
            </div>

            <div class="mb-2">
                <label class="small mb-1" for="getPhone">Teléfono/Celular</label>
                <input class="form-control" id="getPhone" type="text" name="phone">
            </div>


            <div class="mb-2">
                <label class="small mb-1" for="selectCourse">Curso:</label>
                <select id="selectCourse" class="form-select" name="course_id">
                    <option id="getCourse" selected></option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-2">
                <label class="small mb-1" for="selectChannel">Medio:</label>
                <select id="selectChannel" class="form-select" name="channel_id">
                    <option id="getChannel" selected></option>
                    @foreach ($channels as $channel)
                        <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-2">
                <label class="small mb-1" for="getComments">Descripción:</label>
                <textarea id="getComments" class="form-control" rows="3" name="description"></textarea>
            </div>

            <x-slot:footer>
                <x-btn-submit>Guardar Cambios</x-btn-submit>
            </x-slot:footer>

        </x-modal>
        {{-- Fim do modal de editar lead --}}

        {{-- Modal de adicionar lead --}}
        <x-modal title="Editar Asesor" action="{{ route('lead.update-user') }}" id="modalEditUser">

            @method('PUT')
            <input type="hidden" name="id" id="editUser">

            <div class="mb-3">
                <label class="small mb-1">Asignar Asesor(a):</label>
                <select class="form-select" name="user_id">
                    <option selected disabled>Seleccionar Asesor(a):</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>


            <x-slot:footer>
                <x-btn-submit>Guardar Cambios</x-btn-submit>
            </x-slot:footer>
        </x-modal>
        {{-- Fim do modal de adicionar lead --}}
    @endcannot

@endsection


@cannot('Usuario')
    @push('script')
        @livewireScripts
        <script>
            const modalEdit = document.getElementById('modalEdit')
            modalEdit.addEventListener('show.bs.modal', event => {

                const button = event.relatedTarget

                const id = button.getAttribute('data-bs-id')
                const name = button.getAttribute('data-bs-name')
                const email = button.getAttribute('data-bs-email')
                const phone = button.getAttribute('data-bs-phone')
                const courseId = button.getAttribute('data-bs-courseId')
                const courseName = button.getAttribute('data-bs-courseName')
                const channelId = button.getAttribute('data-bs-channelId')
                const channelName = button.getAttribute('data-bs-channelName')
                const description = button.getAttribute('data-bs-description')


                let inputName = modalEdit.querySelector('#getName')
                let inputEmailAddress = modalEdit.querySelector('#getEmail')
                let inputId = modalEdit.querySelector('#getId')
                let inputPhone = modalEdit.querySelector('#getPhone')
                let channel = modalEdit.querySelector('#getChannel')
                let course = modalEdit.querySelector('#getCourse')
                let descriptionContent = modalEdit.querySelector('#getComments')

                inputId.value = id
                inputName.value = name
                inputEmailAddress.value = email
                inputPhone.value = phone
                channel.value = channelId
                course.value = courseId
                channel.textContent = channelName
                course.textContent = courseName
                descriptionContent.textContent = description
            })
        </script>
        <script>
            const modalEditUser = document.getElementById('modalEditUser')
            modalEditUser.addEventListener('show.bs.modal', event => {

                const button = event.relatedTarget

                const id = button.getAttribute('data-bs-id')

                let inputId = modalEditUser.querySelector('#editUser')

                inputId.value = id
            })
        </script>
    @endpush
@endcannot
