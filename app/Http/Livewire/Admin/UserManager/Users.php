<?php

namespace App\Http\Livewire\Admin\UserManager;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public string $search = '';
    protected $listeners =['userAdded'=>'$refresh'];

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $users = User::query()
            ->where('is_super_admin', '=', false)
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);
        return view('livewire.admin.user-manager.users', [
            'users' => $users
        ]);
    }
}
