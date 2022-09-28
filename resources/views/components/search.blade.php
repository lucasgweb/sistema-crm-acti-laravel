@props(['users'])

<form class="row justify-content-center" wire:submit.prevent="search">
    <div class="col-auto ">
        <label class="form-label">
            <span class="text-xs fw-400">Fecha Inicio:</span>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="basic-addon1"><i data-feather="calendar"></i></span>
                <input type="date" class="form-control" placeholder="Fecha inicio" wire:model="startDate">
            </div>
        </label>
    </div>
    <div class="col-auto ">
        <label class="form-label">
            <span class="text-xs fw-400">Fecha Fin:</span>
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="basic-addon1"><i data-feather="calendar"></i></span>
                <input type="date" class="form-control" placeholder="Fecha Fin" wire:model="endDate">
            </div>
        </label>
    </div>

    <div class="col-auto">
        <label class="form-label">
            {{$slot}}
        </label>
    </div>

    <div class="col-auto">
        <br>
        <button type="submit" class="btn btn-light bg-primary text-white" value="pesquisar" name="PesquisarEntreDatas">+
            Consultar</button>

    </div>
</form>
