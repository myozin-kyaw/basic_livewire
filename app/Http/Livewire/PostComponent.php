<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostComponent extends Component
{
    public $successMessage;

    protected $listeners = [
        'successMessage'
    ];

    public function successMessage($value)
    {
        $this->successMessage = $value;
    }

    public function render()
    {
        $posts = Post::select('id', 'title', 'description', 'file')->get();

        return view('livewire.post-component',[
            'posts' => $posts,
        ]);
    }
}
