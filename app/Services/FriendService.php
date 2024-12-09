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
            ->select('id','name', 'email')
            ->paginate(10);
        return $users;
    }
    public function findUser($keyword, $perPage)
    {
        $searchColumns = ['email', 'name'];
        return User::query()
            ->where(function ($query) use ($keyword, $searchColumns) {
                foreach ($searchColumns as $column) {
                    $query->orWhere($column, 'LIKE', "%$keyword%");
                }
            })
            ->paginate($perPage);
    }

    public function getFriendRequests()
    {
        $friends = Auth::user()
            ->friends()
            ->join('users as u1', 'friendlists.friend_id', '=', 'u1.id')
            ->join('users as u2', 'friendlists.user_id', '=', 'u2.id')
            ->select('u1.name as friend_name', 'u1.email as friend_email', 'friendlists.status', 'u2.name as user_name', 'u2.email as user_email')
            ->where('friendlists.user_id', Auth::id())
            ->get();
        return $friends;
    }
    public function findById($userId)
    {
        return User::findOrFail($userId);
    }
}
