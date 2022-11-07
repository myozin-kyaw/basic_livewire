<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class PaginationComponent extends Component
{
    use WithPagination;

    public $is_active = true, $search = null, $per_record = 10;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::select('id', 'name', 'email', 'is_active')
                ->whereIsActive($this->is_active)
                ->when($this->search, function ($query) {
                    $query->where(function ($q) {
                        $q->where('name', 'LIKE', "%$this->search%")
                        ->orWhere('email', 'LIKE', "%$this->search%");
                    });
                })
                ->orderBy('id', 'DESC');

        if ($this->per_record == 'all') {
            $users = $users->get();
        } else {
            $users = $users->paginate($this->per_record);
        }

        return view('livewire.pagination-component', [
            'users' => $users
        ]);
    }
}
