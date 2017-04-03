<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment'];

    public function blog()
    {
        return $this->belongsToMany(Blog::class);
    }
}
