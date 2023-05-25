<?php

namespace App\Http\Livewire\Admin\UserManager;

use App\Models\User;
use Livewire\Component;

class DeleteForm extends Component
{
    public $user = null;

    protected $listeners = ['userSelected' => 'findUser'];

    public function deleteUser(): void
    {
        $this->user->delete();
        session()->flash('success', 'User deleted successfully.');
        $this->reset();
        $this->emit('userAdded');
    }

    public function findUser($id): void
    {
        $this->user = User::query()->find($id);
    }

    public function render(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.admin.user-manager.delete-form');
    }
}
