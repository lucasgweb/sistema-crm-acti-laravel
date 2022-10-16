<?php

namespace App\Http\Livewire;

use App\Models\Semester;
use Livewire\Component;
use Livewire\WithPagination;

class ShowSemesters extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.show-semesters',[
            'semesters' => Semester::orderByDesc('id')->paginate(10)
        ]);
    }
}
