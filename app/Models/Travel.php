<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Travel extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'travels';
    protected $fillable = ['name','variant','origin_id','destination_id','price','thumbnail','content'];
    
    public function origin()
    {
    	return $this->belongsTo(Origins::class);
    }

    public function destination()
    {
    	return $this->belongsTo(Destinations::class);
    }

    public function traveltransaction()
    {
    	return $this->hasMany(TravelTransactions::class);
    }

    public function facilitys()
    {
        return $this->belongsToMany(Facilitys::class);
    }
}
