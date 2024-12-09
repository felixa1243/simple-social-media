<div class="flex gap-5 items-center my-5">
    <a href="/user?username={{ $user->name }}" class="font-medium text-xl hover:underline">
        {{ $user->name }}
    </a>
    </p>
    @if ($user->id !== Auth::user()->id)
        <button class="font-bold bg-blue-500 text-white rounded-md px-3 py-2"
            wire:click="sendFriendReq('{{ $user->email }}')">
            Send Friend Request
        </button>
    @endif
</div>
