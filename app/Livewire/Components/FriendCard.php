<?php

namespace App\Livewire\Components;

use App\Models\User;
use App\Services\FriendService;
use Livewire\Component;

class FriendCard extends Component
{
    public $userId;
    private FriendService $friendService;
    public function boot(FriendService $friendService)
    {
        $this->friendService = $friendService;
    }
    public function render()
    {
        return view('livewire.components.friend-card', [
            'user' => $this->friendService->findById($this->userId)
        ]);
    }
}
