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
        return $this->belongsToMany(Sponsorship::class);
    }

    public function stars(){
        return $this->belongsToMany(Star::class);
    }

    public function typologies(){
        return $this->belongsToMany(Typology::class);
    }

    protected function Photo(): Attribute
    {
        return Attribute::make(
            get: fn(string|null $value)=>$value ? asset('storage/'.$value) : null,
        );
    }
    protected function cv(): Attribute
    {
        return Attribute::make(
            get: fn(string|null $value)=>$value ? asset('storage/'.$value) : null,
        );
    }
}
