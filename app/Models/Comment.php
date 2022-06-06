<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['comment'];


    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Replies of this comment
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
