<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    public function profiles(){
        return $this->belongsToMany(Profile::class, 'profile_sponsorship');
    }
}
