<div class="px-5">
    You Might Know!
    @foreach ($this->getAllUser as $user)
        @livewire('components.friend-card', ['userId' => $user->id])
    @endforeach
    @if (Session::has('success'))
        <p class="font-bold bg-green-500">Friend Request Sent</p>
    @endif
</div>  
