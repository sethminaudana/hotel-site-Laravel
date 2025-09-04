<?php

namespace App\Livewire;

use App\Models\Subscriber;
use Livewire\Component;

class SubscribeForm extends Component
{
    public $email;

    public function subscribe()
    {
        $this->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        Subscriber::create(['email' => $this->email]);

        session()->flash('message', 'Thank you for subscribing!');
        $this->reset('email'); // clear input
    }
    public function render()
    {
        return view('livewire.subscribe-form');
    }
}
