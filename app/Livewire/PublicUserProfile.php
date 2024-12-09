<?php

namespace App\Livewire;


use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

class PublicUserProfile extends Component
{
    #[Title("Profile")]
    #[Url]
    public $username = '';
    public function render()
    {
        $user = User::query()->where('name', '=', $this->username)->first();
        return view('livewire.public-user-profile', [
            'user' => $user
        ]);
    }
}
