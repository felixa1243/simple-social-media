<?php

namespace App\Livewire;

use App\Constant\FriendStatus;
use App\Models\FriendLists;
use App\Models\User;
use App\Services\FriendService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Component;

class FriendSuggestion extends Component
{
    private FriendService $friendService;
    public function boot()
    {
        $this->friendService = new FriendService(User::class, FriendLists::class);
    }
    #[Computed()]
    public function getAllUser()
    {
        return $this->friendService->friendSuggestion();
    }
    public function sendFriendReq($email)
    {
        $this->friendService->sendFriendRequest($email);
        session()->flash('success', 'Friend Request sent!');
    }
    public function render()
    {
        return view('livewire.friend-suggestion');
    }
}
