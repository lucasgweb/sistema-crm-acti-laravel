<?php

namespace App\Http\Livewire;

use App\Models\Lead;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class ShowLeads extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $startDate = '1980-09-26 23:10:42';
    public $endDate = '2500-09-26 00:00:00';
    public $userId = '0';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render(): Factory|View|Application
    {

        if (!empty($this->userId != 0))
        {
            $leads = Lead::orderByDesc('id')
            ->where('created_at','>',$this->startDate)
            ->where('created_at','<',$this->endDate)
            ->where('status','!=', 0)
            ->where('user_id',$this->userId)
            ->paginate(10);
        } else {
            $leads = Lead::orderByDesc('id')
            ->where('created_at','>',$this->startDate)
            ->where('created_at','<',$this->endDate)
            ->where('status','!=', 0)
            ->paginate(10);
        }

        return view('livewire.show-leads', [
            'leads' => $leads,
            'users' => User::all()
        ]);
    }
}
