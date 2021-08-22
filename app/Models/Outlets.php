<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlets extends Model
{
    use HasFactory;

    protected $fillable = ['origin_id','address','name','created_at','updated_at'];

    public function origin()
    {
    	return $this->belongsTo(Origins::class);
    }
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
