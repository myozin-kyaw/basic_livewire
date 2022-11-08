<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class CommentComponent extends Component
{
    public Post $post;
    public $comment;
    public $successMessage;

    protected $rules = [
        "comment" => 'required|min:2',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function postComment()
    {
        $validatedData = $this->validate();

        $model = Comment::create([
            'post_id' => $this->post->id,
            'name' => $validatedData['comment']
        ]);

        sleep(1);

        $this->comment = null;

        $this->post = $model->post;

        $this->successMessage = 'Comment successfully created !';

        $this->emit('successMessage', $this->successMessage);
    }

    public function destroy($id)
    {
        $model = Comment::findOrFail($id);

        $model->delete();

        $this->post = $model->post;

        $this->successMessage = 'Comment successfully deleted !';
    }

    public function render()
    {
        $comments = Comment::select('id', 'name')->get();

        return view('livewire.comment-component', [
            'comments' => $comments
        ]);
    }
}
