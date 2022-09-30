<?php

namespace App\Http\Livewire;

use App\Models\Modality;
use Livewire\Component;
use Livewire\WithPagination;

class ShowModalities extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.show-modalities',[
            'modalities' => Modality::paginate(10)
        ]);
    }
}
