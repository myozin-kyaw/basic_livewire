<div>

    <h2 class="text-3xl my-10 text-center font-semibold mt-4">Livewire Post Component</h2>

    @if ($successMessage)
        <div class="p-3  my-5 rounded-md bg-green-300 flex justify-between">
            <div>{{ $successMessage }}</div>
            <div wire:click="$set('successMessage', null)" class="cursor-pointer">&times;</div>
        </div>
    @endif

    @forelse ($posts as $post)
        <div class="py-5 mx-10">

            <div class="flex justify-between">
                <div class="mb-5">
                    {{ $post->title }} ( Description : {{ $post->description }} )
                </div>
                @if($post->file)
                <div>
                    <img src="{{ Storage::url($post->file) }}" alt="">
                </div>
                @endif
            </div>

            <livewire:comment-component :post="$post"/>

        </div>
    @empty

    @endforelse
</div>
