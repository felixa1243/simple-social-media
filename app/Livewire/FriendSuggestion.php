<?php

namespace App\Livewire;


use App\Services\FriendService;
use Livewire\Attributes\Computed;
use Livewire\Component;

class FriendSuggestion extends Component
{
    private FriendService $friendService;
    public function boot()
    {
        $this->friendService = new FriendService();
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
