<div>

    <div class="w-2/5 ">
        <form wire:submit.prevent="postComment" method="POST">
        @csrf
            <label for="comment" class="block text-sm font-medium text-gray-700">Add your comment</label>
            <div class="mt-1 ">
                <textarea rows="3" wire:model="comment" class="block p-2 w-full rounded-md border-gray-300 shadow-sm border-2 border-indigo-500 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
            </div>
            @error('name')
                <p class="text-red-500 mt-1">{{ $message }}</p>
            @enderror
            <button class="disabled:opacity-70 px-2 py-1 border-2 border-indigo-500 bg-indigo-500 rounded-md mt-3 text-white">Comment</button>
        </form>
    </div>

    @forelse ($post->comments as $comment)
        <div class=" py-5 border-b-2 border-gray-500 flex justify-between">
            <p>{{ $comment->name }}</p>
            <button type="button" class="text-red-300 underline" wire:click.prevent="destroy({{ $comment->id }})">delete</button>
        </div>
    @empty
        <div class=" py-5 border-b-2 border-gray-500">
            <p>No comment here...</p>
        </div>
    @endforelse

</div>
