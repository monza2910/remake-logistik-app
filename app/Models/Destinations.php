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

    public function travel()
    {
        return $this->hasMany(Travel::class);
    }

    public function armada()
    {
        return $this->hasMany(Armada::class);
    }

    public function transactiontravel()
    {
        return $this->hasMany(TransactionTravel::class);
    }
}
