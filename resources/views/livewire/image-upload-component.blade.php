<div>

    <h2 class="text-3xl my-10 text-center font-semibold mt-4">Livewire Image Upload Component</h2>

    <div class="m-10">

        <form wire:submit.prevent="uploadFile" enctype="multipart/form-data" class="space-y-8 divide-y divide-gray-200">
            <div class="sm:grid sm:grid-cols-3 sm:items-center sm:gap-4 sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="photo" class="block text-sm font-medium text-gray-700">Photo</label>
                <div class="mt-1 sm:col-span-2 sm:mt-0">
                    <div class="flex items-center">
                        <span class="h-12 w-12 overflow-hidden rounded-full bg-gray-100">
                        <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        </span>
                        <input type="file" wire:model="file" class="ml-5 rounded-md border border-gray-300 bg-white py-2 px-3 text-sm font-medium leading-4 text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        <button class="border-2 border-indigo-500 px-3 py-2 bg-indigo-500 rounded-md text-white mx-3">Submit</button>
                    </div>
                </div>
                @if ($file)
                Photo Preview:
                    <img src="{{ $file->temporaryUrl() }}">
                    <button type="button" wire:click="@this.removeUpload('livewire-tmp','{{$file->getFilename()}}')">Remove</button>
                @endif
                @error('file') <span class="error">{{ $message }}</span> @enderror
            </div>
        </form>

    </div>

</div>
