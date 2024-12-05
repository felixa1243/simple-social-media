<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FriendLists extends Model
{
    protected $table = 'friendlists';
    public $fillable = [
        "user_id",
        "friend_id",
        "status"
    ];
    public function requester(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function recipient(): BelongsTo
    {
        return $this->belongsTo(User::class, 'friend_id');
    }
}
