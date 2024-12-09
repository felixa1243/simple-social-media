<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @livewire('create-post')
        @livewire('friend-suggestion')
        @livewire('posts', ['userId' => Auth::user()->id])
    </div>
</x-app-layout>
