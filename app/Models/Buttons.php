<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buttons extends Model
{
    use HasFactory;
    protected $table = 'buttons';
    protected $fillable = ['name','created_at','updated_at'];

    public function slider()
    {
    	return $this->hasMany(Sliders::class);
    }
}
