<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class ShowCourses extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.show-courses',[
            'courses' => Course::orderByDesc('id')->paginate(10)
        ]);
    }
}
