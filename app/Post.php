<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['body', 'creator'];

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

    public function getVotesCountAttribute()
    {
        return $this->votes()->count();
    }
}
