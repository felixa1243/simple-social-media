<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    /**
     * Get the friends of the user.
     */
    public function friends(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'friendlists',
            'user_id',
            'friend_id'
        )
            ->withPivot('status')
            ->withTimestamps();
    }
    /**
     * Get pending friend requests sent by the user.
     */
    public function sentFriendRequests(): BelongsToMany
    {
        return $this->friends()->wherePivot('status', 'pending');
    }

    /**
     * Get friend requests received by the user.
     */
    public function receivedFriendRequests(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'friendlists',
            'friend_id',
            'user_id'
        )->withPivot('status')
            ->withTimestamps()
            ->wherePivot('status', 'pending');
    }

    /**
     * Get accepted friendships.
     */
    public function acceptedFriends(): BelongsToMany
    {
        return $this->friends()->wherePivot('status', 'accepted');
    }
    /**
     * Get Posts
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    /**
     * Get Liked posts
     */
    public function likedPosts()
    {
        return $this->belongsToMany(Post::class, 'post_likes');
    }
    public function likePost(Post $post)
    {
        return $this->likedPosts()->attach($post);
    }
    public function unlikePost(Post $post)
    {
        return $this->likedPosts()->detach($post);
    }
}
