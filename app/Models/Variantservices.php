<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variantservices extends Model
{
    use HasFactory;

    protected $fillable = ['variant_service','create_at','updated_at'];

    public function rate()
    {
    	return $this->hasMany(Shippingrates::class);
    }
}
