<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ {
    Factories\HasFactory,
    Model
};

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price'];

    public function user()
    {
        return $this->belongsToMany(
            User::class
            /*
            ,'ingredient_user'
            ,'ingredient_id'
            ,'user_id'
            // */
        );
    }

    public function pizza()
    {
        return $this->belongsToMany(Pizza::class);
    }

}
