<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostComponent extends Component
{
    public function render()
    {
        $posts = Post::select('id', 'title', 'description')->get();

        return view('livewire.post-component',[
            'posts' => $posts,
        ]);
    }
}
