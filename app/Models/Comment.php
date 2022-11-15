<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // fields can be filled
    protected $fillable = ['body', 'user_id', 'post_id'];

    public function post()
    {
        return $this->belongsTo(posts::class);
    }

    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
