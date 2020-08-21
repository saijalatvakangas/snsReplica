<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // Laravel doesn't need to guard inputs because every passing field is named by create function in PostContoller
    protected $guarded = [];

    public function profileImage()
    {
        $imagepath = ($this->image) ? $this->image : 'profile/QPXVVdInBkmdvFuKvI2BnW2zoxNjsXrmEKfpgHJd.png';
        return '/storage/' . $imagepath;
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }

     public function user()
    {
        return $this->belongsTo(User::class);
    }
}
