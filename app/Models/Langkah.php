<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Langkah extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function post()
    {
        return $this->belongsTo(Post::class);
    }
}
