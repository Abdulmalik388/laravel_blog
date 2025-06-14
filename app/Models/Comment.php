<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
      use HasFactory;

    protected $fillable = [
        'post_id',     // ← Add this
        'name',
        'email',
        'comment',
    ];
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

}
