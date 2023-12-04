<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $guarded = ['cv','photo'];
    protected $table = 'profiles';

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function sponsorships(){
        return $this->belongsToMany(Sponsorship::class, 'profile_sponsorship', 'profile_id')->withPivot('end_date','start_date');
    }

    public function stars(){
        return $this->belongsToMany(Star::class, 'profile_star', 'profile_id');
    }

    public function typologies(){
        return $this->belongsToMany(Typology::class, 'profile_typology', 'profile_id');
    }

    // protected function Photo(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn(string|null $value)=>$value ? asset('storage/'.$value) : null,
    //     );
    // }
    // protected function cv(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn(string|null $value)=>$value ? asset('storage/'.$value) : null,
    //     );
    // }

    public function urlPhoto(){
        return $this->photo ? asset('storage/'.$this->photo) : null;
    }
}
