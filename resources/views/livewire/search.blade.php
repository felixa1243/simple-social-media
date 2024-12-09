<div class="flex gap-5 w-full bg-red-500">
    <form wire:submit="searchQuery" class="w-full">
        <input type="text" wire:model="search" class="border-2 border-red-500 w-[80%]">
        <button type="submit">Search</button>
    </form>
</div>
