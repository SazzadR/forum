<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = 'threads';

    protected $fillable = [
        'title', 'body'
    ];

    public function path()
    {
        return '/threads/' . $this->id;
    }

    public function replies()
    {
        return $this->hasMany(Reply::class, 'thread_id', 'id');
    }
}
