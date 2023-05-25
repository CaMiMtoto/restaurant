<?php

namespace App\Http\Livewire\Admin\UserManager;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;

class CreateForm extends Component
{
    public string $name = '';
    public string $email = '';


    protected $rules = [
        'name' => ['required', 'string', 'max:255', 'min:3'],
        'email' => ['required', 'email', 'unique:users,email']
    ];

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function submit(): void
    {
        $this->validate();
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make('ubuzima@2023'),
        ]);
        session()->flash('success', 'User created successfully.');
        $this->reset();
        $this->emit('userAdded');
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('livewire.admin.user-manager.create-form');
    }
}
