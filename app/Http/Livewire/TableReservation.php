<?php

namespace App\Http\Livewire;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class TableReservation extends Component
{
    public $name;

    public $phoneNumber;

    public $email;

    public $date;

    public $time;

    public $numberOfPeople;

    public function mount(): void
    {
        $this->date = now()->format('Y-m-d');
        $this->time = now()->format('H:i');
    }

    protected $rules = [
        'name' => ['required', 'string', 'max:255'],
        'phoneNumber' => ['required', 'string', 'max:20', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
        'email' => ['nullable', 'email', 'max:255'],
        'date' => ['required', 'date'],
        'time' => ['required', 'date_format:H:i'],
        'numberOfPeople' => ['required', 'integer', 'min:1'],
    ];

    protected $messages = [
        'name.required' => 'The name field is required.',
        'phoneNumber.required' => 'The phone number field is required.',
        'date.required' => 'The date field is required.',
        'time.required' => 'The time field is required.',
        'numberOfPeople.required' => 'The number of people field is required.',
    ];

    public function submitReservation(): void
    {
        $this->validate();

        \App\Models\TableReservation::create([
            'name' => $this->name,
            'phone_number' => $this->phoneNumber,
            'email' => $this->email,
            'date' => $this->date,
            'time' => $this->time,
            'number_of_people' => $this->numberOfPeople,
        ]);
        session()->flash('success', 'Thank you for your reservation!, We will contact you soon.');
        $this->reset();
    }

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('livewire.table-reservation');
    }
}
