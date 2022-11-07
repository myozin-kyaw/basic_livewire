<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;

class ContactForm extends Component
{
    public $successMessage = null,
        $message = null,
        $name = null,
        $email = null,
        $phone = null;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'phone' => 'required|integer',
        'message' => 'required|min:5'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submitForm()
    {
        $contact = $this->validate();

        $contact['name'] = $this->name;
        $contact['email'] = $this->email;
        $contact['phone'] = $this->phone;
        $contact['message'] = $this->message;

        sleep(1);

        $this->successMessage = "Congratulations !";

        $this->resetForm();
    }

    private function resetForm()
    {
        $this->name = null;
        $this->email = null;
        $this->phone = null;
        $this->message = null;
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
