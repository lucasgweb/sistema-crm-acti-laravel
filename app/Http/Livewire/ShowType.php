<?php

namespace App\Http\Livewire;

use App\Models\Type;
use Livewire\Component;
use Livewire\WithPagination;

class ShowType extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.show-type',[
            'types' => Type::orderByDesc('id')->paginate(10)
        ]);
    }
}
