<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tattoo extends Model
{
  protected $fillable = [
    'order','path'
  ];

  public function user()
  {
      return $this->belongsTo(User::class);
  }
}
