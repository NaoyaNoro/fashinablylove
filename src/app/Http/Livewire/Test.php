<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class Test extends Component
{
    public $isOpen=false;
    public $data;

    public function openModal($data)
    {
        $this->data=$data;
        $this->isOpen=true;
    }

    public function closeModal()
    {
        $this->isOpen=false;
        $this->data=null;
    }

    public function render()
    {
        return view('livewire.test');
    }
}
