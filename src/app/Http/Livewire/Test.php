<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class Test extends Component
{
    public $isOpen=false;

    public function openModal()
    {
        $this->isOpen=true;
    }

    public function closeModal()
    {
        $this->isOpen=false;
    }

    public function render()
    {
        return view('livewire.test');
    }
}
