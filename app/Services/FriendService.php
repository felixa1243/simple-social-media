<?php

namespace App\Services;

use App\Constant\FriendStatus;
use App\Models\FriendLists;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FriendService
{
    public function sendFriendRequest($email)
    {
        $user = User::query()->where('email', '=', $email)->first();
        Auth::user()->friends()->attach($user->id, ['status' => FriendStatus::PENDING->value]);
        session()->flash('success', 'Friend Request sent!');
    }
    public function friendSuggestion()
    {
        $authUserId = Auth::id();
        $authUserEmail = Auth::user()->email;

        // Get excluded emails from friend requests sent by the logged-in user
        $excludedEmails = FriendLists::query()
            ->where('user_id', $authUserId)
            ->pluck('friend_id');

        // Fetch users excluding the logged-in user and those in the excluded list
        $users = User::query()
            ->where('email', '!=', $authUserEmail)
            ->whereNotIn('id', $excludedEmails)
            ->select('name', 'email')
            ->paginate(10);
        return $users;
    }
    public function getFriendRequests()
    {
        $friends = Auth::user()
            ->friends()  // Get the `friends` relationship
            ->join('users as u1', 'friendlists.friend_id', '=', 'u1.id')  // First join alias
            ->join('users as u2', 'friendlists.user_id', '=', 'u2.id')   // Second join alias
            ->select('u1.name as friend_name', 'u1.email as friend_email', 'friendlists.status', 'u2.name as user_name', 'u2.email as user_email')
            ->where('friendlists.user_id', Auth::id())  // Filter by the current user's ID
            ->get();
        return $friends;
    }
}
