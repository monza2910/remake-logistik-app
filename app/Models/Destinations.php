<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinations extends Model
{
    use HasFactory;
    protected $table = 'destinations';
    protected $fillable = ['province','city','subdistrict','created_at','updated_at'];

    public function rate()
    {
    	return $this->hasMany(Shippingrates::class);
    }
}