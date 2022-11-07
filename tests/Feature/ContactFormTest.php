<?php

namespace Tests\Feature;

use App\Http\Livewire\ContactForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    /** @test  */
    public function main_page_contains_contact_form_livewire_component()
    {
        $this->get('/')->assertSeeLivewire('contact-form');
    }

    /** @test  */
    public function contact_form_can_send_a_sumit()
    {
        Livewire::test(ContactForm::class)
            ->set('name', 'test')
            ->set('email', 'test@example.com')
            ->set('phone', '34523421432')
            ->set('message', 'Hello World')
            ->call('submitForm')
            ->assertSee('Congratulations !');
    }

     /** @test  */
    public function name_is_required()
    {
        Livewire::test(ContactForm::class)
        ->set('name', '')
        ->call('submitForm')
        ->assertHasErrors(['name' => 'required']);
    }

     /** @test  */
    public function message_field_has_min_value()
    {
        Livewire::test(ContactForm::class)
        ->set('message', 'test')
        ->call('submitForm')
        ->assertHasErrors(['message' => 'min']);
    }
}
