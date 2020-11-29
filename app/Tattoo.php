<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tattoo extends Model
{
  protected $fillable = [
    'order','path','displayed_in'
  ];

  public function user()
  {
      return $this->belongsTo(User::class);
  }
}
