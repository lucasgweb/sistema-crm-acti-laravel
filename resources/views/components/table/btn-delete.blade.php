<form action="{{$slot}}" method="post" class="mt-0">
    @csrf
    @method('DELETE')
    <button class="btn btn-datatable btn-icon btn-transparent-dark"><i
            class="bi bi-trash3-fill"></i></button>
</form>
