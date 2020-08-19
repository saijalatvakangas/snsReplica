<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // Laravel doesn't need to guard inputs because every passing field is named by create function in PostContoller
    protected $guarded = [];

     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
