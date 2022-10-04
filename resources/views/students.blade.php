@extends('layouts.default')
@section('content')
    <x-header icon="bi bi-people-fill">
        Alumnos
        <x-slot:subtitle>
            Gestión de AlumnoS
        </x-slot:subtitle>
    </x-header>
    <x-card>
        <x-btn-primary title="+ Agregar Alumno" class="mb-3">
            data-bs-target="#modalNew"
        </x-btn-primary>

        <livewire:show-students/>

    </x-card>
    {{-- Modal de adicionar Estudante --}}
    <x-modal title="Detalles" action="{{ route('student.store') }}" id="modalNew">


        <div class="mb-3">
            <label class="small mb-1" for="inputName">Nombre:</label>
            <input class="form-control" id="inputName" type="text" placeholder="Ingresar nombre" name="name">
        </div>
        <div class="mb-3">
            <label class="small mb-1" for="inputDocument">DNI:</label>
            <input class="form-control" id="inputDocument" type="text" placeholder="Ingresar DNI" name="document">
        </div>
        <div class="mb-3">
            <label class="small mb-1" for="inputEmail">Email:</label>
            <input class="form-control" id="inputEmail" type="email" placeholder="Ingresar correo" name="email">
        </div>
        <div class="mb-3">
            <label class="small mb-1" for="inputPhone">Telefono:</label>
            <input class="form-control" id="inputPhone" type="text" placeholder="Ingresar celular" name="phone">
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
            <label class="small mb-1" for="inputAddress">Dirección:</label>
            <input class="form-control" id="inputAddress" type="text" placeholder="Ingresar dirección" name="address">
        </div>
        <x-slot:footer>
            <x-btn-submit>Agregar</x-btn-submit>
        </x-slot:footer>
    </x-modal>
    {{-- Fim do modal de adicionar Estudante --}}

    {{-- Modal de editar Estudante --}}
    <x-modal title="Editar" action="{{ route('student.update') }}" id="modalEdit">

        @method('PUT')
        <input type="hidden" name="id" id="getId">

        <div class="mb-3">
            <label class="small mb-1" for="getName">Nombre:</label>
            <input class="form-control" id="getName" type="text" placeholder="Ingresar nombre" name="name">
        </div>
        <div class="mb-3">
            <label class="small mb-1" for="getDocument">DNI:</label>
            <input class="form-control" id="getDocument" type="text" placeholder="Ingresar DNI" name="document">
        </div>
        <div class="mb-3">
            <label class="small mb-1" for="getEmail">Email:</label>
            <input class="form-control" id="getEmail" type="email" placeholder="Ingresar correo" name="email">
        </div>
        <div class="mb-3">
            <label class="small mb-1" for="getPhone">Telefono:</label>
            <input class="form-control" id="getPhone" type="text" placeholder="Ingresar celular" name="phone">
        </div>
        <div class="mb-3">
            <label class="small mb-1">Curso:</label>
            <select class="form-select" name="course_id">
                <option selected id="getCourse">Seleccione el Curso:</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="small mb-1" for="getAddress">Dirección:</label>
            <input class="form-control" id="getAddress" type="text" placeholder="Ingresar dirección" name="address">
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
    {{-- Fim do modal de editar Estudante --}}

@endsection

@push('script')
    @livewireScripts
    <script>
        const modalEdit = document.getElementById('modalEdit')
        modalEdit.addEventListener('show.bs.modal', event => {

            const button = event.relatedTarget

            const id = button.getAttribute('data-id')
            const name = button.getAttribute('data-name')
            const email = button.getAttribute('data-email')
            const document = button.getAttribute('data-document')
            const courseId = button.getAttribute('data-course-id')
            const course = button.getAttribute('data-course')
            const address = button.getAttribute('data-address')
            const phone = button.getAttribute('data-phone')

            const inputName = modalEdit.querySelector('#getName')
            const inputId = modalEdit.querySelector('#getId')
            const inputDocument = modalEdit.querySelector('#getDocument')
            const inputEmail = modalEdit.querySelector('#getEmail')
            const inputCourse = modalEdit.querySelector('#getCourse')
            const inputAddress = modalEdit.querySelector('#getAddress')
            const inputPhone = modalEdit.querySelector('#getPhone')

            inputId.value = id
            inputName.value = name
            inputEmail.value = email
            inputDocument.value = document
            inputCourse.value = courseId
            inputCourse.textContent = course
            inputAddress.value = address
            inputPhone.value = phone
        })
    </script>
@endpush


