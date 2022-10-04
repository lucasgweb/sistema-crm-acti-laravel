<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class ShowStudents extends Component
{
    public $search;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.show-students',[
            'students' => Student::orderByDesc('id')->where('name', 'like', '%'.$this->search.'%')->paginate(10)
        ]);
    }
}
