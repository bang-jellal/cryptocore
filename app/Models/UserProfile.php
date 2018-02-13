<?php

namespace App\User;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    /**
     * Get the user that owns the profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
