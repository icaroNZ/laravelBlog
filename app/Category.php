<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'code'];

    public function blog()
    {
        return $this->belongsToMany(Blog::class);
    }

    public function setCodeAttribute($value)
    {
        return $this->attributes['code'] = str_slug($value);
    }
}
