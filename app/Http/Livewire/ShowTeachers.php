<?php

namespace App\Http\Livewire;

use App\Models\Teacher;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ShowTeachers extends Component
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
        return view('livewire.show-teachers',[
            'teachers' => Teacher::orderByDesc('id')->where('name', 'like', '%'.$this->search.'%')->paginate(10)
        ]);
    }
}
