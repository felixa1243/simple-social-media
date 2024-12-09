<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 flex flex-col items-center w-full">
        <div class="flex w-1/2">
            @livewire('search')
        </div>
        @livewire('create-post')
        @livewire('friend-suggestion')
        <div class="w-full flex flex-col justify-center items-center">
            <h3 class="text-4xl">My Posts</h3>
            @livewire('posts', ['userId' => Auth::user()->id])
        </div>
    </div>
</x-app-layout>
