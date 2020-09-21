<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    use HasFactory;

    // protected $fillable = ['name', 'price'];
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTotalPriceAttribute(string $price)
    {
        return number_format(((float)$price * 15) / 10, 2);
    }

}
