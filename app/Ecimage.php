<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ecimage extends Model
{
    protected $fillable = [
      'place','path'
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
