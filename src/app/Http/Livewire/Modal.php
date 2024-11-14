<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Contact;

class Modal extends Component
{
    public $showModal = false;
    public $contact;

    protected $listeners = ['openModal' => 'show'];

    public function show($contactId)
    {
        $this->contact = \App\Models\Contact::find($contactId);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.modal');
    }
}
