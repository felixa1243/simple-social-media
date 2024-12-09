<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasUuids;
    protected $fillable = [
        "post_content",
        "user_id",
        "media_url"
    ];
    public function post_likes()
    {
        return $this->belongsToMany(User::class, 'post_likes');
    }
    public function likeCount()
    {
        return $this->likes()->count();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
