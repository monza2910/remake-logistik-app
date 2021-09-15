<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Origins extends Model
{
    use HasFactory;
    protected $table = 'origins';
    protected $fillable = ['province','city','subdistrict','created_at','updated_at'];
    
    public function rates()
    {
    	return $this->hasMany(Shippingrates::class);
    }
    public function outlet()
    {
        return $this->hasMany(Outlets::class);
    }
    public function travel()
    {
        return $this->hasMany(Travel::class);
    }
}
