<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title','category','thumbnail','body','release_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
