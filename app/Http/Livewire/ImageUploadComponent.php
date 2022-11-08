<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Validation\Rules\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageUploadComponent extends Component
{
    use WithFileUploads;

    public $file;
    public $successMessage;

    protected $rules = [
        'file' => [
            'max:5000'
        ]
    ];

    public function updatedPhoto()
    {
        $this->validate();
    }

    public function uploadFile()
    {
        $this->validate();

        $post = Post::create([
            'title' => 'Test',
            'description' => 'Test description',
            'file' => $this->file->store('photos', 'public')
        ]);

        sleep(1);

        $this->successMessage = 'Image was successfully uploaded !';

        $post->fresh();

        $this->emit('successMessage', $this->successMessage);

    }

    public function render()
    {
        return view('livewire.image-upload-component');
    }
}
