<div>
    @foreach ($this->getAllUser as $user)
        <div class="flex gap-5">
            <p class="text-white">
                {{ $user->name }}
            </p>
            <button class="text-white" wire:click="sendFriendReq('{{ $user->email }}')">
                Send Friend Request
            </button>
        </div>
    @endforeach
    @if (Session::has('success'))
        <p class="text-white">Friend Request Sent</p>
    @endif
</div>
