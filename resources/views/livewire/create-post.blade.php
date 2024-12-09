<div class="flex flex-col gap-2 items-center">
    <h2 class="text-xl dark:text-white">
        Create A Post
    </h2>
    <div class="max-w-2xl mx-auto p-4 rounded-lg shadow w-full">
        <form wire:submit.prevent="submit" class="space-y-4">
            <div class="relative">
                <textarea wire:model.debounce.300ms="content" placeholder="What's on your mind?"
                    class="w-full p-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    rows="4"></textarea>
            </div>
            @error('content')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            <div class="flex items-center space-x-2">
                <label for="image-upload"
                    class="flex items-center space-x-2 cursor-pointer text-blue-500 hover:text-blue-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M4 5a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V7a2 2 0 00-2-2h-1.586a1 1 0 01-.707-.293l-1.121-1.121A2 2 0 0011.172 3H8.828a2 2 0 00-1.414.586L6.293 4.707A1 1 0 015.586 5H4zm6 9a3 3 0 100-6 3 3 0 000 6z"
                            clip-rule="evenodd" />
                    </svg>
                    <span>{{ $image ? 'Change image' : 'Add image' }}</span>
                </label>
                <input type="file" id="image-upload" wire:model="image" class="hidden" accept="image/*">
            </div>
            @error('image')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror

            @if ($image)
                <div class="mt-2">
                    <img src="{{ $image->temporaryUrl() }}" alt="Uploaded image preview" class="max-w-xs rounded">
                </div>
            @endif

            <button type="submit"
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-md transition duration-200 flex items-center justify-center"
                :disabled="!@this.content.length && !@this.image">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 rotate-90" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path
                        d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                </svg>
                Post
            </button>
        </form>

        @if (session()->has('message'))
            <div class="mt-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('message') }}
            </div>
        @endif
    </div>
</div>
