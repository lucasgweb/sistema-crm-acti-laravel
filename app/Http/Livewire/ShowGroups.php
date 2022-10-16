<?php

namespace App\Http\Livewire;

use App\Models\Group;
use Livewire\Component;
use Livewire\WithPagination;

class ShowGroups extends Component
{
    use WithPagination;
    protected $paginateTheme = 'bootstrap';

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        return view('livewire.show-groups',[
            'groups' => Group::paginate(10)
        ]);
    }
}
