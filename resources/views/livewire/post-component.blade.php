<div>

    <h2 class="text-3xl my-10 text-center font-semibold mt-4">Livewire Post Component</h2>

    @forelse ($posts as $post)
        <div class="py-5 mx-10">

            <div class="mb-5">
                {{ $post->title }} ( Description : {{ $post->description }} )
            </div>

            <livewire:comment-component :post="$post"/>

        </div>
    @empty

    @endforelse
</div>
